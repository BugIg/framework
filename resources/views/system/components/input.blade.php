
<div class="mt-1 sm:mt-0 sm:col-span-2 relative">
    <div class="max-w-lg flex rounded-md shadow-sm">
        <input  id="{{ $name }}"
                type="{{ $type }}"
                name="{{ $name }}"
                class="flex-1 form-input block w-full rounded-r-md sm:text-sm sm:leading-5 {{ $class }}"
                {{ $attributes }}
        />

    </div>
    @if($errors->has($name))
    <div class="text-red-500 mt-2 text-sm absolute">
        {{ $errors->first($name) }}
    </div>
    @endif
</div>
