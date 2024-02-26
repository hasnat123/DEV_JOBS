<x-layout class="mt-10">
    
    {{-- @include('partials._search') --}}
    <div class="mt-10">
        <a href="/" class="inline-block ml-4 mb-4 hover:text-primary"
        ><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <div class="mx-4">
            <x-card class='!p-10'>
                <div
                    class="flex flex-col items-center justify-center text-center space-y-6"
                >
                    <img
                        class="w-48 mb-6"
                        src="{{$listing->logo ? asset('storage/'.$listing->logo) : asset('images/no-image.png')}}"
                        alt=""
                    />

                        <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                        <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                        <x-listing-tags :tagsCsv='$listing->tags'/>
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                        </div>
                    <div class="border border-gray-200 dark:border-gray-600 w-full my-10"></div>
                    <div class="w-full max-w-[1000px]">
                        <h3 class="text-3xl font-bold mb-4">
                            Job Description
                        </h3>
                        <div class="flex flex-col items-center text-lg space-y-6">
                            <p class="mb-[30px]">{{$listing->description}}</p>
    
    
                            <a
                                href="mailto:{{$listing->email}}"
                                class="block w-full max-w-xs bg-primary text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-envelope"></i>
                                Contact Employer</a
                            >
    
                            <a
                                href="{{$listing->website}}"
                                target="_blank"
                                class="block w-full max-w-xs bg-dark dark:bg-white text-white dark:text-font-color-primary py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-globe"></i> Visit
                                Website</a
                            >
                        </div>
                    </div>
                </div>
            </x-card>
            {{-- <x-card class="mt-4 p-2 flex space-x-6">
                <a href="/listings/{{$listing->id}}/edit">
                    <i class="fa-solid fa-pencil"></i> Edit
                </a>
                <form method="POST" action="/listings/{{$listing->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500">
                        <i class="fa-solid fa-trash"></i> Delete
                    </button>
                </form>
            </x-card> --}}
    </div>


</x-layout>