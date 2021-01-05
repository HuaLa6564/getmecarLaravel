<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutsController extends Controller
{

    public function header()
    {
        return view('layouts.header');
    }
}
