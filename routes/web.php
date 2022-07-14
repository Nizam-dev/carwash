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


Route::get("/",[App\Http\Controllers\Customer\LandingpageController::class,"index"]);
Route::get("booking",[App\Http\Controllers\Customer\bookingController::class,"index"]);
Route::post("kirimpesanan",[App\Http\Controllers\Customer\bookingController::class,"kirimpesanan"]);

Route::post("getpaketlayanan",[App\Http\Controllers\Customer\getPaketLayananController::class,"getpaketlayanan"]);


Route::get("login",[App\Http\Controllers\LoginController::class,"index"])->name('login');
Route::post("login",[App\Http\Controllers\LoginController::class,"login"])->name('login');

Auth::routes(['register' => false,'login' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin

Route::get("dashboard",[App\Http\Controllers\Admin\DashboardController::class,"index"]);
Route::get("paket",[App\Http\Controllers\Admin\PaketController::class,"index"]);
Route::get("detailing",[App\Http\Controllers\Admin\DetailingController::class,"index"]);
Route::get("listpesanan",[App\Http\Controllers\Admin\ListPesananController::class,"index"]);
