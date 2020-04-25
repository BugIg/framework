
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
        :options="$options"
        :value="$currency->code ?? ''"
    >
        <x-slot name="optionSlot">
            @foreach($options as $option)
                <option
                    {{ (isset($currency) && $option->id . '_' . $option->currency_code === $currency->code) ? 'selected' : ''  }}
                    value="{{ $option->id . '_' . $option->currency_code }}"
                >
                    {{ $option->name . ': ' . $option->currency_code  }}
                </option>
            @endforeach
        </x-slot>
    </x-avored-select>

</x-avored-field>


<x-avored-field
    label="avored::system.comms.symbol"
    for="symbol"
>
    <x-avored-select
        name="symbol"
        :options="$options"
        :value="$currency->symbol ?? ''"
    >
        <x-slot name="optionSlot">
            @foreach($options as $option)
                <option
                    {{ (isset($currency) && $option->id . '_' . $option->currency_symbol === $currency->symbol) ? 'selected' : ''  }}
                    value="{{  $option->id . '_' . $option->currency_symbol }}"
                >
                    {{ $option->name . ': ' . $option->currency_symbol  }}
                </option>
            @endforeach
        </x-slot>
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
