<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe; 
use Stripe\Checkout\Session;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;


class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        
        // dd($request);
        // Set the Stripe API key
        Stripe::setApiKey(config('services.stripe.secret'));
        
        // Get input data
        $numberOfPersons = $request->input('number_of_persons');
        $eachPersonPrice = $request->input('each_person_price');
        $rentalName = $request->input('rental_name');
        $arrivalDate = $request->input('arrival_date');
        $departureDate = $request->input('departure_date');
        $rentalID = $request->input('rental_id');
        $cityID = $request->input('city');
    
      
        // Ensure the values are correct before using them
        if ($numberOfPersons < 1 || $eachPersonPrice <= 0) {
            return response()->json(['error' => 'Invalid quantity or price'], 400);
        }
    
        // Calculate total amount
        $totalAmount = $numberOfPersons * $eachPersonPrice * 100; // Convert to cents
    
        // Store necessary data in the session
        $request->session()->put('arrival_date', $arrivalDate);
        $request->session()->put('departure_date', $departureDate);
        $request->session()->put('number_of_persons', $numberOfPersons);
        $request->session()->put('payment_amount', $totalAmount); // Store payment amount
        $request->session()->put('rental_name', $rentalName);
        $request->session()->put('rental_id', $rentalID);
        $request->session()->put('city', $cityID);
        // Create a new session for Stripe Checkout
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $rentalName, // Use the rental name from the request
                    ],
                    'unit_amount' => (int)($eachPersonPrice * 100), // Price per person in cents
                ],
                'quantity' => (int)$numberOfPersons, // Number of persons (must be >= 1)
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);
    
        // Redirect to the Stripe Checkout page
        return redirect($session->url);
    }
    

    
    
        public function checkoutSuccess(Request $request)
        {
            // dd($request);
            // Get the authenticated user
            $userId = Auth::id();

            // Get the payment details from the session or request
            // You can use session or some other method to retrieve payment details if needed
            $arrivalDate = $request->session()->get('arrival_date'); // Store this in session during checkout
            $departureDate = $request->session()->get('departure_date'); // Store this in session during checkout
            $numberOfPersons = $request->session()->get('number_of_persons'); // Store this in session during checkout
            $paymentAmount = $request->session()->get('payment_amount'); // Store this in session during checkout
            $rentalName = $request->session()->get('rental_name');
            $rentalID = $request->session()->get('rental_id');
            $cityID = $request->session()->get('city');

            // dd($request);
            Booking::create([
                'user_id' => $userId,
                'rental_id' => $rentalID,
                'city_name' => $cityID,
                'rental_name' => $rentalName,
                'number_of_persons' => $numberOfPersons,
                'arrival_date' => $arrivalDate,
                'departure_date' => $departureDate,
                'payment_amount' => $paymentAmount,
                'payment_method' => 'stripe', // Hardcoded payment method
                'payment_time' => now(), // Current timestamp
            ]);

            // Optionally, you can clear session data if not needed anymore
            $request->session()->forget(['arrival_date', 'departure_date', 'number_of_persons', 'payment_amount']);

            // Redirect to a success page or show a success message
            return redirect()->route('bookings.index'); // Change this to your success view
        }
}
