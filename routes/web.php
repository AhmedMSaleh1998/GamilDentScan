<?php

use App\Http\Controllers\ScanController;
use App\Http\Controllers\DentistController;
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
        Route::get('/dentist/show/{id}',[DentistController::class, 'show'])->name('dentist.show');
        Route::get('/dentist/{id}/scans',[DentistController::class, 'patients'])->name('dentist.patients');
        //Route::get('dentist/scans', 'DentistController@patients')->name('dentist.patients');
        Route::resource('scanType', 'ScanTypeController');
        Route::resource('organization', 'OrganizationController');
        /* Route::resource('scan', 'ScanController'); */
        Route::controller(ScanController::class)->group(
            function () {
                Route::get('patient/{id}/scans/', 'index')->name('patient.scans.index');
                Route::get('patient/{id}/scans/create/', 'create')->name('patient.scans.create');
                Route::get('scans/{scan_id}', 'show')->name('patient.scans.show');
                Route::post('patient/{id}/scans/store', 'store')->name('patient.scans.store');
                Route::get('patient/{id}/scans/edit', 'edit')->name('patient.scans.edit');
                Route::put('patient/{id}/scans/update', 'update')->name('patient.scans.update');
                Route::delete('patient/{id}/scans/delete', 'destroy')->name('patient.scans.delete');
            }
        );

        Route::controller(ScanFileController::class)->group(
            function () {
        Route::get('patient/scans/{id}/file/', 'index')->name('patient.scans.files.index');
        Route::get('patient/scans/{id}/file/create', 'create')->name('patient.scans.files.create');
        Route::post('patient/scans/{id}/file/store', 'store')->name('patient.scans.files.store');
        Route::delete('patient/scans/{id}/file/delete', 'destroy')->name('patient.scans.files.destroy');
            }
        );


        Route::resource('receptionist', 'ReceptionistController');
        Route::resource('technician', 'TechnicianController');
        Route::resource('paymentmethod', 'PaymentMethodController');
        Route::resource('doctor', 'DoctorController');
        /* Route::resource('scanfile', 'ScanFileController'); */
        Route::resource('district', 'DistrictController');
        Route::get('/AllScans', [ScanController::class, 'All'])->name('allScans');

        Route::post('fetch-scanTypes', 'ScanController@fetchScanType')->name('fetch-scanTypes');
    });

    Route::get('/https://wa.me/{phone}?text=')->name('whatsapp');
    Route::get('/scanTypes/{organization_id}', [ScanController::class, 'getScanTypes']);


});
