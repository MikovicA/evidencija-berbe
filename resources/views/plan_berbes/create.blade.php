@extends('layouts.public')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 text-center">Kreiranje plana berbe</h1>

    <form method="POST" action="{{ route('plan-berbes.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Datum</label>
            <input type="date" name="datum" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Parcela</label>
            <select name="parcela_id" class="w-full border rounded px-3 py-2">
                @foreach($parcele as $parcela)
                    <option value="{{ $parcela->id }}">{{ $parcela->naziv }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Sorta</label>
            <select name="sorta_id" class="w-full border rounded px-3 py-2">
                @foreach($sorte as $sorta)
                    <option value="{{ $sorta->id }}">{{ $sorta->naziv }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Planirana količina (kg)</label>
            <input type="number" step="0.01" name="planirana_kolicina_kg" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-6">
            <label class="block mb-1 font-semibold">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="planirano">Planirano</option>
                <option value="u_toku">U toku</option>
                <option value="zavrseno">Završeno</option>
            </select>
        </div>

        <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
            Sačuvaj plan
        </button>
    </form>
</div>
@endsection
