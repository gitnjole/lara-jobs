<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
        if ($data['logo'] instanceof UploadedFile) {
            $data['logo_path'] = $data['logo']->store('logos', 'public');
            unset($data['logo']);
        }    

        $data['password'] = bcrypt($data['password']);

        try {
            $company = Company::create($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        auth()->login($company);
        
        return redirect('/')->with('message', 'Company account created successfully! Welcome to LaraJobs.');
    }
    
    /**
     * Method for updating company
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

    public function profile()
    {
        return view('users/profile');
    }
}
