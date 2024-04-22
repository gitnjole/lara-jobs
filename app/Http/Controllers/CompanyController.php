<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{   
    /**
     * Method for storing new user in database
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        if ($request->hasFile('logo')) {
            $formFields['logo_path'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['password'] = bcrypt($formFields['password']);

        try {
            $company = Company::create($formFields);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        auth()->login($company);
        
        return redirect('/')->with('message', 'Account created successfully! Welcome to LaraJobs.');
    }
    
    /**
     * Method for updating user
     *
     * @param Request $request
     * @param Company $company
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function put(Request $request, Company $company): \Illuminate\Http\RedirectResponse
    {
        if ($company->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'required|min:4'
        ]);  

        if ($request->hasFile('logo')) {
            $formFields['logo_path'] = $request->file('logo')->store('logos', 'public');
        }

        $company->update($formFields);
        
        return redirect('/manage')->with('message', 'Account updated successfully!');
    }
    
    /**
     * Method for logging out user
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/')->with('message','You have logged out.');
    }
    
    /**
     * Method for showing login
     * view
     *
     * @return \Illuminate\View\View
     */
    public function login(): \Illuminate\View\View
    {
        return view('users/login');
    }
    
    /**
     * Method for authenticating user login
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request): \Illuminate\Http\RedirectResponse
    {
        $formFields = $request->validate([
            'email' => "required|email|",
            'password' => 'required',
        ]);


        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message','You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');

    }

    public function profile()
    {
        return view('users/profile');
    }
}
