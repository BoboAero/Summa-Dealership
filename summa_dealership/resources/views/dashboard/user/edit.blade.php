<x-app-layout>
    <div class="page">
        <div class="page__inner">
            <h1 class="page__title">Gebruikers bewerken</h1>

            <form class="form__grid" autocomplete="off" method="post" action="{{ route('users.update', $user) }}">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="form-field__label">Naam</label>

                    <div class="form-field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="text"
                            id="name"
                            name="name"
                            value="{{ $user->name }}"
                            class="form-field__input"
                        >
                    </div>
                </div>

                <div>
                    <label for="username" class="form-field__label">Gebruikersnaam</label>

                    <div class="form-field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="text"
                            id="username"
                            name="username"
                            value="{{ $user->username }}"
                            class="form-field__input"
                        >
                    </div>
                </div>

                <div>
                    <label for="email" class="form-field__label">Email</label>

                    <div class="form-field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="email"
                            id="email"
                            name="email"
                            value="{{ $user->email }}"
                            class="form-field__input"
                        >
                    </div>
                </div>

                <div>
                    <label for="password" class="form-field__label">Wachtwoord</label>

                    <div class="form-field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="password"
                            id="password"
                            name="password"
                            class="form-field__input"
                        >
                    </div>
                </div>

                <div>
                    <label for="role" class="form-field__label">Rol</label>
                    <div class="form-field__wrap">
                        <select id="role" name="role" class="form-field__select">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" @if($role->id == $user->role_id) selected @endif>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form__actions">
                    <a href="{{ route('users.index') }}" class="button button--back">
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
