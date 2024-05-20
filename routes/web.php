<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Authcontroller;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [Authcontroller::class, 'login' ])->name('login');
Route::get('/dashboard', [Homecontroller::class, 'dashboard' ])->name('dashboard');
Route::get('view-clients', [Homecontroller::class, 'viewclients' ])->name('viewclients');
Route::get('new-clients', [Homecontroller::class, 'newclients' ])->name('newclients');
Route::get('water-bills', [Homecontroller::class, 'waterbills' ])->name('water-bills');
Route::get('rent', [Homecontroller::class, 'rent' ])->name('rent');
Route::get('houses', [Homecontroller::class, 'houses' ])->name('houses');
Route::get('admin-settings', [Homecontroller::class, 'adminsettings' ])->name('adminsettings');
Route::get('admintheme', [Homecontroller::class, 'admintheme' ])->name('admintheme');
Route::get('new-web-user', [Homecontroller::class, 'newwebuser' ])->name('new-web-user');
Route::get('new-app-user', [Homecontroller::class, 'newappuser' ])->name('new-app-user');
//

Route::post('/add-new-client', [AdminController::class, 'store'])->name('add-new-client');
