@extends('layouts.app')

@section('title', 'Lista Clienti')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Lista Clienti</h1>

    <a href="{{ route('customers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Aggiungi Cliente</a>

    <table class="w-full border-collapse bg-white text-left shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3">Nome</th>
                <th class="p-3">Email</th>
                <th class="p-3">Telefono</th>
                <th class="p-3">Numero Patente</th>
                <th class="p-3">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr class="border-b">
                    <td class="p-3">{{ $customer->name }}</td>
                    <td class="p-3">{{ $customer->email }}</td>
                    <td class="p-3">{{ $customer->phone }}</td>
                    <td class="p-3">{{ $customer->license_number }}</td>
                    <td class="p-3">
                        <a href="{{ route('customers.show', $customer->id) }}" class="text-blue-600">Dettagli</a> |
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
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