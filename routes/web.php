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
Route::resource("paket",App\Http\Controllers\Admin\PaketController::class);
Route::resource("detailing",App\Http\Controllers\Admin\DetailingController::class);
Route::resource("kendaraan",App\Http\Controllers\Admin\KendaraanController::class);
Route::resource("karyawan",App\Http\Controllers\Admin\KaryawanController::class);

Route::get("listpesanan",[App\Http\Controllers\Admin\ListPesananController::class,"index"]);

Route::post("verifikasipesanan",[App\Http\Controllers\Admin\ListPesananController::class,"verifikasipesanan"]);
Route::post("verifikasipesananselesai",[App\Http\Controllers\Admin\ListPesananController::class,"verifikasipesananselesai"]);

Route::get("sete",[App\Http\Controllers\Admin\ListPesananController::class,"tes"]);

Route::get("laporan",[App\Http\Controllers\Admin\LaporanController::class,"index"]);
Route::get("laporanpdf",[App\Http\Controllers\Admin\LaporanController::class,"laporanpdf"]);
Route::get("laporantransaksipdf",[App\Http\Controllers\Admin\LaporanController::class,"laporantransaksipdf"]);

Route::get("laporan-karyawan",[App\Http\Controllers\Admin\LaporanKaryawanController::class,"index"]);
Route::get("laporan-kendaraan",[App\Http\Controllers\Admin\LaporanKendaraanController::class,"index"]);


Route::resource("profil",App\Http\Controllers\Admin\ProfilController::class);
Route::resource("pengaturanwhatsapp",App\Http\Controllers\Admin\whatsappController::class);

