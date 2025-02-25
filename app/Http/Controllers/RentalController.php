<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $vehicles = Vehicle::where('status', 'available')->get();
        $customers = Customer::all();
        return view('rentals.create', compact('vehicles', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'customer_id' => 'required|exists:customers,id',
            'start_time' => 'required|date',
        ]);

        $rental = Rental::create([
            'vehicle_id' => $request->vehicle_id,
            'customer_id' => $request->customer_id,
            'start_time' => $request->start_time,
            'status' => 'active',
        ]);

        Vehicle::where('id', $request->vehicle_id)->update(['status' => 'rented']);

        return redirect()->route('rentals.index')->with('success', 'Noleggio avviato con successo!');
    }

    public function complete(Rental $rental)
    {
        $rental->update([
            'end_time' => now(),
            'status' => 'completed',
            'total_cost' => $this->calculateCost($rental),
        ]);

        Vehicle::where('id', $rental->vehicle_id)->update(['status' => 'available']);

        return redirect()->route('rentals.index')->with('success', 'Noleggio completato!');
    }

    private function calculateCost(Rental $rental)
    {
        $hours = max(1, now()->diffInHours($rental->start_time));
        return $hours * $rental->vehicle->hourly_rate;
    }
}
