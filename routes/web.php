<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\DashboardController;



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

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//Admin
Route::middleware(['auth:user,admin', 'ceklevel:admin'])->group(function () {
    //Tampilan
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat');
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    // Route::get('/voting', [VotingController::class, 'index'])->name('voting');
    Route::get('/hasilsuara', [ResultController::class, 'index'])->name('hasilsuara');

    //Tambah Data Siswa
    Route::get('/create/tambah-data-siswa', [SiswaController::class, 'create'])->name('create/tambah-data-siswa');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('/siswa');
    Route::get('/create/tambah-data-kandidat', [KandidatController::class, 'create'])->name('create/tambah-data-kandidat');
    Route::post('/kandidat', [KandidatController::class, 'store'])->name('kandidat');

    //Import Data Exsel Siswa
    Route::post('importexcel', [SiswaController::class, 'importexcel'])->name('importexcel');

    //Edit Data Siswa dan Kandidat
    Route::get('/edit/{id}/ubah-data-siswa', [SiswaController::class, 'edit'])->name('edit/{id}/ubah-data-siswa');
    Route::post('/siswa/{id}', [SiswaController::class, 'update'])->name('/siswa/{id}');
    Route::get('/edit/{id}/ubah-data-kandidat', [KandidatController::class, 'edit'])->name('edit/{id}/ubah-data-kandidat');
    Route::post('/kandidat/{id}', [KandidatController::class, 'update'])->name('kandidat/{id}');

    //Delete Data Siswa dan Kandidat
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa/{id}');
    Route::delete('/kandidat/{kandidat:id}', [KandidatController::class, 'destroy'])->name('kandidat/{kandidat:id}');
    Route::get('/voting', [VotingController::class, 'index'])->name('voting');
    Route::post('voting/{id}', [VotingController::class, 'store'])->name('voting{id}');
});



//Siswa
Route::middleware(['auth:user,admin', 'ceklevel:admin,siswa'])->group(function () {
    //Tampilan
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat');
    // Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/voting', [VotingController::class, 'index'])->name('voting');
    Route::get('/hasilsuara', [ResultController::class, 'index'])->name('hasilsuara');
    Route::get('/voting', [VotingController::class, 'index'])->name('voting');
    Route::post('voting/{id}', [VotingController::class, 'store'])->name('voting{id}');

    //Ubah Password
    Route::get('change-password', [SiswaController::class, 'password']);
    Route::put('passsword/update', [SiswaController::class, 'updatePassword'])->name('ganti-password');
});