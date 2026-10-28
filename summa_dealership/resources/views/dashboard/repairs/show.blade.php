<x-app-layout>
    <div class="repairs-page">
        <div class="repairs-page__inner">

            <h1 class="repairs-page__title">
                {{ Str::limit($repair->description, 80) }}
            </h1>

            <div class="form-grid">

                <div>
                    <span class="field__label">Naam</span>
                    <div class="field__static">{{ $repair->description }}</div>
                </div>

                <div>
                    <span class="field__label">Auto</span>
                    <div class="field__static">{{ $repair->car->name ?? '-' }}</div>
                </div>

                <div>
                    <span class="field__label">Medewerker</span>
                    <div class="field__static">{{ $repair->user->name ?? '-' }}</div>
                </div>

                <div>
                    <span class="field__label">Beschikbare Onderdelen</span>

                    <div class="parts-box scroll-styled">
                        @forelse($repair->parts as $part)
                            <label class="part">
                                <input type="checkbox" checked disabled class="part__checkbox">
                                <span class="part__name">{{ $part->name }}</span>
                            </label>
                        @empty
                            <p class="part-empty">Geen onderdelen toegevoegd.</p>
                        @endforelse
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('repairs.index') }}" class="btn btn--back">
                        Terug
                    </a>
                    <a href="{{ route('repairs.edit', $repair->id) }}" class="btn btn--primary">
                        Bewerk
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>