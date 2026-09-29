<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reparatie bekijken</title>
        @vite('resources/css/app.css')
    </head>

    <body>

        <div>

            <div class="pb-2">
                <h2 class="font-bold">Monteur</h2>
                <p>{{ $repair->user->name }}</p>
            </div>

              <div class="pb-2">
                <h2 class="font-bold">Auto</h2>
                <p>{{ $repair->car->name }}</p>
            </div>

                <div class="pb-2">
                <h2 class="font-bold">Beschrijving</h2>
                <p>{{ $repair->description }}</p>
            </div>

                <div class="pb-2">
                <h2 class="font-bold">Onderdelen</h2>

                @if($repair->parts->count())
                    <ul>
                        @foreach($repair->parts as $part)
                            <li>
                                {{ $part->name }},
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Geen onderdelen toegevoegd.</p>
                @endif
            </div>

            <a href="{{ route('repairs.index') }}">
                Terug
            </a>

        </div>

    </body>
</html>
