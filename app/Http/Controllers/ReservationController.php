<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

            $user = User::where(function ($query) {
                $query->where('name', $request->get('name'))
                    ->where('email', $request->get('email'))
                    ->where('job', 'truck driver')
                    ->orWhere('job', 'taxt driver')->first();
            });

            if(!$user) {
                // Store user
                $user = User::create(
                    ['name' => $request->get('name'), 'email' => $request->get('email'),
                        'job' => $request->get('job')]
                );
                // Store user's reservation
                $user->reservations()->create(['time' => $request->get('time'), 'factor' => uniqid()]);


            } else {
                foreach($user->reservations as $reservation) {

                    if($reservation->time == $request->get('time')) {

                        // Store user
                        $user = User::create(
                            ['name' => $request->get('name'), 'email' => $request->get('email'), 
                                'job' => $request->get('job')]
                        );
                        // Store user's reservation
                        $user->reservations()->create(['time' => $request->get('time'), 'factor' => uniqid()]);

                    } else {
                        
                        return back()->with('danger', 'The data was not submitted successfully');
                    }
                }
            }  
        });
        
        return back()->with('success', 'The data was submitted successfully');
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
