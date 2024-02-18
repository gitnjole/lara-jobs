<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/',
    [ListingController::class, 'index']);

Route::get('listings/create',
    [ListingController::class,'create']);

Route::get('listings/{listing}', 
    [ListingController::class, 'show']);

