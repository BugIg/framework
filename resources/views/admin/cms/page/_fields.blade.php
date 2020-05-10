
<x-avored-field
    label="avored-admin::system.comms.name"
    for="name"
>
    <x-avored-input
        name="name"
        autofocus="autofocus"
        :value="$page->name ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored-admin::system.comms.slug"
    for="slug"
>
    <x-avored-input
        name="slug"
        :value="$page->slug ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored-admin::system.comms.content"
    for="content"
>
    <x-avored-editor
        name="content"
        :value="$page->content ?? ''"
    >
    </x-avored-editor>
</x-avored-field>


<x-avored-field
    label="avored-admin::system.comms.meta-title"
    for="meta_title"
>
    <x-avored-input
        name="meta_title"
        :value="$page->meta_title ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored-admin::system.comms.meta-description"
    for="meta_description"
>
    <x-avored-input
        name="meta_description"
        :value="$page->meta_description ?? ''"
    >
    </x-avored-input>
</x-avored-field>
