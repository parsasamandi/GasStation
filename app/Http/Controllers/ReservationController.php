<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreReservationRequest;
use App\Models\User;
use DB;

class ReservationController extends Controller
{
    // Store reservation
    public function store(Request $request) {

        DB::transaction(function() use($request) {

            $user = User::where('name', $request->get('name'))
                ->where('job', 'truck driver')->where('job', 'taxi driver')->first();

            if(!$user) {
                // Store user
                $user = User::create(
                    ['name' => $request->get('name'), 'job' => $request->get('job')]
                );
                // Store user's reservation
                $user->reservations()->create(['time' => $request->get('time'), 'factor' => uniqid()]);

            } else {
                foreach($user->reservations as $reservation) {

                    if($reservation->time == $request->get('time')) {

                        // Store user
                        $user = User::create(
                            ['name' => $request->get('name'), 'job' => $request->get('job')]
                        );
                        // Store user's reservation
                        $user->reservations()->create(['time' => $request->get('time'), 'factor' => uniqid()]);

                    }
                }
            }  
        });
        
        return back()->with('status', 'The data was submitted successfully');
    }
}
