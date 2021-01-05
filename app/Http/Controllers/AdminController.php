<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function add()
    {
        return view('admin.addAdmin');
    }

    public function list()
    {
        return view('admin.listAdmin');
    }
}
