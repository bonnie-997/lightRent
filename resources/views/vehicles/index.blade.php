@extends('layouts.app')

@section('title', 'Lista Veicoli')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Lista Veicoli</h1>

    <a href="{{ route('vehicles.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Aggiungi Veicolo</a>

    <table class="w-full border-collapse bg-white text-left shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3">Modello</th>
                <th class="p-3">Tipo</th>
                <th class="p-3">Stato</th>
                <th class="p-3">Tariffa oraria</th>
                <th class="p-3">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
                <tr class="border-b">
                    <td class="p-3">{{ $vehicle->model }}</td>
                    <td class="p-3">{{ ucfirst($vehicle->type) }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-white 
                            {{ $vehicle->status === 'available' ? 'bg-green-500' : ($vehicle->status === 'rented' ? 'bg-yellow-500' : 'bg-red-500') }}">
                            {{ ucfirst($vehicle->status) }}
                        </span>
                    </td>
                    <td class="p-3">{{ $vehicle->hourly_rate }} €/h</td>
                    <td class="p-3">
                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="text-blue-600">Modifica</a> |
                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection