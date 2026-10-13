<x-app-layout>

    <div class="CuBody">
        <h1>Nieuwe gebruiker aanmaken</h1>
        <div class="CuForm">
            <form class="CuFormGrid" autocomplete="off" method="post" action="{{route('users.store')}}">
                @csrf
                <div style="grid-area: name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <label for="userName" >Naam</label>
                    <input autocomplete="off" required type="text" id="userName" name="name" value="{{old('name')}}">

                </div>
                <div >
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    <label for="userUsername" >Gebruikersnaam</label>
                    <input autocomplete="off" required type="text" id="userUsername" name="username" value="{{old('username')}}">

                </div>
                <div style="grid-area: password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <label for="userPassword">Wachtwoord</label>
                    <input autocomplete="off" required type="password" minlength="8" id="userPassword" name="password">
                </div>
                <div style="grid-area: email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <label for="userEmail">Email</label>
                    <input autocomplete="off" required type="email" id="userEmail" name="email" value="{{old('email')}}">
                </div>
                <div style="grid-area: role">
                    <label for="userRole">Role</label>
                    <select id="userRole" name="role_id">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" @if($role->id == 6) selected @endif>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="flex-direction: row">
                    <a href="{{route('users.index')}}" class="CuBackButton">Terug</a>
                    <button type="submit" class="CuCreateButton">Aanmaken</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
