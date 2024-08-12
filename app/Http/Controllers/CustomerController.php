<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class CustomerController extends Controller
{
    public function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'userid' => 'required|unique:users,userid',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        

        // Create the user
        $user = new User();
        $user->userid = $request->input('userid');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Account created successfully.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('userid', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to intended page
            if (Auth::user()->category == 'admin') {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('/');
            }
        } else {
            // Authentication failed, set session error message
            return redirect()->back()->with('wrong', 'Invalid UserID or Password');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token
        
        return redirect('/login'); // Redirect to the login page or home page
    }
    public function edit()
    {
        return view('customerprofile', ['user' => Auth::user()]);
    }
}