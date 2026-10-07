@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-dark-blue/70 focus:ring-dark-blue/70 rounded-md shadow-sm']) }}>
