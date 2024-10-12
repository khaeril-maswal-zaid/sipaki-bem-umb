<?php

use App\Http\Controllers\KotakSuaraController;
use App\Http\Controllers\PasanganCalonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth', 'verified'])->group(function () {
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    Route::get('/live-count', [KotakSuaraController::class, 'liveView'])->name('kotak-suara.live');
    Route::get('/live-count-api', [PasanganCalonController::class, 'live'])->name('kotak-suara.liveapi');

    Route::post('/generatePassword', [UserController::class, 'store'])->name('user.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [KotakSuaraController::class, 'index'])->name('kotak-suara.index');

    Route::get('/pemilihan-pasangan-calon', [PasanganCalonController::class, 'insert'])->name('pemilihan.insert');
    Route::get('/pemilihan-calon-himaprodi-peternakan', [PasanganCalonController::class, 'insertPeter'])->name('pemilihan-peter.insert');
    Route::get('/pemilihan-calon-himaprodi-aktuaria', [PasanganCalonController::class, 'insertAkt'])->name('pemilihan-akt.insert');
    // Route::post('/pemilihan-pasangan-calon', [PasanganCalonController::class, 'store'])->name('pemilihan.store');

    Route::post('/kotak-suara', [KotakSuaraController::class, 'store'])->name('kotak-suara.store');
    Route::post('/kotak-suara-peternakan', [KotakSuaraController::class, 'storePeter'])->name('kotak-suara-peter.store');
    Route::post('/kotak-suara-aktuaria', [KotakSuaraController::class, 'storeAkt'])->name('kotak-suara-akt.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
