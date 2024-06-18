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
use App\Http\Controllers\RentController;
use App\Http\Controllers\ReportGenerator;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\WaterMeterReadingsController;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [Authcontroller::class, 'login'])->name('login');
Route::post('/user-login', [Authcontroller::class, 'userlogin'])->name('user.login');
Route::post('/logout', [Authcontroller::class, 'logout'])->name('logout');



// Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
// });




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
Route::get('/clients/{client}', [ClientController::class, 'clientedit'])->name('single.client');
Route::post('/client/details', [ClientController::class, 'clientview'])->name('client.view');

//houses
Route::post('houses-importer', [HouseController::class, 'import'])->name('houses-importer');

//
Route::get('single/house/{house}', [HouseController::class, 'singlehouse'])->name('single.house');
//sms sending
Route::post('sendSMS', [AfricasTalkingController::class, 'sendSMS'])->name('sendSMS');



// month.rent.bill
Route::post('month.rent.bill', [RentController::class, 'MonthlyRentBill'])->name('month.rent.bill');

//generate excel sheet for a certain month
Route::get('water-bills-template', [ExcelController::class, 'WaterTemplateDownload'])->name('water.bills.template');
Route::post('water-bills-import', [ExcelController::class, 'WaterBillsimport'])->name('water.bills.import');

//month.water.bill
Route::post('water.single.payment', [WaterMeterReadingsController::class, 'singlePayment'])->name('water.single.payment');
Route::post('water.bulk.payment', [WaterMeterReadingsController::class, 'bulkPayment'])->name('water.bulk.payment');

//get house api
Route::get('get-houses/{clientId}', [HouseController::class, 'getHousesByClientId'])->name('get-house');
Route::get('/get-client/{houseNo}', [HouseController::class, 'getClientNameByHouse']);


//report generation
Route::post('/client-report-generation', [ReportGenerator::class, 'generateClientReport']);
Route::post('/houses-report-generation', [ReportGenerator::class, 'generateHousesReport']);