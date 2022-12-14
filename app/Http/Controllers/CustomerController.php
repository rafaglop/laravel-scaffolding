<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('front.customer.index');
    }

    public function usePincode()
    {
        return view('front.customer.pincode.index');
    }
}
