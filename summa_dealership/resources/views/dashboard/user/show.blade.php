<x-app-layout>
    <div class="page">
        <div class="page__inner">

            <h1 class="page__title">
                Gebruikersinformatie
            </h1>

            <div class="form__grid">

                <div>
                    <span class="form-field__label">Naam</span>
                    <div class="form-field__static">{{ $user->name }}</div>
                </div>

                <div>
                    <span class="form-field__label">Gebruikersnaam</span>
                    <div class="form-field__static">{{ $user->username }}</div>
                </div>

                <div>
                    <span class="form-field__label">Email</span>
                    <div class="form-field__static">{{ $user->email }}</div>
                </div>

                <div>
                    <span class="form-field__label">Rol</span>
                    <div class="form-field__static">{{ $user->role->name }}</div>
                </div>

                <div class="form__actions">
                    <a href="{{ route('users.index') }}" class="button button--back">
                        Terug
                    </a>
                    <a href="{{ route('users.edit', $user) }}" class="button button--primary">
                        Bewerk
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
