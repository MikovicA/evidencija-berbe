@extends('layouts.public')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="text-center">

        

        @if(auth()->user()->role === 'gazda')
            <h4 class="mb-4">Dobro došao, Gazda</h4>

            <a href="{{ route('plan-berbes.index') }}"
               class="btn btn-lg btn-success px-5 py-3 shadow">
               
                📅 Planiranje i upravljanje berbom
            </a>

        @elseif(auth()->user()->role === 'radnik')
            <h4 class="mb-4">Dobro došao, Radniče</h4>

            <a href="{{ route('unos-berbes.index') }}"
               class="btn btn-lg btn-primary px-5 py-3 shadow">
                🧺 Novi unos berbe
            </a>
        @endif

    </div>
</div>
@endsection
