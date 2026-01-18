<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Evidencija berbe</title>

    {{-- Breeze CSS --}}
    @if (!app()->runningUnitTests())
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-gray-100">

    {{-- Navigacija (ako želiš) --}}
    @include('layouts.navigation')

    <div class="container mx-auto mt-6">
        @yield('content')
    </div>

</body>
</html>
