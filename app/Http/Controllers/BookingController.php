<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking');
    }
    
    public function add()
    {
        return view('booking.addBooking');
    }

    public function list()
    {
        return view('booking.listBooking');
    }
}
