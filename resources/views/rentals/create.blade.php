@extends('layouts.app')

@section('title', 'Nuovo Noleggio')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Nuovo Noleggio</h1>

    <form action="{{ route('rentals.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block">Cliente:</label>
            <select name="customer_id" class="w-full p-2 border rounded">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block">Veicolo:</label>
            <select name="vehicle_id" class="w-full p-2 border rounded">
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->model }} - {{ ucfirst($vehicle->type) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block">Data e Ora Inizio:</label>
            <input type="datetime-local" name="start_time" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Avvia Noleggio</button>
    </form>
</div>
@endsection