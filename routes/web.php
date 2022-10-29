<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
    // Logout
    Route::post('/logout', [AdminController::class, 'logout']);
    // Admin
    Route::get('/admin/home', [AdminController::class, 'index']);
    Route::group(['prefix' => 'admin','as' => 'admin.'], function() {
        Route::get('list',  [AdminController::class, 'list']);
        Route::get('table/list',  [AdminController::class, 'adminTable'])->name('list.table');
        Route::post('store',  [AdminController::class, 'store']);
        Route::get('edit',  [AdminController::class, 'edit']);
        Route::get('delete/{id}', [AdminController::class, 'delete']);
    });
    // User
    Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
        Route::get('list',  [UserController::class, 'list']);
        Route::get('table/list',  [UserController::class, 'userTable'])->name('list.table');
        Route::post('store',  [UserController::class, 'store']);
        Route::get('edit',  [UserController::class, 'edit']);
        Route::get('delete/{id}', [UserController::class, 'delete']);
    });
    // Reservation
    Route::group(['prefix' => 'reservation', 'as' => 'reservation.'], function() {
        Route::get('list', [ReservationController::class, 'list']);
        Route::get('table/list',  [ReservationController::class, 'reservationTable'])->name('list.table');
        Route::post('store',  [ReservationController::class, 'store']);
        Route::get('edit',  [ReservationController::class, 'edit']);
        Route::get('delete/{id}', [ReservationController::class, 'delete']);
    });
});

// Reservation
Route::post('reservation/store',  [ReservationController::class, 'store'])->name('reservation.store');  

// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Auth::routes();



