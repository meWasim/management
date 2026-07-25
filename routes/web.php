<?php

use App\Http\Controllers\InstitutionController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('/dashboard', 'dashboard')->name('dashboard');

    Route::resource('institutions', InstitutionController::class);

    Route::get('/institutions/check-domain', [InstitutionController::class, 'checkDomain'])
        ->name('institutions.check-domain');
});

require __DIR__.'/settings.php';
