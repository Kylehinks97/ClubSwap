<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

use Kreait\Firebase\Factory;

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

// All listings
Route::get('/', [ListingController::class, 'index']);

//  Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage listings
Route::get('/listings/manage', [UserController::class, 'manage'])->middleware('auth');

// Show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log user in
Route::post('users/authenticate', [UserController::class, 'authenticate']);

// test route


Route::get('/firebase-test', function () {
    $factory = (new Factory)->withServiceAccount(base_path('firebase_credentials.json'));
    $storage = $factory->createStorage();
    dd($storage);
});


// |---------------------------------------------------------------------------------------
// | THIS ONE STAYS AT THE BOTTOM BECAUSE OTHERWISE IT MESSES UP THE URL's OF OTHER PAGES
// |---------------------------------------------------------------------------------------

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// |--------------------------------------------------------------------------
// | Common Resource Routes
// |--------------------------------------------------------------------------

// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing