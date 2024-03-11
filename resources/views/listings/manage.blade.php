@extends('components/layout')
@section('content')
<x-card class="p-10">
    <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">Manage Your Account</h1>
    </header>

    <div class="flex items-center justify-center">
        <div class="w-1/2">
            <form action="/users/{{$user->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block text-lg font-semibold mb-2">Company name:</label>
                    <input type="text" name="name" id="name" value="{{$user->company_name}}" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-400">
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-lg font-semibold mb-2">Location:</label>
                    <input type="text" name="name" id="name" value="{{$user->location}}" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-400">
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-lg font-semibold mb-2">Contact Email:</label>
                    <input type="text" name="name" id="name" value="{{$user->contact_email}}" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-400">
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-lg font-semibold mb-2">Website:</label>
                    <input type="text" name="name" id="name" value="{{$user->website}}" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-400">
                </div>

                <div class="mb-6 flex-col justify-center items-center">
                    <label for="logo" class="block text-lg font-semibold mb-2">Company logo:</label>
                    <img src="{{ asset($user->logo_path ? 'storage/' . $user->logo_path : 'images/no-image.png') }}" class="logo">
                </div>

                <div class="mb-6">
                    <label for="logo" class="block text-lg font-semibold mb-2">Update logo:</label>
                    <input type="file" name="logo" id="logo" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-400">
                </div>

                <div class="text-center">
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-card>



<x-card class="p-10">
    <header>
        <h1
            class="text-3xl text-center font-bold my-6 uppercase"
        >
            Manage Jobs
        </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless($listings->isEmpty())
            @foreach($listings as $listing)
            <tr class="border-gray-300">
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a href="/show">
                        {{$listing['title']}}
                    </a>
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a
                        href="/listings/{{$listing['id']}}/edit"
                        class="text-blue-400 px-6 py-2 rounded-xl"
                        ><i
                            class="fa-solid fa-pen-to-square"
                        ></i>
                        Edit</a
                    >
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <form action="/listings/{{$listing['id']}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">
                            <i
                                class="fa-solid fa-trash-can"
                            ></i>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="text-center">
                        No listings found.
                    </p>
                    <div class="flex justify-center">
                        <a
                            href="/listings/create"
                            class="center bg-black text-white py-2 px-5"
                            >Post a new listing!
                        </a>
                    </div>
                </td>
            </tr>
            @endunless
        </tbody>
    </table>
</div>
</x-card>
@endsection