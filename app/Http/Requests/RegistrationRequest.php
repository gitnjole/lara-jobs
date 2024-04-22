<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return ! auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|in:user,company',
            'email' => 'required|email|unique:users,email|unique:companies,email',
            'password' => 'required|confirmed|min:6',
            'location' => 'required|string',
            'website' => 'nullable|url',
            
            //user-specific rules
            'name' => $this->type === 'user' ? 'required|string' : 'sometimes|nullable|string',
            'pfp' => 'nullable|image|max:2048',

            //company-specific rules
            'company_name' => $this->type === 'company' ? 'required|string' : 'sometimes|nullable|string',
            'contact_email' => $this->type === 'company' ? 'required|email' : 'sometimes|nullable|email',
            'logo' => 'nullable|image|max:2048'
        ];
    }

    public function validatedData(): array
    {
        return $this->validated();
    }
}
