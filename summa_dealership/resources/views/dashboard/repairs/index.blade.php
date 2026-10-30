<x-app-layout>
    <x-resource-index
        title="Reparaties"
        resource="repairs"
        :items="$repairs"
        field="description"
        create-label="Nieuwe Reparatie"
        empty-text="Er zijn nog geen reparaties."
    />
</x-app-layout>
