<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

// All Listings
Route::get('/', [ListingController::class, 'index']);

// emplyer dashboard
Route::get('/employer', function() {
    return view('employer.index');
})->middleware('company.user')->name('employer');



// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('company.user');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form
//Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/register-step-1', [UserController::class, 'processStep1'])->middleware('guest');
Route::get('/register-step-2', [UserController::class, 'showStep2'])->middleware('guest');
Route::post('/register-step-2', [UserController::class, 'processStep2'])->middleware('guest');


// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


// Application Request
Route::post('/request/{job_id}', [AppRequestController::class, 'store'])->name('request')->middleware('auth');
// Manage JobSeeker Appiocation Requests
Route::get('/jobseeker/manage', [AppRequestController::class, 'show'])->middleware('auth');
// Delete JobSeeker Appiocation Requests
Route::delete('/jobseeker/{job_id}', [AppRequestController::class, 'destroy'])->middleware('auth');
