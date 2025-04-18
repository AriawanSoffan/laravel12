<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\PemeriksaanController;

Route::get('/dokter/memeriksa', [PemeriksaanController::class, 'index'])->name('dokter.memeriksa');
Route::post('/dokter/memeriksa', [PemeriksaanController::class, 'store'])->name('dokter.memeriksa.store');


Route::get('/pasien/periksa', [PeriksaController::class, 'index'])->name('periksa.index');
Route::post('/periksa', [PeriksaController::class, 'store'])->name('periksa.store');

Route::get('/dokter/obat', [ObatController::class, 'index'])->name('obat.index');
Route::post('/dokter/obat', [ObatController::class, 'store'])->name('obat.store');

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


// Route::get('/dokter/memeriksa', function () {
//     return view('dokter.memeriksa');
// });

Route::get('/pasien/dashboard', function () {
    return view('pasien.index');
});



Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});
