<?php

namespace App\Http\Controllers;

use App\Models\Rentals;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rentals::all(); // Get all rentals
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        return view('rentals.create'); // Show the create form
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rental_name' => 'required|string|max:255',
            'rental_category' => 'required|in:Room,Apartment,House,Other',
            'pets' => 'required|in:Yes,No',
            'parking' => 'required|in:Yes,No',
            'smoking' => 'required|in:Yes,No',
            'music' => 'required|in:Yes,No',
            'no_of_shares' => 'required|integer',
            'each_person_price' => 'required|numeric',
            'address' => 'required|string',
            'phone' => 'required|string',
            'rental_property_pictures' => 'nullable|array',
            'no_of_beds' => 'required|integer',
            'washroom' => 'required|integer',
            'wifi' => 'required|in:Yes,No',
            'description' => 'nullable|string',
        ]);

        // Create new rental
        Rentals::create($validated);

        return redirect()->route('rentals.index')->with('success', 'Rental created successfully.');
    }

    public function show(Rentals $rental)
    {
        return view('rentals.show', compact('rental')); // Show specific rental details
    }

    public function edit(Rentals $rental)
    {
        return view('rentals.edit', compact('rental')); // Show the edit form
    }

    public function update(Request $request, Rentals $rental)
    {
        $validated = $request->validate([
            'rental_name' => 'required|string|max:255',
            'rental_category' => 'required|in:Room,Apartment,House,Other',
            'pets' => 'required|in:Yes,No',
            'parking' => 'required|in:Yes,No',
            'smoking' => 'required|in:Yes,No',
            'music' => 'required|in:Yes,No',
            'no_of_shares' => 'required|integer',
            'each_person_price' => 'required|numeric',
            'address' => 'required|string',
            'phone' => 'required|string',
            'rental_property_pictures' => 'nullable|array',
            'no_of_beds' => 'required|integer',
            'washroom' => 'required|integer',
            'wifi' => 'required|in:Yes,No',
            'description' => 'nullable|string',
        ]);

        // Update rental
        $rental->update($validated);

        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
    }

    public function destroy(Rentals $rental)
    {
        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
