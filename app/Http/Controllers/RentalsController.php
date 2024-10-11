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
        return view('rentals.list', compact('rentals'));
    }

    public function create()
    {
        $cities = Cities::all();
        return view('rentals.add', compact('cities')); 
    }

    public function store(Request $request)
    {
        // Create a new RentalProperty instance
        $rentalProperty = new Rentals();

        // Assign request data to the model
        $rentalProperty->rental_name = $request->input('rental_name');
        $rentalProperty->rental_category = $request->input('rental_category');
        $rentalProperty->city_id = $request->input('city_id');
        $rentalProperty->each_person_price = $request->input('each_person_price');
        $rentalProperty->address = $request->input('address');
        $rentalProperty->phone = $request->input('phone');
        $rentalProperty->description = $request->input('description');
        $rentalProperty->size_in_sqm = $request->input('size_in_sqm');
        $rentalProperty->max_people = $request->input('max_people');
        $rentalProperty->common_rooms = $request->input('common_rooms') ?? 0; // Default to 0 if not provided
        $rentalProperty->bedrooms = $request->input('bedrooms') ?? 1; // Default to 1 if not provided
        $rentalProperty->bathrooms = $request->input('bathrooms') ?? 1; // Default to 1 if not provided
        $rentalProperty->exterior = $request->input('exterior');

        // Handle equipment fields
        $equipmentFields = [
            'baby_bed', 'double_bed', 'sofa_bed', 'duvets', 'pillows', 
            'sheets', 'pillow_protectors', 'shower', 'bath_towels', 
            'washing_machine', 'microwave', 'hotplates', 'fridge', 
            'freezer', 'coffee_maker', 'tea_towels', 'table', 
            'chairs', 'baby_high_chair', 'coffee_table', 'television', 
            'fan', 'smoke_detector'
        ];

        foreach ($equipmentFields as $field) {
            $rentalProperty->$field = $request->input($field) ? true : false;
        }

        // Handle file upload for rental property pictures
        if ($request->hasFile('rental_property_pictures')) {
            $filePath = $request->file('rental_property_pictures')->store('rental_pictures', 'public');
            $rentalProperty->rental_property_pictures = $filePath;
        }

        // Save the rental property
        $rentalProperty->save();

        return redirect()->route('rentals.index')->with('success', 'Rental Property added successfully.');
    }

    public function show(Rentals $rental)
    {
        return view('rentals.show', compact('rental')); 
    }

    public function edit(Rentals $rental)
    {
        $cities = Cities::all();
        return view('rentals.edit', compact('rental', 'cities'));
    }

    public function update(Request $request, $id)
    {
        // Find the rental property by ID
        $rentalProperty = RentalProperty::findOrFail($id);

        // Assign request data to the model
        $rentalProperty->rental_name = $request->input('rental_name');
        $rentalProperty->rental_category = $request->input('rental_category');
        $rentalProperty->city_id = $request->input('city_id');
        $rentalProperty->each_person_price = $request->input('each_person_price');
        $rentalProperty->address = $request->input('address');
        $rentalProperty->phone = $request->input('phone');
        $rentalProperty->description = $request->input('description');
        $rentalProperty->size_in_sqm = $request->input('size_in_sqm');
        $rentalProperty->max_people = $request->input('max_people');
        $rentalProperty->common_rooms = $request->input('common_rooms') ?? 0; // Default to 0 if not provided
        $rentalProperty->bedrooms = $request->input('bedrooms') ?? 1; // Default to 1 if not provided
        $rentalProperty->bathrooms = $request->input('bathrooms') ?? 1; // Default to 1 if not provided
        $rentalProperty->exterior = $request->input('exterior');

        // Handle equipment fields
        foreach ($equipmentFields as $field) {
            $rentalProperty->$field = $request->input($field) ? true : false;
        }

        // Handle file upload for rental property pictures
        if ($request->hasFile('rental_property_pictures')) {
            // Delete old picture if exists
            if ($rentalProperty->rental_property_pictures) {
                Storage::disk('public')->delete($rentalProperty->rental_property_pictures);
            }
            $filePath = $request->file('rental_property_pictures')->store('rental_pictures', 'public');
            $rentalProperty->rental_property_pictures = $filePath;
        }

        // Save the updated rental property
        $rentalProperty->save();

        return redirect()->route('rentals.index')->with('success', 'Rental Property updated successfully.');
    }

    public function destroy(Rentals $rental)
    {
        if ($rental->rental_property_pictures && file_exists(public_path('main/' . $rental->rental_property_pictures))) {
            unlink(public_path('main/' . $rental->rental_property_pictures));
        }
        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
