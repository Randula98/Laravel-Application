<?php

// Created by RandulaM on 17-01-2025

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        // Get the search input from the request
        $search = $request->input('search');
        $dob_start = $request->input('dob_start'); 
        $dob_end = $request->input('dob_end');     
        $view_all = $request->input('view_all');   

        // Initialize the query for filtering customers
        $query = Customer::query();

        // If a search query is provided, filter customers by name or mobile
        if ($search) {
            $query->where('p_name', 'like', "%{$search}%")
                ->orWhere('p_mobile', 'like', "%{$search}%");
        }

        // If a date range filter is provided, filter customers by dob
        if ($dob_start && $dob_end) {
            $query->whereBetween('p_dob', [$dob_start, $dob_end]);
        } elseif ($dob_start) {
            // If only the start date is provided
            $query->whereDate('p_dob', '>=', $dob_start);
        } elseif ($dob_end) {
            // If only the end date is provided
            $query->whereDate('p_dob', '<=', $dob_end);
        }

        // If 'view_all' is selected, get all customers, otherwise paginate
        if ($view_all) {
            $customers = $query->get();
        } else {
            $customers = $query->paginate(10);
        }

        return view('customers.index', compact('customers', 'view_all'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('customers.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'p_name' => 'required|max:255|string',
            'p_address' => 'required|max:255|string',
            'p_dob' => 'required|date',
            'p_mobile' => 'required|max:10|string',
        ]);

        // Create and save the customer
        $customer = new Customer();
        $customer->p_name = $request->p_name;
        $customer->p_address = $request->p_address;
        $customer->p_dob = $request->p_dob;
        $customer->p_mobile = $request->p_mobile;
        $customer->save();

        // Redirect with success message
        return redirect()->route('customers.index')->with('status', 'Customer added successfully');
    }

    // Display the specified resource by id.
    public function show(int $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    // Show the form for editing the specified resource by id.
    public function edit(int $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'p_name' => 'required|max:255|string',
            'p_address' => 'required|max:255|string',
            'p_dob' => 'required|date',
            'p_mobile' => 'required|max:10|string',
        ]);

        // Find the customer by ID
        $customer = Customer::findOrFail($id);

        // Update the customer details
        $customer->p_name = $request->p_name;
        $customer->p_address = $request->p_address;
        $customer->p_dob = $request->p_dob;
        $customer->p_mobile = $request->p_mobile;

        // Save the updated customer data
        $customer->save();

        // Redirect back to the customers index with a success message
        return redirect()->route('customers.index')->with('status', 'Customer updated successfully!');
    }


    // Remove the specified resource from storage.
    public function destroy(int $id)
    {
        // Find and delete the customer
        $customer = Customer::findOrFail($id);
        $customer->delete();

        // Redirect with success message
        return redirect()->route('customers.index')->with('status', 'Customer deleted successfully');
    }
}
