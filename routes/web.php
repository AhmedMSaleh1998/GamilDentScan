<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'web'], function () {

        Route::get('/home', 'IndexController@index')->name('home');
        Route::resource('patient', 'PatientController');
        Route::resource('dentist', 'DentistController');
        Route::resource('scantype', 'ScanTypeController');
        Route::resource('scan', 'ScanController');
        Route::resource('reception', 'ReceptionController');
        Route::resource('technician', 'TechnicianController');
        Route::resource('paymentmethod', 'PaymentMethodController');
        Route::resource('doctor', 'DoctorController');
        Route::resource('scanfile', 'ScanFileController');
    });
});
