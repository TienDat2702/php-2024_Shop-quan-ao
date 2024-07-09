<?php

use App\Http\Controllers\Ajax\LocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// BACKEND ROUTE
Route::middleware(['auth.admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

   
});
// USER
Route::group(['prefix' => 'user', 'middleware' => 'auth.admin'], function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::get('create', [UserController::class, 'create'])->name('user.create');
    //AJAX
    Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.getLocation');
});



Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'store'])->name('auth.login');

