<x-avored-field
    label="avored::system.comms.name"
    for="name"
>
    <x-avored-input
        name="name"
        autofocus="autofocus"
        :value="$property->name ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.slug"
    for="slug"
>
    <x-avored-input
        name="slug"
        :value="$property->slug ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.data_type"
    for="data_type"
>
    <x-avored-select
        name="data_type"
        :options="$dataTypeOptions"
        :value="$property->data_type ?? ''"
    >
    </x-avored-select>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.field_type"
    for="field_type"
>
    <x-avored-select
        v-model="fieldType"
        name="field_type"
        :options="$fieldTypeOptions"
        :value="$property->field_type ?? ''"
    >
    </x-avored-select>
</x-avored-field>

<x-avored-field
    :label="__('avored::system.comms.use_for_all_products')"
    for="is_default"
>
    <avored-toggle
        checkbox-name="use_for_all_products"
        default-value="{{ $property->use_for_all_products ?? false }}"
    >
    </avored-toggle>
</x-avored-field>


<x-avored-field
    :label="__('avored::system.comms.use_for_category_filter')"
>
    <avored-toggle
        checkbox-name="use_for_category_filter"
        default-value="{{ $property->use_for_category_filter ?? false }}"
    >
    </avored-toggle>

</x-avored-field>

<x-avored-field
    label="avored::system.comms.is_visible_frontend"
>
    <avored-toggle
        checkbox-name="is_visible_frontend"
        default-value="{{ $property->is_visible_frontend ?? false }}"
    >
    </avored-toggle>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.sort_order"
    for="sort_order"
>
    <x-avored-input
        name="sort_order"
        :value="$property->sort_order ?? ''"
    >
    </x-avored-input>
</x-avored-field>
