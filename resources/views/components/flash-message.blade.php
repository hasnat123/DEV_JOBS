@if(session()->has('message'))
<div x-data="{ show: false }" x-init="setTimeout(() => show = true, 1000); setTimeout(() => show = false, 3000)" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform translate-y-4" class="fixed bottom-8 right-6 bg-primary text-white px-6 py-3">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif