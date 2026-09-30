<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruiker Aanpassen</title>
    @vite('resources/css/app.css')
</head>
<body class="CuBody">
<h1>Gebruiker Aanpassen</h1>
<div class="CuForm">
    <form class="CuFormGrid" autocomplete="off" method="post" action="{{route('users.update', $user->id)}}">
        @csrf
        @method('PUT')
        <div style="grid-area: name">
            <label for="userName" >Naam</label>
            <input autocomplete="off" required type="text" id="userName" name="name" value="{{$user->name}}">
        </div>
        <div style="grid-area: password">
            <label for="userPassword">Wachtwoord</label>
            <input autocomplete="off" required type="password" minlength="8" id="userPassword" name="password">
        </div>
        <div style="grid-area: email">
            <label for="userEmail">Email</label>
            <input autocomplete="off" required type="email" id="userEmail" name="email" value="{{$user->email}}">
        </div>
        <div style="grid-area: role">
            <label for="userRole">Role</label>
            <select id="userRole" name="role_id">
                @foreach($roles as $role)
                    <option value="{{$role->id}}" @if($role->id == $user->role_id) selected @endif>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div style="grid-area: back">
            <a href="{{route('users.index')}}" class="CuBackButton">Terug</a>
        </div>
        <div style="grid-area: create">
            <button type="submit" class="CuCreateButton">Aanpassen</button>
        </div>
    </form>
</div>
@if($errors->any())
    <div>
        <p>ERRORS:</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
