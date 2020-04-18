
<x-avored-field
    label="avored::system.comms.name"
    for="name"
>
    <x-avored-input
        name="name"
        autofocus="autofocus"
        :value="$category->name ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.slug"
    for="slug"
>
    <x-avored-input
        name="slug"
        :value="$category->slug ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.meta-title"
    for="meta_title"
>
    <x-avored-input
        name="meta_title"
        :value="$category->meta_title ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.meta-description"
    for="meta_description"
>
    <x-avored-input
        name="meta_description"
        :value="$category->meta_description ?? ''"
    >
    </x-avored-input>
</x-avored-field>
