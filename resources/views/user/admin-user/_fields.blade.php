
<x-avored-field
    label="avored::system.comms.first_name"
    for="first_name"
>
    <x-avored-input
        name="first_name"
        autofocus="autofocus"
        :value="$adminUser->first_name ?? ''"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.last_name"
    for="last_name"
>
    <x-avored-input
        name="last_name"
        :value="$adminUser->last_name ?? ''"
    >
    </x-avored-input>
</x-avored-field>

@php
    if (isset($adminUser)) {
        $disabled = true;
        $class = 'bg-gray-300';
        $hidePassword = false;
    } else {
        $disabled = false;
        $class = '';
        $hidePassword = true;
    }
@endphp

<x-avored-field
    label="avored::system.comms.email"
    for="email"
>


    <x-avored-input
        name="email"
        :value="$adminUser->email ?? ''"
        :disabled="$disabled"
        :class="$class"
    >
    </x-avored-input>
</x-avored-field>

@if ($hidePassword)
<x-avored-field
    label="avored::system.comms.password"
    for="password"
>
    <x-avored-input
        name="password"
        type="password"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.password_confirmation"
    for="password_confirmation"
>
    <x-avored-input
        name="password_confirmation"
        type="password"
    >
    </x-avored-input>
</x-avored-field>

@endif



<x-avored-field
    label="avored::system.comms.image"
    for="upload"
>
    <x-avored-upload
        name="image_path"
        :value="$adminUser->media ?? ''"
    >
    </x-avored-upload>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.role_id"
    for="role_id"
>
    <x-avored-select
        name="role_id"
        :options="$roleOptions"
        :value="$currency->role_id ?? ''"
    >
    </x-avored-select>
</x-avored-field>

<x-avored-field
    label="avored::system.comms.language"
    for="language"
>
    <x-avored-select
        name="language"
        :options="$countries"
        :value="$adminUser->language ?? ''"
    >
        <x-slot name="optionSlot">
            @foreach($countries as $option)
                <option
                    {{ (isset($adminUser) && $option->id . '_' . $option->lang_code === $adminUser->language) ? 'selected' : ''  }}
                    value="{{ $option->id . '_' . $option->lang_code }}"
                >
                    {{ $option->lang_code . " :: "  . $option->name }}
                </option>
            @endforeach
        </x-slot>
    </x-avored-select>

</x-avored-field>
