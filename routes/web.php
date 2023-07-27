<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TanggapanController;
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
    Route::get('/tulis-laporan', [PengaduanController::class, 'index'])->name('tulis-laporan');
    Route::post('/tulis-laporan', [PengaduanController::class, 'store'])->name('tulis-laporan');
    Route::get('laporan-saya', [PengaduanController::class, 'show'])->name('laporan-saya');
});

Route::middleware(['auth', 'verified', 'petugas'])->group(function () {
    Route::get('tanggapan-saya', [TanggapanController::class, 'show'])->name('tanggapan-saya');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('tanggapan-saya', [TanggapanController::class, 'show'])->name('tanggapan-saya');
    Route::get('kelola-pengguna', [AdminController::class, 'index'])->name('kelola-pengguna');
    Route::post('daftarkan-pengguna', [AdminController::class, 'store'])->name('daftarkan-pengguna');

    // Route::get('/tulis-laporan', [PengaduanController::class, 'index'])->name('tulis-laporan');
    // Route::post('/tulis-laporan', [PengaduanController::class, 'store'])->name('tulis-laporan');
    // Route::get('laporan-saya', [PengaduanController::class, 'show'])->name('laporan-saya');
});

// Route::group('/dashboards', function () {
// });

// Route::get('/dashboard-admin', function () {
//     return view('admin-dashboard');
// })->middleware('admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
