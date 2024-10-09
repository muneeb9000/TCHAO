<?php

namespace App\Http\Controllers;

use App\Models\Rentals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cities;

class RentalsController extends Controller
{
    public function index()
    {
        $rentals = Rentals::where('publisher_id', Auth::id())->get();
        $rentals = Rentals::all(); // Get all rentals
        return view('rentals.list', compact('rentals'));
    }

    public function create()
    {
        $cities = Cities::all();
        return view('rentals.add', compact('cities')); // Show the create form
    }

    public function store(Request $request)
    {

        // Prepare data with the authenticated user's ID
        $data = $request->all();
        $data['publisher_id'] = Auth::id(); // Store the user ID using Auth facade

        // Create the rental record
        Rentals::create($data); 

        return redirect()->route('rentals.index')->with('success', 'Rental created successfully.');
    }


    public function show(Rentals $rental)
    {
        return view('rentals.show', compact('rental')); 
    }

    public function edit(Rentals $rental)
    {
        $cities = Cities::all();
        return view('rentals.edit', compact('rental','cities'));
    }

    public function update(Request $request, Rentals $rental)
    {
       
        $rental->update($request->all());

        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
    }

    public function destroy(Rentals $rental)
    {
        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
