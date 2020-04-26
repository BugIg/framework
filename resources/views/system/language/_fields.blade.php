
<x-avored-field
    label="avored::system.comms.name"
    for="name"
>
    <x-avored-input
        name="name"
        autofocus="autofocus"
        :value="$language->name ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.code"
    for="code"
>
    <x-avored-input
        name="code"
        :value="$language->code ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.is_default"
>
    <avored-toggle
        checkbox-name="is_default"
        default-value="{{ $language->is_default ?? false }}"
    />
</x-avored-field>