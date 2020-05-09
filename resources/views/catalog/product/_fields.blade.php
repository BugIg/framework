
<x-avored-field
    label="avored::system.comms.name"
    for="name"
>
    <x-avored-input
        name="name"
        :autofocus="true"
        :value="$product->name ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.category_id"
    for="categories[]"
>
    <x-avored-select
        name="categories[]"
        :options="$categoryOptions"
        multiple
        :value="$product->categories ?? ''"
    >
    </x-avored-select>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.slug"
    for="slug"
>
    <x-avored-input
        name="slug"
        :value="$product->slug ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.sku"
    for="sku"
>
    <x-avored-input
        name="sku"
        :value="$product->sku ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.barcode"
    for="barcode"
>
    <x-avored-input
        name="barcode"
        :value="$product->barcode ?? ''"
    >
    </x-avored-input>
</x-avored-field>
<x-avored-field
    label="avored::system.comms.description"
    for="description"
>
    
    <x-avored-editor
        name="description"
        :value="$product->description ?? ''"
    >
    </x-avored-editor>
    
</x-avored-field>

<x-avored-field
    label="avored::system.comms.status"
    for="status"
>
    <avored-toggle
        checkbox-name="status"
        default-value="{{ isset($product->status) ? $product->status : '' }}"
    >
    </avored-toggle>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.in_stock"
    for="in_stock"
>
    <avored-toggle
        checkbox-name="in_stock"
        default-value="{{ isset($product->in_stock) ? $product->in_stock : '' }}"
    >
    </avored-toggle>
</x-avored-field>
<x-avored-field
    label="avored::system.comms.track_stock"
    for="track_stock"
>
    <avored-toggle
        checkbox-name="track_stock"
        default-value="{{ isset($product->track_stock) ? $product->track_stock : '' }}"
    >
    </avored-toggle>
</x-avored-field>



<x-avored-field
    label="avored::system.comms.qty"
    for="qty"
>
    <x-avored-input
        name="qty"
        type="number"
        step="0.01"
        :value="$product->qty ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.price"
    for="price"
>
    <x-avored-input
        name="price"
        type="number"
        step="0.01"
        :value="$product->price ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.cost_price"
    for="cost_price"
>
    <x-avored-input
        name="cost_price"
        type="number"
        step="0.01"
        :value="$product->cost_price ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.weight"
    for="weight"
>
    <x-avored-input
        name="weight"
        type="number"
        step="0.01"
        :value="$product->weight ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.length"
    for="length"
>
    <x-avored-input
        name="length"
        type="number"
        step="0.01"
        :value="$product->length ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.width"
    for="width"
>
    <x-avored-input
        name="width"
        type="number"
        step="0.01"
        :value="$product->width ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.height"
    for="height"
>
    <x-avored-input
        name="height"
        type="number"
        step="0.01"
        :value="$product->height ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.meta-title"
    for="meta_title"
>
    <x-avored-input
        name="meta_title"
        :value="$product->meta_title ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.meta-description"
    for="meta_description"
>
    <x-avored-input
        name=""
        :value="$product->meta_description ?? ''"
    >
    </x-avored-input>
</x-avored-field>
