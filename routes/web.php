<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('layout.landing_page');
});

Route::get('/login', function () {
    return view('layout.login'); // Sesuaikan dengan lokasi file
})->name('login');


Route::get('/register', function () {
    return view('layout.register');
});

Route::get('/dokter/dashboard', function () {
    return view('dokter.index');
});

Route::get('/dokter/obat', function () {
    return view('dokter.obat');
});

Route::get('/dokter/memeriksa', function () {
    return view('dokter.memeriksa');
});

Route::get('/pasien/dashboard', function () {
    return view('pasien.index');
});

Route::get('/pasien/periksa', function () {
    return view('pasien.periksa');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});
