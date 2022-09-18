<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    # Index
    public function index() {

        $vars['time'] = Carbon::today()->toDateString();

        return view('main', $vars);
    }
}
