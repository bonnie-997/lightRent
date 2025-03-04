@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifica Cliente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefono</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $customer->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="license_number" class="form-label">Numero di Patente</label>
            <input type="text" name="license_number" class="form-control" value="{{ old('license_number', $customer->license_number) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection