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
    $data = $request->all();
    $data['publisher_id'] = Auth::id();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('main'), $imageName);
        $data['rental_property_pictures'] = $imageName; // Save just the filename
    }

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

    public function update(Request $request, $id)
    {
        // Find the rental record by ID
        $rental = Rentals::findOrFail($id);
    
        // Get all the request data
        $data = $request->all();
        $data['publisher_id'] = Auth::id(); // Update the user ID using Auth facade
    
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Generate a unique name for the image
            $image->move(public_path('main'), $imageName); // Save the new image to 'public/main'
    
            // Delete the old image from the 'main' folder if it exists
            if ($rental->rental_property_pictures && file_exists(public_path('main/' . $rental->rental_property_pictures))) {
                unlink(public_path('main/' . $rental->rental_property_pictures));
            }
    
            // Store the new image name in the database
            $data['rental_property_pictures'] = $imageName; // Save just the filename
        }
    
        // Update the rental record with the new data
        $rental->update($data);
    
        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
    }
    

    public function destroy(Rentals $rental)
    {
        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
