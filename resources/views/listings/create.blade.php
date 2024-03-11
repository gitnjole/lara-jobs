@extends('components/layout')
@section('content')

<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Create a job
    </h2>
    <p>List a job to find a developer</p>
    <p class="mb-3 text-sm">Need to edit company details? You can do so <a class="font-bold" href="/manage">here.</a></p>
</header>

<form action="/listings" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2"
            >Job Title</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="title"
            placeholder="Example: Senior Laravel Developer"
            value="{{old('title')}}"
        />
        @error('title')
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
            value="{{old('tags')}}"
        />
        @error('tags')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="banner" class="inline-block text-lg mb-2">
            Listing Banner
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="banner"
        />
        @error('banner')
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
        >{{old('description')}}</textarea>
    </div>

    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Create job
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
    </div>
</form>
</div>
@endsection