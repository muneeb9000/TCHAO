<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;
class BookingController extends Controller
{
   public function index()
   {
         $customers = Customer::all();
         $bookings = Booking::with(['customers', 'users'])->get();
         return view('bookings.list', compact('customers','bookings'));
   }
}
