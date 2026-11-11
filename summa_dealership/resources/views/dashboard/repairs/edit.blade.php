<x-app-layout>
    <div class="page">
        <div class="page__inner">
            <h1 class="page__title">Reparatie bewerken</h1>

            <form class="form__grid" autocomplete="off" method="post" action="{{ route('repairs.update', $repair) }}">
                @csrf
                @method('PUT')
                <div>
                    <label for="userName" class="form-field__label">Naam</label>

                    <div class="form-field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="text"
                            id="userName"
                            name="description"
                            value="{{ $repair->description }}"
                            class="form-field__input"
                        >
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
                                <option value="{{ $car->id }}" @if($car->id == $repair->car_id) selected @endif>
                                    {{ $car->name }}
                                </option>
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
                                <option value="{{ $user->id }}" @if($user->id == $repair->user_id) selected @endif>
                                    {{ $user->name }}
                                </option>
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
                                    @if($repair->parts->contains('id', $part->id)) checked @endif
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