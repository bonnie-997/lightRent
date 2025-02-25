<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Noleggio Veicoli')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-blue-600 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between">
            <a href="{{ url('/') }}" class="text-xl font-bold">Noleggio Veicoli</a>
            <div>
                <a href="{{ route('vehicles.index') }}" class="px-4">Veicoli</a>
                <a href="{{ route('customers.index') }}" class="px-4">Clienti</a>
                <a href="{{ route('rentals.index') }}" class="px-4">Noleggi</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-6">
        @yield('content')
    </div>

</body>
</html>