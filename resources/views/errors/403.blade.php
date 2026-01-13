<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Pristup odbijen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: white;
            padding: 40px;
            border-radius: 8px;
            text-align: center; 
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #dc2626;
            font-size: 48px;
            margin-bottom: 10px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #2563eb;
            padding: 10px 20px;
            border-radius: 5px;
        }
        a:hover {
            background-color: #1e40af;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>403</h1>
    <p><strong>Nemate dozvolu za pristup ovoj stranici.</strong></p>

    @auth
        @if(auth()->user()->role === 'radnik')
            <p>Ova funkcionalnost je dostupna samo gazdi.</p>
        @elseif(auth()->user()->role === 'gazda')
            <p>Ova funkcionalnost je dostupna samo radnicima.</p>
        @endif
    @endauth

    <a href="{{ route('dashboard') }}">Nazad na dashboard</a>
</div>

</body>
</html>
