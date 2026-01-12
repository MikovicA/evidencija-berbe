@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto bg-white p-6 rounded shadow">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Planovi berbe</h1>

        <a href="{{ route('plan-berbes.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Kreiraj novi plan berbe
        </a>
    </div>

    <table class="w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">Datum</th>
                <th class="border px-3 py-2">Parcela</th>
                <th class="border px-3 py-2">Sorta</th>
                <th class="border px-3 py-2">Planirana količina (kg)</th>
                <th class="border px-3 py-2">Status</th>
                <th class="border px-3 py-2">Akcije</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($planBerbes as $plan)
                <tr class="text-center">
                    <td class="border px-2 py-1">{{ $plan->datum->format('d.m.Y') }}</td>
                    <td class="border px-2 py-1">{{ $plan->parcela->naziv }}</td>
                    <td class="border px-2 py-1">{{ $plan->sorta->naziv }}</td>
                    <td class="border px-2 py-1">{{ $plan->planirana_kolicina_kg }}</td>
                    <td class="border px-2 py-1">{{ ucfirst($plan->status) }}</td>
                    <td class="border px-2 py-1 space-x-2">
                        <a href="{{ route('plan-berbes.show', $plan) }}" class="text-blue-600">Prikaži</a>
                        <a href="{{ route('plan-berbes.edit', $plan) }}" class="text-yellow-600">Izmeni</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4">
                        Nema planova berbe.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
