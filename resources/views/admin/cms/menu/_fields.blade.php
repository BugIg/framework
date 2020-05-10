
<x-avored-field
    label="avored-admin::system.comms.name"
    for="name"
>
    <x-avored-input
        name="name"
        autofocus="autofocus"
        :value="$menu->name ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored-admin::system.comms.identifier"
    for="identifier"
>
    <x-avored-input
        name="identifier"
        :value="$menu->identifier ?? ''"
    >
    </x-avored-input>
</x-avored-field>
