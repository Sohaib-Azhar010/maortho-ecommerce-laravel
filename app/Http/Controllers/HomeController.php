<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }
}
