
<div class="mt-1 sm:mt-0 sm:col-span-2 relative">
    <div class="max-w-lg flex rounded-md shadow-sm">
        <avored-editor
            name="{{ $name }}"
            :errors="{{ $errors }}"
            {{ $attributes }}
        />

    </div>
    @if($errors->has($name))
    <div class="text-red-500 mt-2 text-sm absolute">
        {{ $errors->first($name) }}
    </div>
    @endif
</div>