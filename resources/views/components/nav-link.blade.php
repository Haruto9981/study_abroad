@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-orange-300 text-base text-3xl leading-5 text-gray-900 focus:outline-none focus:border-orange-400 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-base leading-5 text-gray-500 hover:text-gray-700 hover:border-orange-300 focus:outline-none focus:text-gray-700 focus:border-amber-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
