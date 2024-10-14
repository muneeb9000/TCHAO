<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Rentals;


class HomeController extends Controller
{
    public function index()
    {
        $rentals = Rentals::all();
        $cities = Cities::all();
        return view('welcome', compact('rentals','cities'));
    }

    public function cityrentals(Request $request)
    {
        $cityId = $request->input('city_id');
        $rentals = Rentals::where('city_id', $cityId)->get();
        return view('rentals', compact('rentals', 'cityId'));
    }


}
