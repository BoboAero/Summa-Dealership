<x-app-layout>
    <div class="repairs-page">
        <div class="repairs-page__inner">

            <div class="repairs-page__header">
                <h1 class="repairs-page__title">Reparaties</h1>

                <a href="{{ route('repairs.create') }}" class="btn btn--pink">
                    Nieuwe Reparatie
                </a>
            </div>

            <div class="repair-list scroll-styled">
                @forelse($repairs as $repair)
                    <div class="repair-row">
                        <span class="repair-row__title">
                            {{ Str::limit($repair->description, 60) }}
                        </span>

                        <div class="repair-row__actions">
                            <a href="{{ route('repairs.show', $repair) }}" class="btn btn--small btn--green">
                                Bekijk
                            </a>
                            <a href="{{ route('repairs.edit', $repair->id) }}" class="btn btn--small btn--blue">
                                Bewerk
                            </a>

                            <form method="POST" action="{{ route('repairs.destroy', $repair) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn--small btn--red">
                                    Verwijder
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="repair-list__empty">
                        <span class="repair-list__empty-text">Er zijn nog geen reparaties.</span>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
