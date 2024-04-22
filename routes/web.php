<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Listing routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [ListingController::class, 'index']);

Route::get('listings/create', [ListingController::class, 'create'])->middleware('auth');
Route::post('listings', [ListingController::class, 'store'])->middleware('auth');
Route::get('listings/{listing}', [ListingController::class, 'show']);
Route::get('listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
Route::put('listings/{listing}', [ListingController::class,'update'])->middleware('auth');
Route::delete('listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');
Route::get('/manage', [ListingController::class, 'manage'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Registration routes
|--------------------------------------------------------------------------
|
*/

Route::get('register', [RegistrationController::class, 'create']);
Route::post('register', [RegistrationController::class, 'store']);

/*
|--------------------------------------------------------------------------
| User routes
|--------------------------------------------------------------------------
|
*/

Route::post('logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');
Route::put('users/{user}', [UserController::class, 'put'])->middleware('auth');
Route::get('{user}/profile', [UserController::class, 'profile'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Company routes
|--------------------------------------------------------------------------
|
*/

Route::post('logout', [CompanyController::class, 'logout'])->middleware('auth');
Route::get('login', [CompanyController::class, 'login'])->name('login')->middleware('guest');
Route::post('companys/authenticate', [CompanyController::class, 'authenticate'])->middleware('guest');
Route::put('companys/{Company}', [CompanyController::class, 'put'])->middleware('auth');
Route::get('{company}/profile', [CompanyController::class, 'profile'])->middleware('auth');
