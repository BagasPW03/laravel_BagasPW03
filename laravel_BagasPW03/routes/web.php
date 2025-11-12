<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\PasienController;

Route::get('/', function () {

    return Auth::check()
        ? redirect('/rumahsakit')
        : redirect()->route('login');
 });


Route::get('login', [AuthController::class,'showLogin'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class,'login'])->name('login.post')->middleware('guest');
Route::get('register', [AuthController::class,'showRegister'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class,'register'])->name('register.post')->middleware('guest');
Route::post('logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('rumahsakit', RumahSakitController::class);
    Route::resource('pasien', PasienController::class);
});

// Route::resource('/rumahsakit', RumahSakitController::class);
// Route::resource('/pasien', PasienController::class);
