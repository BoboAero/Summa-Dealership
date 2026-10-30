@props([
    'title',
    'resource',                              // routenaam-prefix, bv. 'repairs'
    'items',                                 // collectie van modellen
    'field' => 'name',                       // kolom die in de rij getoond wordt
    'limit' => 80,                           // max. aantal tekens
    'label' => null,                         // optioneel: closure voor eigen rijtekst
    'createLabel' => 'Nieuw',
    'emptyText' => 'Er zijn nog geen items.',
])

@php
    // Gedeelde basis voor alle knoppen (was .btn)
    $btn = 'flex items-center justify-center m-0 border border-[var(--dark-blue)] rounded-[10px] text-white font-bold no-underline cursor-pointer transition hover:opacity-90';
    $btnSmall = $btn . ' h-8 px-3 text-sm';
@endphp

<div class="p-10">
    <div class="w-full max-w-[1200px] mx-auto">

        <div class="flex items-center justify-between mb-6 max-[600px]:flex-col max-[600px]:gap-[15px]">
            <h1 class="text-3xl font-bold text-[var(--dark-blue)] max-[600px]:w-full max-[600px]:text-left">
                {{ $title }}
            </h1>

            <a href="{{ route($resource . '.create') }}"
               class="{{ $btn }} h-10 px-5 text-base bg-[var(--pink)] focus:outline-none focus:ring-2 focus:ring-[var(--dark-blue)] focus:ring-offset-2 focus:ring-offset-white max-[600px]:w-full">
                {{ $createLabel }}
            </a>
        </div>

        <div class="max-h-[600px] overflow-y-auto overflow-x-hidden border border-[var(--dark-blue)] rounded-[10px] bg-[var(--field-bg)]
                    [&::-webkit-scrollbar]:w-2
                    [&::-webkit-scrollbar-track]:bg-transparent
                    [&::-webkit-scrollbar-thumb]:bg-[var(--dark-blue)]
                    [&::-webkit-scrollbar-thumb]:rounded-full">
            @forelse($items as $item)
                <div class="flex items-center justify-between gap-4 min-h-[56px] px-4 py-2 border-b border-[var(--dark-blue)] bg-[var(--field-bg)] even:bg-[var(--row-alt-bg)] last:border-b-0
                            max-[600px]:flex-col max-[600px]:items-start max-[600px]:gap-[15px] max-[600px]:pb-[15px]">
                    <span class="block min-w-0 max-w-full overflow-hidden whitespace-nowrap text-ellipsis text-xl font-bold text-[var(--dark-blue)]
                                 max-[600px]:w-full max-[600px]:text-left">
                        {{ $label ? $label($item) : Str::limit($item->{$field}, $limit) }}
                    </span>

                    <div class="flex items-center gap-2 max-[600px]:self-start">
                        <a href="{{ route($resource . '.show', $item) }}" class="{{ $btnSmall }} bg-[#66bb6a]">
                            Bekijk
                        </a>
                        <a href="{{ route($resource . '.edit', $item) }}" class="{{ $btnSmall }} bg-[#0a84ff]">
                            Bewerk
                        </a>

                        <form method="POST" action="{{ route($resource . '.destroy', $item) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="{{ $btnSmall }} bg-[#c0444a]">
                                Verwijder
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="flex items-center min-h-[56px] px-4">
                    <span class="text-xl font-bold text-[var(--dark-blue)]">{{ $emptyText }}</span>
                </div>
            @endforelse
        </div>
    </div>
</div>