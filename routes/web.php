<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\NotulensiController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KehadiranController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Auth Routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Manajemen Rapat Routes
    Route::prefix('manajemen-rapat')->group(function () {
        Route::get('/jenis', [RapatController::class, 'jenisIndex'])->name('rapat.jenis');
        Route::post('/jenis', [RapatController::class, 'jenisStore'])->name('rapat.jenis.store');
        Route::delete('/jenis/{jenisRapat}', [RapatController::class, 'jenisDestroy'])->name('rapat.jenis.destroy');

        Route::get('/', [RapatController::class, 'index'])->name('rapat.index');
        Route::get('/create', [RapatController::class, 'create'])->name('rapat.create');
        Route::post('/', [RapatController::class, 'store'])->name('rapat.store');
        Route::get('/{rapat}', [RapatController::class, 'show'])->name('rapat.show');
        Route::get('/{rapat}/edit', [RapatController::class, 'edit'])->name('rapat.edit');
        Route::put('/{rapat}', [RapatController::class, 'update'])->name('rapat.update');
        Route::delete('/{rapat}', [RapatController::class, 'destroy'])->name('rapat.destroy');
    });
    
    // Notulensi Routes
    Route::prefix('notulensi')->group(function () {
        Route::get('/', [NotulensiController::class, 'index'])->name('notulensi.index');
        Route::get('/create', [NotulensiController::class, 'create'])->name('notulensi.create');
        Route::post('/', [NotulensiController::class, 'store'])->name('notulensi.store');
        Route::get('/{notulen}', [NotulensiController::class, 'show'])->name('notulensi.show');
        Route::get('/{notulen}/edit', [NotulensiController::class, 'edit'])->name('notulensi.edit');
        Route::put('/{notulen}', [NotulensiController::class, 'update'])->name('notulensi.update');
        Route::delete('/{notulen}', [NotulensiController::class, 'destroy'])->name('notulensi.destroy');
        Route::get('/{notulen}/exportPdf', [NotulensiController::class, 'exportPdf'])->name('notulensi.exportPdf');
    });
    
    // Undangan Routes
    Route::prefix('undangan')->group(function () {
        Route::get('/', [UndanganController::class, 'index'])->name('undangan.index');
        Route::get('/create', [UndanganController::class, 'create'])->name('undangan.create');
        Route::post('/', [UndanganController::class, 'store'])->name('undangan.store');
        Route::get('/{undangan}', [UndanganController::class, 'show'])->name('undangan.show');
        Route::get('/{undangan}/edit', [UndanganController::class, 'edit'])->name('undangan.edit');
        Route::put('/{undangan}', [UndanganController::class, 'update'])->name('undangan.update');
        Route::delete('/{undangan}', [UndanganController::class, 'destroy'])->name('undangan.destroy');
    });
    
    // Manajemen OPD Routes
    Route::prefix('manajemen-opd')->group(function () {
        Route::get('/', [OpdController::class, 'index'])->name('opd.index');
        Route::get('/create', [OpdController::class, 'create'])->name('opd.create');
        Route::post('/', [OpdController::class, 'store'])->name('opd.store');
        Route::get('/{opd}', [OpdController::class, 'show'])->name('opd.show');
        Route::get('/{opd}/edit', [OpdController::class, 'edit'])->name('opd.edit');
        Route::put('/{opd}', [OpdController::class, 'update'])->name('opd.update');
        Route::delete('/{opd}', [OpdController::class, 'destroy'])->name('opd.destroy');
    });

    // Kehadiran Routes
    Route::prefix('kehadiran')->group(function () {
        Route::get('/', [KehadiranController::class, 'index'])->name('kehadiran.index');
        Route::get('/create', [KehadiranController::class, 'create'])->name('kehadiran.create');
        Route::post('/', [KehadiranController::class, 'store'])->name('kehadiran.store');
        Route::get('/{kehadiran}', [KehadiranController::class, 'show'])->name('kehadiran.show');
        Route::get('/{kehadiran}/edit', [KehadiranController::class, 'edit'])->name('kehadiran.edit');
        Route::put('/{kehadiran}', [KehadiranController::class, 'update'])->name('kehadiran.update');
        Route::delete('/{kehadiran}', [KehadiranController::class, 'destroy'])->name('kehadiran.destroy');
        Route::put('/{kehadiran}/hadir', [KehadiranController::class, 'setHadir'])->name('kehadiran.setHadir');
    });
});
