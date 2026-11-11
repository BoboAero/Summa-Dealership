<x-app-layout>
    <div class="page">
        <div class="page__inner">

            <h1 class="page__title">
                {{ Str::limit($part->name, 80) }}
            </h1>

            <div class="form__grid">

                <div>
                    <span class="form-field__label">Naam</span>
                    <div class="form-field__static">{{ $part->name }}</div>
                </div>

                <div>
                    <span class="form-field__label">Prijs</span>
                    <div class="form-field__static">{{ $part->price }}</div>
                </div>

                <div>
                    <span class="form-field__label">Voorraad</span>
                    <div class="form-field__static">{{ $part->stock }}</div>
                </div>

                <div class="form__actions">
                    <a href="{{ route('parts.index') }}" class="button button--back">
                        Terug
                    </a>
                    <a href="{{ route('parts.edit', $part->id) }}" class="button button--primary">
                        Bewerk
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>