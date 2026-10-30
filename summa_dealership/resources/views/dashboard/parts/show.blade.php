<x-app-layout>
    <div class="repairs-page">
        <div class="repairs-page__inner">

            <h1 class="repairs-page__title">
                {{ Str::limit($part->name, 80) }}
            </h1>

            <div class="form-grid">

                <div>
                    <span class="field__label">Naam</span>
                    <div class="field__static">{{ $part->name }}</div>
                </div>

                <div>
                    <span class="field__label">Prijs</span>
                    <div class="field__static">{{ $part->price }}</div>
                </div>

                <div>
                    <span class="field__label">Voorraad</span>
                    <div class="field__static">{{ $part->stock }}</div>
                </div>


                <div class="form-actions">
                    <a href="{{ route('parts.index') }}" class="btn btn--back">
                        Terug
                    </a>
                    <a href="{{ route('parts.edit', $part->id) }}" class="btn btn--primary">
                        Bewerk
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>