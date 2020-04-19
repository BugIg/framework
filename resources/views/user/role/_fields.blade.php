
<x-avored-field
    label="avored::system.comms.name"
    for="name"
>
    <x-avored-input
        name="name"
        autofocus="autofocus"
        :value="$role->name ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.description"
    for="description"
>
    <x-avored-input
        name="description"
        :value="$role->description ?? ''"
    >
    </x-avored-input>
</x-avored-field>

