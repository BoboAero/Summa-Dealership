<x-app-layout>
    <div class="page">
        <div class="page__inner">

            <h1 class="page__title">Onderdeel bewerken</h1>

            <form
                class="form__grid"
                autocomplete="off"
                method="post"
                action="{{ route('parts.update', $part) }}"
            >
                @csrf
                @method('PUT')

                <div>
                    <label for="partName" class="form-field__label">Naam</label>

                    <div class="form-field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="text"
                            id="partName"
                            name="name"
                            value="{{ old('name', $part->name) }}"
                            maxlength="255"
                            class="form-field__input"
                        >
                    </div>
                </div>

                <div>
                    <label for="partPrice" class="form-field__label">Prijs (€)</label>

                    <div class="form-field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="number"
                            step="0.01"
                            min="0"
                            id="partPrice"
                            name="price"
                            value="{{ old('price', $part->price) }}"
                            class="form-field__input"
                        >
                    </div>
                </div>

                <div>
                    <label for="partStock" class="form-field__label">Voorraad</label>

                    <div class="form-field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="number"
                            step="1"
                            min="0"
                            id="partStock"
                            name="stock"
                            value="{{ old('stock', $part->stock) }}"
                            class="form-field__input"
                        >
                    </div>
                </div>

                <div class="form__actions">
                    <a href="{{ route('parts.index') }}" class="button button--back">
                        Terug
                    </a>

                    <button type="submit" class="button button--pink">
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