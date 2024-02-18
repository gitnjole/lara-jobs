<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Get all listings and show them
     */
    public function index(Request $request)
    {
        return view('listings/index', [
            'listings' => Listing::latest()->filter($request->only('tag', 'search'))->get()
            ]);
    }

    /**
     * Show a singular listing
     */
    public function show(Listing $listing)
    {
        return view('listings/show', [
            'listing' => $listing
        ]);
    }

    /**
     * Create a new listing
     */
    public function create()
    {
        return view('listings/create');
    }
}
