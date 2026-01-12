@extends('layouts.public')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Moji unosi berbe</h1>

        <a href="{{ route('unos-berbes.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Novi unos berbe
        </a>
    </div>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">Datum</th>
                <th class="border px-3 py-2">Parcela</th>
                <th class="border px-3 py-2">Sorta</th>
                <th class="border px-3 py-2">Uneto (kg)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($unosi as $unos)
                <tr class="text-center">
                    <td class="border px-2 py-1">{{ $unos->planBerbe->datum->format('d.m.Y') }}</td>
                    <td class="border px-2 py-1">{{ $unos->planBerbe->parcela->naziv }}</td>
                    <td class="border px-2 py-1">{{ $unos->planBerbe->sorta->naziv }}</td>
                    <td class="border px-2 py-1">{{ $unos->uneta_kolicina_kg }}</td>
                    @php
                    $plan = $unos->planBerbe;
                    $ukupno = $plan->unosi()->sum('uneta_kolicina_kg');
                    $procenat = min(100, round(($ukupno / $plan->planirana_kolicina_kg) * 100));
                @endphp

                <td class="border px-2 py-1">
                    <div class="w-full bg-gray-200 rounded h-4 overflow-hidden">
                        <div class="h-4 bg-green-600 text-xs text-white text-center"
                            style="width: {{ $procenat }}%">
                            {{ $procenat }}%
                        </div>
                    </div>
                </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">
                        Nema unosa berbe.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
