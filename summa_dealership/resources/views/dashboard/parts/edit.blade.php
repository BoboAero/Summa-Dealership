<x-app-layout>
    <div class="repairs-page">
        <div class="repairs-page__inner">

            <h1 class="repairs-page__title">Onderdeel bewerken</h1>

            <form
                class="form-grid"
                autocomplete="off"
                method="post"
                action="{{ route('parts.update', $part) }}"
            >
                @csrf
                @method('PUT')

                <div>
                    <label for="partName" class="field__label">Naam</label>

                    <div class="field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="text"
                            id="partName"
                            name="name"
                            value="{{ old('name', $part->name) }}"
                            maxlength="255"
                            class="field__input"
                        >
                    </div>
                </div>

                <div>
                    <label for="partPrice" class="field__label">Prijs (€)</label>

                    <div class="field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="number"
                            step="0.01"
                            min="0"
                            id="partPrice"
                            name="price"
                            value="{{ old('price', $part->price) }}"
                            class="field__input"
                        >
                    </div>
                </div>

                <div>
                    <label for="partStock" class="field__label">Voorraad</label>

                    <div class="field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="number"
                            step="1"
                            min="0"
                            id="partStock"
                            name="stock"
                            value="{{ old('stock', $part->stock) }}"
                            class="field__input"
                        >
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('parts.index') }}" class="btn btn--back">
                        Terug
                    </a>

                    <button type="submit" class="btn btn--pink">
                        Opslaan
                    </button>
                </div>
            </form>

            @if($errors->any())
                <div class="alert">
                    <p class="alert__title">Er zijn fouten opgetreden:</p>

                    <ul class="alert__list">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>