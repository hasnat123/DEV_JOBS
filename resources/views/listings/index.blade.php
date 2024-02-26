<x-layout absolute="true">
    @include('partials._hero')
    {{-- @include('partials._search') --}}

        <div class=" mx-4 xl:mx-8">
            @if(count($listings) == 0)
                <p class="text-3xl 2xl:text-4xl font-bold my-16">No listings found</p>
            @else
                <h2 class="text-3xl 2xl:text-4xl font-bold my-16">@if(request()->filled('search'))Showing {{ request('search') }} jobs @else Latest jobs @endif @if(request()->filled('location'))in {{ request('location') }}@endif</h2>
                {{-- <h2 class="text-3xl 2xl:text-4xl font-bold my-16">@if(isset($query))Showing results for {{ $query }}@else Latest Jobs @endif</h2> --}}
                <div class="lg:grid lg:grid-cols-2 gap-4 xl:gap-8 space-y-4 lg:space-y-0">
                    @foreach($listings as $listing)
                        <x-listing-card :listing='$listing'/>
                    @endforeach
                </div>
            @endif
        </div>

    {{-- Pagination --}}
    <div class="mt-6 px-4 md:px-10 py-4">
        {{$listings->links()}}
    </div>
</x-layout>