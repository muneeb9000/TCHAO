<?php

namespace App\Http\Controllers;

use App\Models\Rentals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

        dd($request);
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

        // Assign publisher ID
        $rentalProperty->publisher_id = Auth::id(); 

        // Save the rental property
        $rentalProperty->save();

        return redirect()->route('rentals.index')->with('success', 'Rental Property added successfully.');
    }


    public function show($id)
    {
        $rental = Rentals::findOrFail($id);
        return view('booking', compact('rental')); 
    }

    public function edit(Rentals $rental)
    {
        $cities = Cities::all();
        return view('rentals.edit', compact('rental', 'cities'));
    }
    
    public function update(Request $request, $id)
{
    // Find the rental property by ID
    $rental = Rentals::findOrFail($id);

    // Update the rental property details
    $rental->rental_name = $request->rental_name;
    $rental->rental_category = $request->rental_category;
    $rental->city_id = $request->city_id;
    $rental->each_person_price = $request->each_person_price;
    $rental->address = $request->address;
    $rental->phone = $request->phone;
    $rental->description = $request->description;
    $rental->size_in_sqm = $request->size_in_sqm;
    $rental->max_people = $request->max_people;
    $rental->common_rooms = $request->common_rooms;
    $rental->bedrooms = $request->bedrooms;
    $rental->bathrooms = $request->bathrooms;
    $rental->exterior = $request->exterior;

    // Handle image upload if a new image is provided
    if ($request->hasFile('rental_property_pictures')) {
        // Get the uploaded file as a single instance
        $image = $request->file('rental_property_pictures');

        // Ensure $image is an instance of UploadedFile
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            // Store the image and get the filename
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Use getClientOriginalExtension instead
            $image->move(public_path('images/rentals'), $imageName);

            // Optionally delete the old image if necessary
            // if ($rental->rental_property_pictures) {
            //     Storage::delete('images/rentals/' . $rental->rental_property_pictures);
            // }

            // Update the image field in the database
            $rental->rental_property_pictures = $imageName;
        } else {
            return redirect()->back()->with('error', 'Uploaded file is not valid.');
        }
    }

    // Save the updated rental property details
    $rental->save();

    // Redirect back with a success message
    return redirect()->route('rentals.index')->with('success', 'Rental property updated successfully.');
}


    

    public function destroy(Rentals $rental)
    {
        if ($rental->rental_property_pictures && file_exists(public_path('main/' . $rental->rental_property_pictures))) {
            unlink(public_path('main/' . $rental->rental_property_pictures));
        }
        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }
    public function book($id)
    {
        $rental = Rentals::findOrFail($id);
        return view('booking', compact('rental')); 
    }
}
