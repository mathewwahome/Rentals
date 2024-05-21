<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HouseController;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [Authcontroller::class, 'login'])->name('login');
Route::get('/dashboard', [Homecontroller::class, 'dashboard'])->name('dashboard');
Route::get('view-clients', [ClientController::class, 'viewclients'])->name('viewclients');
Route::get('new-clients', [ClientController::class, 'newclients'])->name('newclients');
Route::get('water-bills', [Homecontroller::class, 'waterbills'])->name('water-bills');
Route::get('rent', [Homecontroller::class, 'rent'])->name('rent');
Route::get('houses', [Homecontroller::class, 'houses'])->name('houses');
Route::get('admin-settings', [Homecontroller::class, 'adminsettings'])->name('adminsettings');
Route::get('admintheme', [Homecontroller::class, 'admintheme'])->name('admintheme');
Route::get('new-web-user', [Homecontroller::class, 'newwebuser'])->name('new-web-user');
Route::get('new-app-user', [Homecontroller::class, 'newappuser'])->name('new-app-user');
//

Route::post('/add-new-client', [ClientController::class, 'store'])->name('add-new-client');

//view a single client
Route::get('/clients/{client}', [ClientController::class, 'singleclient'])->name('single.client');
Route::post('/client/details', [ClientController::class, 'clientview'])->name('client.view');

//houses
Route::post('houses-importer', [HouseController::class, 'import'])->name('houses-importer');

//
Route::get('single/house/{house}', [HouseController::class, 'singlehouse'])->name('single.house');
//
