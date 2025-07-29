<?php

use App\Http\Controllers\InstallController;
use Illuminate\Support\Facades\Route;

Route::middleware(['NotInstalledCheck', 'XSS'])->group(function () {
    Route::get('install/initialize', [InstallController::class, 'index'])->name('install.initialize');
    Route::prefix('install')->group(function () {
        Route::get('finalize', [InstallController::class, 'final'])->name('install.finalize');
    });
});

Route::middleware(['XSS'])->prefix('install')->group(function () {
    Route::post('process', [InstallController::class, 'getInstall'])->name('install.process');
});

Route::get('admin/create-release', [InstallController::class, 'releaseForm'])->name('release.form');
Route::post('admin/create-release', [InstallController::class, 'createRelease'])->name('create.release');
