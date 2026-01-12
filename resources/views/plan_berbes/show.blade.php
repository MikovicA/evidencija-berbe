@extends('layouts.public')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4 text-center">Detalji plana berbe</h1>

    <ul class="space-y-2">
        <li><strong>Datum:</strong> {{ $planBerbe->datum->format('d.m.Y') }}</li>
        <li><strong>Parcela:</strong> {{ $planBerbe->parcela->naziv }}</li>
        <li><strong>Sorta:</strong> {{ $planBerbe->sorta->naziv }}</li>
        <li><strong>Planirano (kg):</strong> {{ $planBerbe->planirana_kolicina_kg }}</li>
        <li><strong>Status:</strong> {{ ucfirst($planBerbe->status) }}</li>
    </ul>

    <a href="{{ route('plan-berbes.index') }}"
       class="inline-block mt-6 text-blue-600 hover:underline">
        ← Nazad na listu
    </a>
</div>
@endsection
