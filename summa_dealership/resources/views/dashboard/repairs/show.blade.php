<x-app-layout>
    <div class="page">
        <div class="page__inner">

            <h1 class="page__title">
                {{ Str::limit($repair->description, 80) }}
            </h1>

            <div class="form__grid">

                <div>
                    <span class="form-field__label">Naam</span>
                    <div class="form-field__static">{{ $repair->description }}</div>
                </div>

                <div>
                    <span class="form-field__label">Auto</span>
                    <div class="form-field__static">{{ $repair->car->name ?? '-' }}</div>
                </div>

                <div>
                    <span class="form-field__label">Medewerker</span>
                    <div class="form-field__static">{{ $repair->user->name ?? '-' }}</div>
                </div>

                <div>
                    <span class="form-field__label">Beschikbare Onderdelen</span>

                    <div class="selection-box scroll-styled">
                        @forelse($repair->parts as $part)
                            <label class="selection-item">
                                <input type="checkbox" checked disabled class="selection-item__checkbox">
                                <span class="selection-item__name">{{ $part->name }}</span>
                            </label>
                        @empty
                            <p class="selection-empty">Geen onderdelen toegevoegd.</p>
                        @endforelse
                    </div>
                </div>

                <div class="form__actions">
                    <a href="{{ route('repairs.index') }}" class="button button--back">
                        Terug
                    </a>
                    <a href="{{ route('repairs.edit', $repair->id) }}" class="button button--primary">
                        Bewerk
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
