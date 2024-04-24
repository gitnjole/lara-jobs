@props(['listing'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{ asset($listing->user?->pfp_path ? 'storage/' . $listing->user?->pfp_path : 'images/no-image.png') }}" 
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->user['name']}}</div>
            <x-listing-tags :tagsCsv="$listing['tags']" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->user['location']}}
            </div>
        </div>
    </div>
</x-card>