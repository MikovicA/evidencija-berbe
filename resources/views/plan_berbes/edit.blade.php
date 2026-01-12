@extends('layouts.public')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">

    <h1 class="text-2xl font-bold mb-6 text-center">Izmena plana berbe</h1>

    {{-- STATUS INFO BLOK --}}
    @if($planBerbe->status === 'u_toku')
        <div class="mb-4 p-3 bg-yellow-100 text-yellow-800 rounded">
            Plan je u toku. Dozvoljena je samo promena statusa.
        </div>
    @endif

    @if($planBerbe->status === 'zavrseno')
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            Plan je završen i ne može se menjati.
        </div>
    @endif

    <form method="POST" action="{{ route('plan-berbes.update', $planBerbe) }}">
        @csrf
        @method('PUT')

        {{-- DATUM --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Datum</label>
            <input type="date"
                   name="datum"
                   value="{{ $planBerbe->datum->format('Y-m-d') }}"
                   class="w-full border rounded px-3 py-2"
                   {{ $planBerbe->status !== 'planirano' ? 'disabled' : '' }}>
        </div>

        @if($planBerbe->status === 'planirano')
            {{-- PARCELA --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Parcela</label>
                <select name="parcela_id" class="w-full border rounded px-3 py-2">
                    @foreach($parcele as $parcela)
                        <option value="{{ $parcela->id }}"
                            @selected($parcela->id == $planBerbe->parcela_id)>
                            {{ $parcela->naziv }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- SORTA --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Sorta</label>
                <select name="sorta_id" class="w-full border rounded px-3 py-2">
                    @foreach($sorte as $sorta)
                        <option value="{{ $sorta->id }}"
                            @selected($sorta->id == $planBerbe->sorta_id)>
                            {{ $sorta->naziv }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- KOLIČINA --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Planirana količina (kg)</label>
                <input type="number"
                       step="0.01"
                       name="planirana_kolicina_kg"
                       value="{{ $planBerbe->planirana_kolicina_kg }}"
                       class="w-full border rounded px-3 py-2">
            </div>
        @endif

        {{-- STATUS --}}
        <div class="mb-6">
            <label class="block mb-1 font-semibold">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                @if($planBerbe->status === 'planirano')
                    <option value="planirano" selected>Planirano</option>
                    <option value="u_toku">U toku</option>
                    <option value="zavrseno">Završeno</option>
                @elseif($planBerbe->status === 'u_toku')
                    <option value="u_toku" selected>U toku</option>
                    <option value="zavrseno">Završeno</option>
                @else
                    <option value="zavrseno" selected>Završeno</option>
                @endif
            </select>
        </div>

        {{-- DUGME --}}
        @if($planBerbe->status === 'zavrseno')
            <button disabled
                    class="w-full bg-gray-400 text-white py-2 rounded cursor-not-allowed">
                Izmena nije dozvoljena
            </button>
        @else
            <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Sačuvaj izmene
            </button>
        @endif

    </form>
</div>
@endsection


