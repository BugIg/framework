<x-avored-field
    label="avored-admin::system.comms.name"
    for="name"
>
    <x-avored-input
        name="name"
        autofocus="autofocus"
        :value="$attribute->name ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored-admin::system.comms.slug"
    for="slug"
>
    <x-avored-input
        name="slug"
        :value="$attribute->slug ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored-admin::system.comms.display_as"
    for="display_as"
>
    <avored-select 
        name="display_as"
        :options="{{ json_encode($displayAsOptions) }}"
        value="{{ $attribute->display_as ?? '' }}"
    ></avored-select>
    
    {{-- <x-avored-select
        name="display_as"
        :options="$displayAsOptions"
        :value="$currency->display_as ?? ''"
    >
    </x-avored-select> --}}
</x-avored-field>
