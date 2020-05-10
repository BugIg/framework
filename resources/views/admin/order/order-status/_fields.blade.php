<x-avored-field
    label="avored-admin::system.comms.name"
    for="name"
>
    <x-avored-input
        name="name"
        autofocus="autofocus"
        :value="$orderStatus->name ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored-admin::system.comms.is_default"
>
    <avored-toggle
        checkbox-name="is_default"
        default-value="{{ $orderStatus->is_default ?? false }}"
    >
    </avored-toggle>
</x-avored-field>
