<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('Customers.index', compact('customers'));
    }

    public function create()
    {
        return view('Customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'SIRET' => 'required|string|max:20'
        ]);

        $customer = Customer::create($validated);

        return response()->json([
            'message' => 'Customer created successfully',
            'customer' => $customer
        ], 201);
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('Customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|',
            'SIRET' => 'required|string|max:20'
        ]);

        $customer = Customer::find($id);
        $customer->update($validated);

        return response()->json([
            'message' => 'Customer update successfully',
            'customer' => $customer
        ]);
    }

    public function destroy($id)
    {
        $customers = Customer::find($id);
        $customers->delete();
        return redirect()->route('Customer.index')->with('success', 'Customer deleted successfully.');
    }
}
