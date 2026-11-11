<x-app-layout>
    <div class="page">
        <div class="page__inner">

            <h1 class="page__title">Nieuwe reparatie aanmaken</h1>

            <form
                class="form__grid"
                autocomplete="off"
                method="post"
                action="{{ route('repairs.store') }}"
            >
                @csrf

                <div>
                    <label for="userName" class="form-field__label">Naam</label>

                    <div class="form-field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="text"
                            id="userName"
                            name="description"
                            class="form-field__input"
                        >

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="form-field__icon">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                    </div>
                </div>

                <div>
                    <label for="car" class="form-field__label">Auto</label>

                    <div class="form-field__wrap">
                        <select
                            id="car"
                            name="car_id"
                            class="form-field__select"
                            @disabled($cars->isEmpty())
                        >
                            @forelse($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->name }}</option>
                            @empty
                                <option value="" disabled selected>
                                    Geen auto's beschikbaar
                                </option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div>
                    <label for="userRole" class="form-field__label">Medewerker</label>

                    <div class="form-field__wrap">
                        <select id="userRole" name="user_id" class="form-field__select">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <span class="form-field__label">Beschikbare Onderdelen</span>

                    <div class="selection-box scroll-styled scroll-styled--hover">
                        @foreach($parts as $part)
                            <label class="selection-item selection-item--clickable">
                                <input
                                    type="checkbox"
                                    name="parts[]"
                                    value="{{ $part->id }}"
                                    class="selection-item__checkbox"
                                >
                                <span class="selection-item__name">{{ $part->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="form__actions">
                    <a href="{{ route('repairs.index') }}" class="button button--back">
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