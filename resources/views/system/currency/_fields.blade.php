
<x-avored-field
    label="avored::system.comms.name"
    for="name"
>
    <x-avored-input
        name="name"
        autofocus="autofocus"
        :value="$currency->name ?? ''"
    >
    </x-avored-input>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.code"
    for="code"
>
    <x-avored-select
        name="code"
        :options="$currencyCodeOptions"
        :value="$currency->code ?? ''"
    >
    </x-avored-select>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.symbol"
    for="symbol"
>
    <x-avored-select
        name="symbol"
        :options="$currencySymbolOptions"
        :value="$currency->symbol ?? ''"
    >
    </x-avored-select>
</x-avored-field>


<x-avored-field
    label="avored::system.comms.conversation_rate"
    for="conversation_rate"
>
    <x-avored-input
        name="conversation_rate"
        :value="$currency->conversation_rate ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<avored-toggle
    label="{{ __('avored::system.comms.status') }}"
    checkbox-name="status"
    default-value="{{ isset($currency->status) ? $currency->status : '' }}"
>
</avored-toggle>
