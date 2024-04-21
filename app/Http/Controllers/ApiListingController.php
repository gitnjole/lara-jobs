<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ApiListingController extends Controller
{    
    public function index()
    {
        $listings = Listing::get();

        if (empty($listings)) {
            return response()->json('No listings found.');
        } else {
            return response()->json('Listings found!');
        }
    }

    public function show()
    {

    }
}
