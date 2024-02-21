<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [
    ListingController::class, 'index'
]);

Route::get('listings/create', [
    ListingController::class, 'create'
]);

Route::post('listings', [
    ListingController::class, 'store'
]);

Route::get('listings/{listing}', [
    ListingController::class, 'show'
]);

Route::get('listings/{listing}/edit', [
    ListingController::class, 'edit'
]);

Route::put('listings/{listing}', [
    ListingController::class,'update'
]);

Route::delete('listings/{listing}', [
    ListingController::class,'delete'
]);

Route::get('register',[
    UserController::class, 'create'
]);

Route::post('register',[
    UserController::class, 'store'
]);

Route::post('logout',[
    UserController::class, 'logout'
]);