<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dash\CreateShipment;
use App\Livewire\Dash\Dashboard;
use App\Livewire\Dash\ManageShipment;
use App\Livewire\Main\Contact;
use App\Livewire\Main\Homepage;
use App\Livewire\Main\Tracker;
use Illuminate\Support\Facades\Route;

/**
 * PUBLIC ROUTES (GUEST ONLY)
 * 
 * Define accessible pages for general users.
 */
Route::prefix('/')->group(function () {
    // Main pages accessible to all users
    Route::get('/', Homepage::class)->name('homepage');
    Route::get('/contact', Contact::class)->name('contact');
    Route::get('/tracker', Tracker::class)->name('tracker');
});

/**
 * AUTHENTICATION ROUTES (GUEST ONLY)
 * 
 * Manage user authentication and account-related pages.
 */
Route::prefix('auth')->group(function () {
    // Login route for Managers
    Route::get('/login', Login::class)->name('login');
});

/**
 * AUTHENTICATED USER ROUTES (REGISTERED ONLY)
 * 
 * Define pages for authenticated users.
 */
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    // Dashboard route for Managers
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/manage-shipment', ManageShipment::class)->name('manage-shipment');
    Route::get('/create-shipment', CreateShipment::class)->name('create-shipment');
});
