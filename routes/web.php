<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect()->route('config');
});

Route::get('/config', [ConfigController::class, 'edit'])->name('config');
Route::get('/{config}/config', [ConfigController::class, 'edit'])->name('config.show');
Route::post('/config', [ConfigController::class, 'update'])->name('config.update');
Route::post('/{config}/config', [ConfigController::class, 'update'])->name('config.update');

// Uncomment to enable default Laravel Breeze routes
/*Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';*/
