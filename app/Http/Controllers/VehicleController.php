<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required|string|max:255',
            'type' => 'required|in:car,scooter,bike',
            'battery_capacity' => 'required|integer|min:0',
            'status' => 'required|in:available,rented,maintenance',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')->with('Ottimo!', 'Veicolo aggiunto con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'model' => 'required|string|max:255',
            'type' => 'required|in:car,scooter,bike',
            'battery_capacity' => 'required|integer|min:0',
            'status' => 'required|in:available,rented,maintenance',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Veicolo aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Veicolo eliminato con successo!');
    }
}
