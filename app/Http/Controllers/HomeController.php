<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Reservation;

class HomeController extends Controller
{
    // Index
    public function index() {

        // Yesterday's reservationsa    
        $yesterdayReservations = Reservation::whereNot('time', Carbon::today()->toDateString())->get();

        foreach($yesterdayReservations as $yesterdayReservation) {
            $yesterdayReservation->delete();
        }

        $vars['time'] = Carbon::today()->toDateString();

        return view('home', $vars);
    }
}