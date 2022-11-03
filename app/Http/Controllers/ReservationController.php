<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Providers\Action;   
use App\DataTables\ReservationDataTable;
use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;
use App\Models\User;
use DB;

class ReservationController extends Controller
{
    public $action;

    public function __construct() {
        $this->action = new Action();
    }

    // Datatable to blade
    public function list() {

        $dataTable = new ReservationDataTable();

        // Reservation Table
        $vars['reservationTable'] = $dataTable->html();
 
        return view('reservation.list', $vars);
    }

    // Get reservation
    public function reservationTable(ReservationDataTable $dataTable) {
        return $dataTable->render('reservation.list');
    }

    // Store reservation
    public function store(Request $request) {

        DB::transaction(function() use($request) {

            $user = User::where(function ($query) use ($request) {
                $query->where('name', $request->get('name'))
                    ->where('email', $request->get('email'));
            })->first();

            // Think for a fucking solution
            if($user) {
                foreach($user->reservations as $reservation) {
                    if($user->job == 'driver' && $reservation->time == Carbon::today()->toDateString()) {

                        // Store user and user's reservations   
                        $this->create($request);

                    } else if($reservation->time != Carbon::today()->toDateString()) {
    
                        // Store user and user's reservations   
                        $this->create($request);
                    } 
                } 
            } else {

                // Store user and user's reservations   
                $this->create($request);

            }
             
        });

        // Do not put this for all of them
        return back()->with('success', 'The data was submitted successfully');
    }

    public function create(Request $request) {

        // Store user
        $user = User::create(
            ['name' => $request->get('name'), 'email' => $request->get('email'), 
                'job' => $request->get('job')]
        );
        // Store user's reservation
        $user->reservations()->create(['time' => $request->get('time'), 'factor' => uniqid()]);

    }

    // Edit 
    public function edit(Request $request) {
        // return $this->action->edit(Reservation::class, $request->get('id'));
        
        $values = Reservation::find($id)->with('user');

        return response()->json(['success' => true, 'message' => $values]);

    }
    
    // Delete
    public function delete($id) {
        return $this->action->delete(Reservation::class, $id);
    }
}
