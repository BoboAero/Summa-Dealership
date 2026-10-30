<x-app-layout>
    <x-resource-index
        title="Gebruikers"
        resource="users"
        :items="$users"
        field="name"
        create-label="Nieuwe Gebruiker"
        empty-text="Er zijn nog geen gebruikers."
    />
</x-app-layout>
