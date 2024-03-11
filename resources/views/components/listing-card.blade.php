@props(['listing'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{ asset($listing->user->logo_path ? 'storage/' . $listing->user->logo_path : 'images/no-image.png') }}" class="logo"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->user['company_name']}}</div>
            <x-listing-tags :tagsCsv="$listing['tags']" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->user['location']}}
            </div>
        </div>
    </div>
</x-card>