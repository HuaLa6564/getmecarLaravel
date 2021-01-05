<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return view('car');
    }

    public function add()
    {
        return view('car.addCar');
    }

    public function list()
    {
        return view('car.listCar');
    }
}
