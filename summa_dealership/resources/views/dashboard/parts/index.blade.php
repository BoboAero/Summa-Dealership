<x-app-layout>
    <x-resource-index
        title="Onderdelen"
        resource="parts"
        :items="$parts"
        field="name"
        create-label="Nieuw Onderdeel"
        empty-text="Geen onderdelen gevonden."
    />
</x-app-layout>
