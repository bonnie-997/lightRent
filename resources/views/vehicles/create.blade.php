@extends('layouts.app')

@section('title', 'Aggiungi Veicolo')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Aggiungi Veicolo</h1>

    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block">Modello:</label>
            <input type="text" name="model" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Tipo:</label>
            <select name="type" class="w-full p-2 border rounded">
                <option value="car">Auto</option>
                <option value="scooter">Monopattino</option>
                <option value="bike">Bicicletta</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block">Capacità Batteria (Wh):</label>
            <input type="number" name="battery_capacity" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Stato:</label>
            <select name="status" class="w-full p-2 border rounded">
                <option value="available">Disponibile</option>
                <option value="rented">Noleggiato</option>
                <option value="maintenance">Manutenzione</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block">Tariffa oraria (€):</label>
            <input type="number" step="0.01" name="hourly_rate" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Salva</button>
    </form>
</div>
@endsection