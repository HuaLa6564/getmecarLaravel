<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers');
    }

    public function add()
    {
        return view('customer.addCustomer');
    }

    public function list()
    {
        return view('customer.listCustomer');
    }
}
