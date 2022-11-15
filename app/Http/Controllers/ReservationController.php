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

        // Today's date
        $todayDate = $request->get('time');

        $user = User::where(function ($query) use ($request) {
            $query->where('name', $request->get('name'))
                ->where('email', $request->get('email'));
        })->first();

        if(Reservation::count() <= 40) {
            if($user) {
                if($request->get('job') == 'driver') {
                    foreach($user->reservations as $reservation) {
                        if($reservation->time == $todayDate) {
    
                            // Store user's reservation  
                            $user->reservations()->create(['time' => $todayDate, 'factor' => uniqid()]);
    
                            return back()->with('success', 'You have successfully made another registeration'); 
                        }
                    } 
                } else {
                    return back()->with('danger', 'Your job title is not the same as it was');
                }
            } 
            else {
                // Store user and user's reservations   
                $user = User::create(
                    ['name' => $request->get('name'), 'email' => $request->get('email'), 
                        'job' => $request->get('job'), 'created_at' => $todayDate]
                );
                // Store user's reservation
                $user->reservations()->create(['time' => $todayDate, 'factor' => uniqid()]);

                return back()->with('success', 'You have successfully made a registeration');
            }
        } else {
            return back()->with('danger', 'Unfortunately we are at full capacity');
        }
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
