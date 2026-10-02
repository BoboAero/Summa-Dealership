@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-1 pt-1 text-xl font-bold text-pink transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 text-xl font-bold text-dark-blue hover:text-pink transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>