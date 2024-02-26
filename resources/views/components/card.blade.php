@props(['link'])

<div @if(isset($link)) onclick="window.location.href = '{{ $link }}'" @endif {{ $attributes->merge(['class' => 'bg-gray-50 dark:bg-dark border border-gray-200 dark:border-gray-700 rounded px-10 py-10']) }}>
    
    {{ $slot }} {{-- Similar to 'children' prop in React.js --}}

</div>