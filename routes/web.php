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
    return view('landingpage');
});

Route::get("booking",[App\Http\Controllers\Customer\bookingController::class,"index"]);


Route::get("dashboard",[App\Http\Controllers\DashboardController::class,"index"]);
Route::get("paket",[App\Http\Controllers\PaketController::class,"index"]);
Route::get("layanan",[App\Http\Controllers\LayananController::class,"index"]);