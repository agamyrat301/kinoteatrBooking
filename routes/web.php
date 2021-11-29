<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    return view('auth.login');
    
});

Route::prefix('admin')->group(function(){

    Auth::routes(['register'=>false]);

    Route::middleware(['auth'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('spots', 'SpotController');
        Route::resource('seanses', 'SeansController');
        Route::resource('bookings', 'BookingController');
        Route::resource('fiveds', 'FivedController');
        Route::get('reports', 'ReportController@index')->name('reports.index');
        Route::get('fived_reports', 'FivedController@fived_reports')->name('reports.fived_reports');
    });
});

