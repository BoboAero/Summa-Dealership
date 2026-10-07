<x-app-layout>
    <body>
        <div class="UserManagement">
            <h1 class="TableHeader" style="grid-area: userHeader">
                Reparaties
            </h1>
            <table class="ManageTable" style="grid-area: userTable">
                <thead>
                    <tr class="">
                        <td>Monteur</td>
                        <td>Auto in reparatie</td>
                        <td>Descriptie</td>
                        <td>Onderdelen</td>
                        <td>Show</td>
                    </tr>
                    @foreach($repairs as $repair)
                    <tr>
                        <td>{{$repair->User->name}}</td>
                        <td>{{$repair->Car->name}}</td>
                        <td>{{ $repair->description }}</td>

                        <td>
                            @foreach($repair->parts as $part) {{ $part->name
                            }}<br />
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('repairs.show', $repair) }}">
                                Bekijken
                            </a>
                        </td>
                        @endforeach
                    </tr>
                </thead>
            </table>
        </div>
    </body>
</x-app-layout>>
