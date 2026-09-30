<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard gebruikers</title>
        @vite('resources/css/app.css')
    </head>
    <body>
    <div class="UserManagement">
        <h1 class="TableHeader" style="grid-area: userHeader;">Gebruikers</h1>
        <a style="grid-area: newUser;" href="{{route('users.create')}}">Nieuwe Gebruiker</a>
        <table class="ManageTable" style="grid-area: userTable;">
            <thead>
            <tr class="">
                <td>Naam</td>
                <td>Email</td>
                <td>Rol</td>
                <td>Aanpassingen</td>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->Role->name}}</td>
                    <td style="display: flex;flex-direction: row; justify-content: center;">
                        <a href="{{route('users.edit', $user->id)}}" style="padding-right: 5px">Aanpassen</a>
                        <form method="post" style="padding-left: 5px" action="{{route("users.destroy", $user->id)}}">@csrf @method('DELETE')
                            <button type="submit">Verwijder</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </thead>
        </table>
    </div>
    </body>
</html>
