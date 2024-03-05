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
            'name' => 'required|min:4',
            'email' => "required|email|unique:users,email",
            'password' => 'required|confirmed|min:12',
        ]);  

        if ($request->hasFile('logo')) {
            $formFields['logo_path'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);
        
        return redirect('/')->with('message', 'Account created successfully! Welcome to LaraJobs.');
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
