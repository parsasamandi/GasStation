<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    # Admin Home
    public function index() {
        return view('admin');
    }
}
