<?php

use Illuminate\Support\Facades\Route;
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