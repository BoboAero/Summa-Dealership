@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full px-6 py-4 text-start text-xl font-jaldi font-bold text-pink bg-gray-50 border-l-4 border-pink focus:outline-none transition duration-150 ease-in-out'
    : 'block w-full px-6 py-4 text-start text-xl font-jaldi font-bold text-dark-blue border-l-4 border-transparent hover:text-pink hover:bg-gray-50 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>