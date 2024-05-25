<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AfricasTalkingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ThemeController;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [Authcontroller::class, 'login'])->name('login');
Route::post('/user-login', [Authcontroller::class, 'userlogin'])->name('user.login');
Route::get('/dashboard', [Homecontroller::class, 'dashboard'])->name('dashboard'); //->middleware('auth.web_user')
Route::get('view-clients', [ClientController::class, 'viewclients'])->name('viewclients');
Route::get('new-clients', [ClientController::class, 'newclients'])->name('newclients');
Route::get('water-bills', [Homecontroller::class, 'waterbills'])->name('water-bills');
Route::get('rent', [Homecontroller::class, 'rent'])->name('rent');
Route::get('houses', [Homecontroller::class, 'houses'])->name('houses');
Route::get('users', [Homecontroller::class, 'users'])->name('users');
Route::get('admintheme', [ThemeController::class, 'admintheme'])->name('admintheme');
Route::post('theme', [ThemeController::class, 'theme'])->name('theme');



//
Route::prefix('notice')->name('not.')->group(function () {
    Route::prefix('in')->name('in.')->group(function () {
        Route::get('in', [MessagesController::class, 'notice'])->name('all');
    });

    Route::prefix('out')->name('out.')->group(function () {
        Route::get('out', [MessagesController::class, 'notice'])->name('all');
        Route::get('water-bills', [MessagesController::class, 'waterbills'])->name('water-bills');
    });
});




//

Route::post('new-web-user', [Authcontroller::class, 'newwebuser'])->name('new-web-user');
Route::post('new-app-user', [Authcontroller::class, 'newappuser'])->name('new-app-user');
//

Route::post('/add-new-client', [ClientController::class, 'store'])->name('add-new-client');

//view a single client
Route::get('/clients/{client}', [ClientController::class, 'singleclient'])->name('single.client');
Route::post('/client/details', [ClientController::class, 'clientview'])->name('client.view');

//houses
Route::post('houses-importer', [HouseController::class, 'import'])->name('houses-importer');

//
Route::get('single/house/{house}', [HouseController::class, 'singlehouse'])->name('single.house');
//sms sending
Route::get('sendSMS', [AfricasTalkingController::class, 'sendSMS'])->name('sendSMS');


//generate excel sheet for a certain month
Route::get('water-bills-template', [ExcelController::class, 'WaterTemplateDownload'])->name('water.bills.template');
Route::post('water-bills-import', [ExcelController::class, 'WaterBillsimport'])->name('water.bills.import');
