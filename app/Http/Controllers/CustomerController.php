<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;


    class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|string|max:20',
            'license_number' => 'required|string|max:50',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Cliente registrato con successo!');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }
}
