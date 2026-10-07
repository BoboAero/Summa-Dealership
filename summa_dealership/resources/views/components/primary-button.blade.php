<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-dark-blue border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-dark-blue/90 focus:bg-dark-blue/90 active:bg-darkblue focus:outline-none focus:ring-2 focus:ring-pink focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
