<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Models\User;

class HomeController extends Controller
{
    // Index
    public function index() {

        // All user's registered yesterday
        $yesterdayUsers = User::whereNot('created_at', 
            Carbon::today()->toDateString())
            ->where('role', User::USER)->get();

        foreach($yesterdayUsers as $yesterdayUser) {
            $yesterdayUser->delete();
        }

        // All reservations registered yesterday    
        $yesterdayReservations = Reservation::whereNot('time', Carbon::today()->toDateString())->get();

        foreach($yesterdayReservations as $yesterdayReservation) {
            $yesterdayReservation->delete();
        }

        $vars['time'] = Carbon::today()->toDateString();

        return view('home', $vars);
    }
}