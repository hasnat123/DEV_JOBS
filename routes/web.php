<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

//All listings
Route::get('/', [ListingController::class, 'index']);

//Show create listing form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware(['auth', 'verified']);

// Store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware(['auth', 'verified']);

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->where('listing', '[0-9]+')->middleware(['auth', 'verified']);

// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->where('listing', '[0-9]+')->middleware(['auth', 'verified']);

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware(['auth', 'verified']);

// Show manage listings page
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware(['auth', 'verified']);

// Show single listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->where('listing', '[0-9]+');

//Show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware(['auth', 'verified']);

// Show login form. Name 'login' needed for 'auth middleware' to know which page to redirect to when unauthenticated users try to access specific pages
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');



// Email Verification Routes...
// Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
// Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/{id}', function($id)
// {
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $req)
// {
//     return $req->name;
// });