<?php

namespace App\Http\Controllers;

use App\Models\PlanBerbe;
use App\Models\Parcela;
use App\Models\Sorta;
use Illuminate\Http\Request;

class PlanBerbeController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check() || auth()->user()->role !== 'gazda') {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $planBerbes = PlanBerbe::with(['parcela', 'sorta'])->latest()->get();
        return view('plan_berbes.index', compact('planBerbes'));
    }

    public function create()
    {
        return view('plan_berbes.create', [
            'parcele' => Parcela::all(),
            'sorte' => Sorta::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'datum' => 'required|date',
            'parcela_id' => 'required|exists:parcelas,id',
            'sorta_id' => 'required|exists:sortas,id',
            'planirana_kolicina_kg' => 'required|numeric|min:1',
            'status' => 'required|in:planirano,u_toku,zavrseno',
        ]);

        PlanBerbe::create($data + ['user_id' => auth()->id()]);

        return redirect()->route('plan-berbes.index')
            ->with('success', 'Plan berbe je uspešno kreiran.');
    }

    public function edit(PlanBerbe $planBerbe)
    {
        return view('plan_berbes.edit', [
            'planBerbe' => $planBerbe,
            'parcele' => Parcela::all(),
            'sorte' => Sorta::all(),
        ]);
    }

    public function update(Request $request, PlanBerbe $planBerbe)
    {
        // Ako je plan završen – ništa se ne smije mijenjati
        if ($planBerbe->status === 'zavrseno') {
            abort(403);
        }

        // Ako je u toku – dozvoljena je samo promjena statusa
        if ($planBerbe->status === 'u_toku') {
            $request->validate([
                'status' => 'required|in:u_toku,zavrseno',
            ]);

            $planBerbe->update([
                'status' => $request->status,
            ]);

            return redirect()
                ->route('plan-berbes.index')
                ->with('success', 'Status plana je ažuriran.');
        }

    // Ako je planirano – dozvoljene su sve izmjene
    $request->validate([
        'datum' => 'required|date',
        'parcela_id' => 'required|exists:parcelas,id',
        'sorta_id' => 'required|exists:sortas,id',
        'planirana_kolicina_kg' => 'required|numeric|min:0.01',
        'status' => 'required|in:planirano,u_toku,zavrseno',
    ]);

    $planBerbe->update($request->all());

    return redirect()
        ->route('plan-berbes.index')
        ->with('success', 'Plan berbe je uspešno izmenjen.');
}


    public function destroy(PlanBerbe $planBerbe)
    {
        $planBerbe->delete();
        return back()->with('success', 'Plan obrisan.');
    }
}
