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

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);
        
        return redirect('/')->with('message', 'Account created successfully! Welcome to LaraJobs.');
    }

    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/')->with('message','You have logged out.');
    }
}
