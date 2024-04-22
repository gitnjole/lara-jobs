<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UserController extends Controller
{      
    /**
     * Method for storing new user in database
     *
     * @param array $data
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(array $data): \Illuminate\Http\RedirectResponse
    { 
        if ($data['pfp'] instanceof UploadedFile) {
            $data['pfp_path'] = $data['pfp']->store('pfps', 'public');
            unset($data['pfp']);
        }    

        $data['password'] = bcrypt($data['password']);

        try {
            $user = User::create($data);
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

    public function profile()
    {
        return view('users/profile');
    }
}
