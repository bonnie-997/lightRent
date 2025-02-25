@extends('layouts.app')

@section('title', 'Lista Noleggi')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Lista Noleggi</h1>

    <a href="{{ route('rentals.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Nuovo Noleggio</a>

    <table class="w-full border-collapse bg-white text-left shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3">Cliente</th>
                <th class="p-3">Veicolo</th>
                <th class="p-3">Inizio</th>
                <th class="p-3">Fine</th>
                <th class="p-3">Costo Totale</th>
                <th class="p-3">Stato</th>
                <th class="p-3">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
                <tr class="border-b">
                    <td class="p-3">{{ $rental->customer->name }}</td>
                    <td class="p-3">{{ $rental->vehicle->model }}</td>
                    <td class="p-3">{{ $rental->start_time }}</td>
                    <td class="p-3">{{ $rental->end_time ?? 'In corso' }}</td>
                    <td class="p-3">{{ $rental->total_cost ?? 'N/D' }} €</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-white 
                            {{ $rental->status === 'active' ? 'bg-green-500' : ($rental->status === 'completed' ? 'bg-gray-500' : 'bg-red-500') }}">
                            {{ ucfirst($rental->status) }}
                        </span>
                    </td>
                    <td class="p-3">
                        @if($rental->status === 'active')
                            <form action="{{ route('rentals.complete', $rental->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600">Completa</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection