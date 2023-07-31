<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'masyarakat'])->group(function () {
    Route::get('/laporan-saya', [PengaduanController::class, 'index'])->name('laporan-saya');
    Route::get('/tulis-laporan', [PengaduanController::class, 'create'])->name('tulis-laporan');
    Route::post('/tulis-laporan', [PengaduanController::class, 'store'])->name('tulis-laporan');
    Route::get('/edit-laporan/{id_pengaduan}', [PengaduanController::class, 'edit'])->name('edit-laporan');
    Route::patch('/edit-laporan/{id_pengaduan}', [PengaduanController::class, 'update'])->name('edit-laporan');
    Route::delete('/hapus-laporan/{id_pengaduan}', [PengaduanController::class, 'destroy'])->name('hapus-laporan');
});

Route::middleware(['auth', 'verified', 'petugas'])->group(function () {
    Route::get('/tanggapan-saya', [TanggapanController::class, 'show'])->name('tanggapan-saya');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/tanggapan-saya', [TanggapanController::class, 'show'])->name('tanggapan-saya');

    Route::get('/kelola-pengguna', [UserController::class, 'index'])->name('kelola-pengguna');
    Route::post('/daftarkan-pengguna', [UserController::class, 'store'])->name('daftarkan-pengguna');
    Route::get('/edit-pengguna/{id}', [UserController::class, 'edit'])->name('edit-pengguna');
    Route::patch('/edit-pengguna/{id}', [UserController::class, 'update'])->name('edit-pengguna');
    Route::delete('/hapus-pengguna/{id}', [UserController::class, 'destroy'])->name('hapus-pengguna');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
