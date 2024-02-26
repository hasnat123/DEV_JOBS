@props(['tagsCsv'])

@php

    $tags = explode(',', $tagsCsv);

@endphp

<ul class="flex">
    @foreach($tags as $tag)
        <li
            class="flex items-center justify-center bg-primary hover:bg-dark dark:hover:bg-font-color-dark text-white dark:hover:text-font-color-primary rounded-xl py-1 px-3 mr-2 text-xs 2xl:text-sm"
        >
            <a href='/?tag={{$tag}}'>{{ $tag }}</a>
        </li>
    @endforeach
</ul>