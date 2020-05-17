
<x-avored-field
    label="avored-admin::system.comms.first_name"
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
    label="avored-admin::system.comms.last_name"
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
    label="avored-admin::system.comms.email"
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
    label="avored-admin::system.comms.password"
    for="password"
>
    <x-avored-input
        name="password"
        type="password"
    >
    </x-avored-input>
</x-avored-field>

<x-avored-field
    label="avored-admin::system.comms.password_confirmation"
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
    label="avored-admin::system.comms.image"
    for="upload"
>
    <avored-upload 
            name="media"
            path="users"
            :init-media-collection="{{ isset($adminUser->media) ?  json_encode($adminUser->media) : '{}' }}"
            upload-url="{{ route('admin.upload.post') }}"
    ></avored-upload>
    
</x-avored-field>

<x-avored-field
    label="avored-admin::system.comms.role_id"
    for="role_id"
>
    <avored-select
        name="role_id"
        :options="{{ json_encode($roleOptions) }}"
        value="{{ $adminUser->role_id ?? '' }}"
    >
    </avored-select>
</x-avored-field>

<x-avored-field
    label="avored-admin::system.comms.language"
    for="language"
>
    <avored-select
        name="language"
        :options="{{ json_encode($languageOptions) }}"
        value="{{ $adminUser->language ?? '' }}"
    >
    </avored-select>
    
</x-avored-field>
