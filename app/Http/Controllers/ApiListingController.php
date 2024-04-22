<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ApiListingController extends Controller
{    
    public function index()
    {
        $listings = Listing::select('id','listable_type', 'title', 'tags', 'description', 'created_at', 'updated_at')->get();

        if (!$listings) {
            return response()->json('No listings found.');
        } else {
            return response()->json($listings);
        }
    }

    public function show()
    {

    }
}
