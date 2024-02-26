@props(['listing'])
<x-card class="cursor-pointer" link='/listings/{{$listing->id}}'>
    <div class="flex">
        <img
            class="w-48 mr-6 md:block"
            src="{{$listing->logo ? asset('storage/'.$listing->logo) : asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl 2xl:text-3xl">{{$listing->title}}</h3>
            <div class="text-xl 2xl:text-2xl font-bold mb-4">{{$listing->company}}</div>
            <x-listing-tags :tagsCsv='$listing->tags'/>
            <div class="text-lg 2xl:text-xl mt-4">
                <i class="fa-solid fa-location-dot mr-2"></i>{{$listing->location}}
            </div>
        </div>
    </div>
</x-card>
