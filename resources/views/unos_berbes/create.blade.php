@extends('layouts.public')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Novi unos berbe</h1>

    <form method="POST" action="{{ route('unos-berbes.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Plan berbe</label>
            <select name="plan_berbe_id" class="w-full border rounded p-2" required>
                <option value="">-- izaberi --</option>
                @foreach($planovi as $plan)
                    <option value="{{ $plan->id }}">
                        {{ $plan->datum }} | {{ $plan->parcela->naziv }} | {{ $plan->sorta->naziv }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Uneta količina (kg)</label>
            <input type="number" step="0.01" name="uneta_kolicina_kg"
                   class="w-full border rounded p-2" required>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Sačuvaj
        </button>
    </form>
</div>
@endsection
