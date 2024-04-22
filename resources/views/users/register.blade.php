@extends('components/layout')
@section('content')

<x-card class="bg-gray-50 border border-gray-200 p-10 max-w-lg mx-auto mt-24">
    <style>
        .user-specific, .company_specific {
            display:none;
        }

        .form-group {
            transition: display 0.3 ease;
        }
    </style>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Register
        </h2>
        <p class="mb-4">Create an account as a user or a company to post</p>
    </header>

    <form action="/register" id="register-form" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label class="inline-block text-lg mb-2">Register as:</label>
            <div class="flex justify-center w-full">
                <button type="button" id="user-button" class="hover:bg-gray-300 text-black font-bold py-2 px-4 rounded mr-2">User</button>
                <button type="button" id="company-button" class="hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Company</button>
            </div>

            <input type="hidden" name="type" id="selected-type">
        </div> 
        
        <div class="form-group">

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">Password</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2">Confirm Password</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation">
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location">
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">Website URL (optional)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website">
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="form-group user-specific">

            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Full Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="pfp" class="inline-block text-lg mb-2">
                    Profile picture
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="pfp"
                />
                @error('pfp')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

        </div>

        <div class="form-group company-specific">
    
        <div id="company-fields" style="display: none;">
            <div class="mb-6">
                <label for="company_name" class="inline-block text-lg mb-2">Company Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company_name">
                @error('company_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="contact_email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="contact_email" placeholder="Mail with which users can contact you">
                @error('contact_email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />
                @error('logo')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="mb-6 flex justify-center w-full">
            <button id="register-button" type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Sign Up
            </button>
        </div>

        <div class="mt-8">
            <p>
                Already have an account?
                <a href="/login" class="text-laravel">Login</a>
            </p>
        </div>
    </form>
</x-card>

<script>
const companyFields = document.getElementById('company-fields');
const userFields = document.querySelector('.user-specific');
const companyButton = document.getElementById('company-button');
const userButton = document.getElementById('user-button');
const registerForm = document.getElementById('register-form');
const selectedTypeField = document.getElementById('selected-type');


function toggleFormFields(showCompany) {
    if (showCompany) {
        companyFields.style.display = 'block';
        userFields.style.display = 'none';
        companyButton.classList.add('bg-laravel', 'text-white');
        userButton.classList.remove('bg-laravel', 'text-white');
        selectedTypeField.value = 'company'; 
    } else {
        companyFields.style.display = 'none';
        userFields.style.display = 'block';
        userButton.classList.add('bg-laravel', 'text-white');
        companyButton.classList.remove('bg-laravel', 'text-white');
        selectedTypeField.value = 'user'; 
    }
}

userButton.addEventListener('click', () => {
    toggleFormFields(false); 
});

companyButton.addEventListener('click', () => {
    toggleFormFields(true); 
});
</script>


@endsection
