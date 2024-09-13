<?php

use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Ajax\LocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserCatalogueController;
use App\Http\Controllers\Backend\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::get('userDeleted', [UserController::class, 'userDeleted'])->name('user.userDeleted');
    Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

});

//AJAX
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changeStatus');
Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.getLocation');
Route::post('ajax/dashboard/changeStatusAll', [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashboard.changeStatusAll');

// USER CATALOGUE
Route::group(['prefix' => 'user/catalogue', 'middleware' => 'auth.admin'], function () {
    Route::get('index', [UserCatalogueController::class, 'index'])->name('user.catalogue.index');
    Route::get('userDeleted', [UserCatalogueController::class, 'userDeleted'])->name('user.catalogue.userDeleted');
    Route::get('create', [UserCatalogueController::class, 'create'])->name('user.catalogue.create');
    Route::post('store', [UserCatalogueController::class, 'store'])->name('user.catalogue.store');
    Route::get('edit/{id}', [UserCatalogueController::class, 'edit'])->name('user.catalogue.edit');
    Route::post('update/{id}', [UserCatalogueController::class, 'update'])->name('user.catalogue.update');
    Route::get('delete/{id}', [UserCatalogueController::class, 'delete'])->name('user.catalogue.delete');
    Route::delete('destroy/{id}', [UserCatalogueController::class, 'destroy'])->name('user.catalogue.destroy');
});

// BLOG
Route::group(['prefix' => 'post', 'middleware' => 'auth.admin'], function () {
    Route::get('index', [UserController::class, 'index'])->name('post.index');
    Route::get('postDeleted', [UserController::class, 'postDeleted'])->name('post.postDeleted');
    Route::get('create', [UserController::class, 'create'])->name('post.create');
    Route::post('store', [UserController::class, 'store'])->name('post.store');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('post.edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('post.update');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('post.delete');
    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('post.destroy');

});
// BLOG CATALOGUE
Route::group(['prefix' => 'post/catalogue', 'middleware' => 'auth.admin'], function () {
    Route::get('index', [UserCatalogueController::class, 'index'])->name('post.catalogue.index');
    Route::get('postDeleted', [UserCatalogueController::class, 'postDeleted'])->name('post.catalogue.postDeleted');
    Route::get('create', [UserCatalogueController::class, 'create'])->name('post.catalogue.create');
    Route::post('store', [UserCatalogueController::class, 'store'])->name('post.catalogue.store');
    Route::get('edit/{id}', [UserCatalogueController::class, 'edit'])->name('post.catalogue.edit');
    Route::post('update/{id}', [UserCatalogueController::class, 'update'])->name('post.catalogue.update');
    Route::get('delete/{id}', [UserCatalogueController::class, 'delete'])->name('post.catalogue.delete');
    Route::delete('destroy/{id}', [UserCatalogueController::class, 'destroy'])->name('post.catalogue.destroy');
});



Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'store'])->name('auth.login');

