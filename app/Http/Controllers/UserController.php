<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{    
    /**
     * Method for showing create view
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        return view('users/register');
    }
    
    /**
     * Method for storing new user in database
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $formFields = $request->validate([
            'email' => "required|email|unique:users,email",
            'password' => 'required|confirmed|min:6',
            'company_name' => 'required',
            'location' => 'required',
            'contact_email' => 'required|email',
            'website' => 'nullable'
        ]);  

        if ($request->hasFile('logo')) {
            $formFields['logo_path'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['password'] = bcrypt($formFields['password']);

        try {
            $user = User::create($formFields);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        auth()->login($user);
        
        return redirect('/')->with('message', 'Account created successfully! Welcome to LaraJobs.');
    }
    
    /**
     * Method for updating user
     *
     * @param Request $request
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function put(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        if ($user->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'required|min:4'
        ]);  

        if ($request->hasFile('logo')) {
            $formFields['logo_path'] = $request->file('logo')->store('logos', 'public');
        }

        $user->update($formFields);
        
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
}
