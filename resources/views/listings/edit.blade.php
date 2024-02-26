<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Gig
            </h2>
            <p class="mb-4">Edit: {{$listing->title}}</p>
        </header>

        {{-- 'enctype' vattribute required when form has file upload --}}
        <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- 'method' directive needs to be used for any request other than 'GET' and 'POST' --}}
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                <input type="text" class="text-font-color-primary border border-gray-200 rounded p-2 w-full" name="company" value="{{$listing->company}}"/>

                {{-- Error directive used if 'company' input isn't successfully validated in controller after form submission --}}
                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                <input type="text" class="text-font-color-primary border border-gray-200 rounded p-2 w-full" name="title"
                    placeholder="Example: Senior Laravel Developer" value="{{$listing->title}}"/>
                
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                <input type="text" class="text-font-color-primary border border-gray-200 rounded p-2 w-full" name="location"
                    placeholder="Example: Remote, Boston MA, etc" value="{{$listing->location}}"/>
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="text-font-color-primary border border-gray-200 rounded p-2 w-full" name="email" value="{{$listing->email}}"/>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">
                    Website/Application URL
                </label>
                <input type="text" class="text-font-color-primary border border-gray-200 rounded p-2 w-full" name="website" value="{{$listing->website}}"/>
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="text-font-color-primary border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc" value="{{$listing->tags}}"/>
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input type="file" class="text-font-color-primary border border-gray-200 rounded p-2 w-full" name="logo" />
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{$listing->logo ? asset('storage/'.$listing->logo) : asset('images/no-image.png')}}"
                    alt=""
                />
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Job Description
                </label>
                <textarea class="text-font-color-primary border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Include tasks, requirements, salary, etc">{{$listing->description}}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between mb-6">
                <a href="/" class="inline-block ml-4 mb-4 hover:text-primary"
                ><i class="fa-solid fa-arrow-left"></i> Back
                </a>

                <button class="bg-primary hover:bg-dark dark:hover:bg-font-color-dark text-white dark:hover:text-font-color-primary rounded py-2 px-4">
                    Update Gig
                </button>
            </div>
        </form>
    </x-card>
</x-layout>
