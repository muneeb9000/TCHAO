<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('authentication.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->role == 1) {
                return redirect()->route('admin_dashboard'); 
            } elseif ($user->role == 2) {
                return redirect()->route('customer_dashboard'); 
            }
        }
        return back()->withErrors([
            'loginError' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/loginform');
    }
    public function showRegisterForm()
    {
        return view('authentication.register');
    }
        public function register(Request $request)
    {
       
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:15|unique:customers',
        ]);
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'role' => 2,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Customer::create([
            'user_id' => $user->id, 
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name, 
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        Auth::login($user); 
        return redirect()->route('customer_dashboard')->with('success', 'Account created successfully!');
    }

}
