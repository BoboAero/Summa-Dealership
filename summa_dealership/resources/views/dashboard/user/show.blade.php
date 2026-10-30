<x-app-layout>
    <div class="repairs-page">
        <div class="repairs-page__inner">

            <h1 class="repairs-page__title">
                Gebruikersinformatie
            </h1>

            <div class="form-grid">

                <div>
                    <span class="field__label">Naam</span>
                    <div class="field__static">{{$user->name}}</div>
                </div>

                <div>
                    <span class="field__label">Gebruikersnaam</span>
                    <div class="field__static">{{ $user->username }}</div>
                </div>

                <div>
                    <span class="field__label">Email</span>
                    <div class="field__static">{{ $user->email}}</div>
                </div>



                <div>
                    <span class="field__label">Rol</span>
                    <div class="field__static">{{ $user->role->name}}</div>
                </div>




                <div class="form-actions">
                    <a href="{{ route('users.index') }}" class="btn btn--back">
                        Terug
                    </a>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn--primary">
                        Bewerk
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
