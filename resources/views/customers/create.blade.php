@extends('layouts.app')

@section('title', 'Aggiungi Cliente')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Aggiungi Cliente</h1>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block">Nome:</label>
            <input type="text" name="name" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Email:</label>
            <input type="email" name="email" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Telefono:</label>
            <input type="text" name="phone" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Numero Patente:</label>
            <input type="text" name="license_number" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Salva</button>
    </form>
</div>
@endsection