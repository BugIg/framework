
<div class="mt-1 sm:mt-0 sm:col-span-2">
    <div class="flex w-full rounded-md shadow-sm">
        
        <avored-input
            name="{{ $name }}"
            class="placeholder-gray-500"
            type="{{ $type }}"
            error-message="{{ $errors->first($name) }}"
            {{ $attributes }}
        />

    </div>
</div>
