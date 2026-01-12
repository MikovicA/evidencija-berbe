<?php

namespace App\Http\Controllers;

use App\Models\UnosBerbe;
use App\Models\PlanBerbe;
use Illuminate\Http\Request;

class UnosBerbeController extends Controller
{
    public function __construct()
    {
        // SAMO RADNIK
        $this->middleware(function ($request, $next) {
            if (!auth()->check() || auth()->user()->role !== 'radnik') {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $unosi = UnosBerbe::with([
                'planBerbe.parcela',
                'planBerbe.sorta'
            ])
            ->where('user_id', auth()->id())
            ->get();

        return view('unos_berbes.index', compact('unosi'));
    }

    public function create()
    {
        // samo planovi koji su u toku
        $planovi = PlanBerbe::with(['parcela', 'sorta'])
            ->where('status', 'u_toku')
            ->get();

        return view('unos_berbes.create', compact('planovi'));
    }

    public function store(Request $request)
    {
        // VALIDACIJA
        $validated = $request->validate([
            'plan_berbe_id' => 'required|exists:plan_berbes,id',
            'uneta_kolicina_kg' => 'required|numeric|min:0.01',
        ]);

        $plan = PlanBerbe::findOrFail($validated['plan_berbe_id']);

        // SIGURNOSNA PROVERA STATUSA
        if ($plan->status !== 'u_toku') {
            abort(403);
        }

        // KOLIKO JE VEĆ UNESENO
        $do_sad_uneto = UnosBerbe::where('plan_berbe_id', $plan->id)
            ->sum('uneta_kolicina_kg');

        // DA LI BI NOVI UNOS PREŠAO PLAN
        if ($do_sad_uneto + $validated['uneta_kolicina_kg'] > $plan->planirana_kolicina_kg) {
            return back()
                ->withInput()
                ->withErrors([
                    'uneta_kolicina_kg' =>
                        'Unos prelazi planiranu količinu (' .
                        ($plan->planirana_kolicina_kg - $do_sad_uneto) .
                        ' kg je preostalo).'
                ]);
        }

        // UPIS UNOSA
        UnosBerbe::create([
            'plan_berbe_id' => $plan->id,
            'uneta_kolicina_kg' => $validated['uneta_kolicina_kg'],
            'user_id' => auth()->id(),
        ]);

        // NOVI UKUPNI ZBIR
        $novo_ukupno = $do_sad_uneto + $validated['uneta_kolicina_kg'];

        // AUTOMATSKI ZAVRŠETAK PLANA
        if ($novo_ukupno >= $plan->planirana_kolicina_kg) {
            $plan->update([
                'status' => 'zavrseno'
            ]);
        }

        return redirect()
            ->route('unos-berbes.index')
            ->with('success', 'Unos berbe je uspešno sačuvan.');
    }
}
