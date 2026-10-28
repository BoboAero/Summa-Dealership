<x-app-layout>
    <div class="repairs-page">
        <div class="repairs-page__inner">
            <h1 class="repairs-page__title">Reparatie bewerken</h1>

            <form class="form-grid" autocomplete="off" method="post" action="{{ route('repairs.update', $repair) }}">
                @csrf
                @method('PUT')
                <div>
                    <label for="userName" class="field__label">Naam</label>

                    <div class="field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="text"
                            id="userName"
                            name="description"
                            value="{{ $repair->description }}"
                            class="field__input"
                        >
                    </div>
                </div>

                <div>
                    <label for="car" class="field__label">Auto</label>

                    <div class="field__wrap">
                        <select
                            id="car"
                            name="car_id"
                            class="field__select"
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
                    <label for="userRole" class="field__label">Medewerker</label>

                    <div class="field__wrap">
                        <select id="userRole" name="user_id" class="field__select">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" @if($user->id == $repair->user_id) selected @endif>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <span class="field__label">Beschikbare Onderdelen</span>

                    <div class="parts-box scroll-styled scroll-styled--hover">
                        @foreach($parts as $part)
                            <label class="part part--clickable">
                                <input
                                    type="checkbox"
                                    name="parts[]"
                                    value="{{ $part->id }}"
                                    @if($repair->parts->contains('id', $part->id)) checked @endif
                                    class="part__checkbox"
                                >
                                <span class="part__name">{{ $part->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('repairs.index') }}" class="btn btn--back">
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