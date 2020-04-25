<x-avored-field
    label="avored::system.comms.name"
    for="name"
>
    <x-avored-input
        name="name"
        autofocus="autofocus"
        :value="$userGroup->name ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<avored-toggle
    label="{{ __('avored::system.comms.is_default') }}"
    checkbox-name="is_default"
    default-value="{{ $userGroup->is_default ?? false }}"
>
</avored-toggle>
