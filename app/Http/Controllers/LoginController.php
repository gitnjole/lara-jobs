<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(): \Illuminate\View\View
    {
        return view('login');
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
}
