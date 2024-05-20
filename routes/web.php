<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
Route::get('/dashboard', [Homecontroller::class, 'dashboard' ])->name('dashboard');
Route::get('view-clients', [Homecontroller::class, 'viewclients' ])->name('viewclients');
Route::get('new-clients', [Homecontroller::class, 'newclients' ])->name('newclients');
Route::get('water-bills', [Homecontroller::class, 'waterbills' ])->name('water-bills');
Route::get('rent', [Homecontroller::class, 'rent' ])->name('rent');
Route::get('houses', [Homecontroller::class, 'houses' ])->name('houses');



