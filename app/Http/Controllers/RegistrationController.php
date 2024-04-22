<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create(): \Illuminate\View\View
    {
        return view('register');
    }

    public function store(RegistrationRequest $request)
    {
        if ($request['type'] === 'user') {
            return app(UserController::class)->store($request->validatedData());
        } else if ($request['type'] === 'company') {
            return app(CompanyController::class)->store($request->validatedData());
        } else {
            dd('Error message');
        }
    }
}
