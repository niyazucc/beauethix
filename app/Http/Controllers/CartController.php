<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function viewmycart()
    {
        $user = Auth::user();

        // Assuming a Cart model that relates to the User model and has a relationship to products
        $cartItems = $user->cartItems; // This depends on your actual implementation

        return view('cart', compact('cartItems'));
    }
}