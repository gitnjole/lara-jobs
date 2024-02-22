@extends('components/layout')
@section('content')

<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Edit a job
    </h2>
    <p class="mb-4">Editing : {{$listing['title']}}</p>
</header>

<form action="/listings/{{$listing['id']}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label
            for="company_name"
            class="inline-block text-lg mb-2"
            >Company Name</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="company_name"
            value="{{$listing['company_name']}}"
        />
        @error('company_name')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2"
            >Job Title</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="title"
            placeholder="Example: Senior Laravel Developer"
            value="{{$listing['title']}}""
        />
        @error('title')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="location"
            class="inline-block text-lg mb-2"
            >Job Location</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="location"
            placeholder="Example: Remote, Boston MA, etc"
            value="{{$listing['location']}}"
        />
        @error('location')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="contact_email" class="inline-block text-lg mb-2"
            >Contact Email</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="contact_email"
            value="{{$listing['contact_email']}}"
        />
        @error('contact_email')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="website"
            class="inline-block text-lg mb-2"
        >
            Website/Application URL
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="website"
            value="{{$listing['website']}}"
        />
        @error('website')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
            Tags (Comma Separated)
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="tags"
            placeholder="Example: Laravel, Backend, Postgres, etc"
            value="{{$listing['tags']}}"/>
        @error('tags')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
            Company Logo
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="logo"
        />
        <img src="{{$listing['logo_path'] ? asset('storage/' .$listing['logo_path']) : asset('/images/no-image.png')}}" class="logo" />

        @error('logo')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="description"
            class="inline-block text-lg mb-2"
        >
            Job Description
        </label>
        <textarea
            class="border border-gray-200 rounded p-2 w-full"
            name="description"
            rows="10"
            placeholder="Include tasks, requirements, salary, etc"
        >{{$listing['description']}}</textarea>
    </div>

    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Update job
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
    </div>
</form>
</div>
@endsection