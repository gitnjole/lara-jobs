<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Method to show all listings
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        return view('listings/index', [
            'listings' => Listing::latest()->filter($request->only('tag', 'search'))
                ->paginate(6)
            ]);
    }
    
    /**
     * Method to show a single listing
     *
     * @param Listing $listing The listing to be displayed
     *
     * @return \Illuminate\View\View
     */
    public function show(Listing $listing): \Illuminate\View\View
    {
        return view('listings/show', [
            'listing' => $listing
        ]);
    }

    
    /**
     * Method to create a listing
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        return view('listings/create');
    }
    
    /**
     * Method store
     *
     * @param Request $request [explicite description]
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company_name' => 'required',
            'location' => 'required',
            'contact_email' => 'required|email',
            'tags' => 'required',
            'website' => 'required|url',
            'description' => 'nullable'
        ]);  

        Listing::create($formFields);
        
        return redirect('/')->with('message', 'Listing created successfully!');
    }
}
