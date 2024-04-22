<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RegistrationController;

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
| Authentication routes
|--------------------------------------------------------------------------
|
*/

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('authenticate', [LoginController::class, 'authenticate'])->middleware('guest');

/*
|--------------------------------------------------------------------------
| User routes
|--------------------------------------------------------------------------
|
*/

Route::put('users/{user}', [UserController::class, 'put'])->middleware('auth');
Route::get('{user}/profile', [UserController::class, 'profile'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Company routes
|--------------------------------------------------------------------------
|
*/

Route::put('companies/{Company}', [CompanyController::class, 'put'])->middleware('auth');
Route::get('{companies}/profile', [CompanyController::class, 'profile'])->middleware('auth');
