<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
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
        $listings = Listing::with('user')->latest()
            ->filter($request->only('tag', 'search'))
            ->simplePaginate(6);

        return view('listings/index', [
            'listings' => $listings
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
     * Method to store a new listing to database
     *
     * @param Request $request
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
            'description' => 'nullable',
        ]);  

        if ($request->hasFile('banner')) {
            $formFields['banner_path'] = $request->file('banner')->store('banners', 'public');
        } else {
            $formFields['banner_path'] = null;
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);
        
        return redirect('/')->with('message', 'Listing created successfully!');
    }
    
    /**
     * Method for showing edit view
     *
     * @param Listing $listing
     *
     * @return \Illuminate\View\View
     */
    public function edit(Listing $listing): \Illuminate\View\View
    {
        return view('listings/edit', [
            'listing' => $listing
        ]);
    }
    
    /**
     * Method for updating the database with
     * new data
     * 
     * @param Request $request
     * @param Listing $listing
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Listing $listing): \Illuminate\Http\RedirectResponse
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company_name' => 'required',
            'location' => 'required',
            'contact_email' => 'required|email',
            'tags' => 'required',
            'website' => 'required|url',
            'description' => 'nullable',
        ]);  

        if ($request->hasFile('banner')) {
            $formFields['banner_path'] = $request->validate([
                'banner' => 'nullable|image|dimensions:width=800, height=200'
            ]);
            $formFields['banner_path'] = $request->file('banner')->store('banners', 'public');
        } else {
            $formFields['banner_path'] = null;
        }

        $listing->update($formFields);
        
        return redirect('listings/'. $listing['id'])->with('message', 'Listing updated successfully!');
    }
    
    /**
     * Method for destroying a listing
     *
     * @param Listing $listing
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Listing $listing): \Illuminate\Http\RedirectResponse
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $listing->delete();

        return redirect('/')->with('message','Listing successfully deleted');
    }
    
    /**
     * Method for showing the manage
     * view
     *
     * @return \Illuminate\View\View
     */
    public function manage(): \Illuminate\View\View
    {
        $user = auth()->user();
        $listings = $user->listings()->get();

        return view('listings/manage', [
            'listings' => $listings,
            'user' => $user
        ]);
    }
}
