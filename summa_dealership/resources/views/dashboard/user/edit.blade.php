<x-app-layout>
    <div class="repairs-page">
        <div class="repairs-page__inner">
            <h1 class="repairs-page__title">Gebruikers bewerken</h1>

            <form class="form-grid" autocomplete="off" method="post" action="{{ route('users.update', $user) }}">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="field__label">Naam</label>

                    <div class="field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="text"
                            id="name"
                            name="name"
                            value="{{ $user->name }}"
                            class="field__input"
                        >
                    </div>
                </div>

                <div>
                    <label for="username" class="field__label">Gebruikersnaam</label>

                    <div class="field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="text"
                            id="username"
                            name="username"
                            value="{{ $user->username }}"
                            class="field__input"
                        >
                    </div>
                </div>

                <div>
                    <label for="email" class="field__label">Email</label>

                    <div class="field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="email"
                            id="email"
                            name="email"
                            value="{{ $user->email }}"
                            class="field__input"
                        >
                    </div>
                </div>

                <div>
                    <label for="password" class="field__label">Wachtwoord</label>

                    <div class="field__wrap">
                        <input
                            autocomplete="off"
                            required
                            type="password"
                            id="password"
                            name="password"
                            class="field__input"
                        >
                    </div>

                    <div>
                        <label for="role" class="field__label">Rol</label>
                        <div class="field__wrap">
                            <select id="role" name="role" class="field__select">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if($role->id == $user->role_id) selected @endif>
                                        {{$role->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="form-actions">
                    <a href="{{ route('users.index') }}" class="btn btn--back">
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
