<?php

use App\Http\Controllers\KotakSuaraController;
use App\Http\Controllers\PasanganCalonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/live-count', [KotakSuaraController::class, 'live'])->name('kotak-suara.live');

    Route::post('/generatePassword', [UserController::class, 'store'])->name('user.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [KotakSuaraController::class, 'index'])->name('kotak-suara.index');

    Route::get('/pemilihan-pasangan-calon', [PasanganCalonController::class, 'insert'])->name('pemilihan.insert');
    // Route::post('/pemilihan-pasangan-calon', [PasanganCalonController::class, 'store'])->name('pemilihan.store');

    Route::post('/kotak-suara', [KotakSuaraController::class, 'store'])->name('kotak-suara.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
