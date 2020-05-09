
<div class="mt-1 sm:mt-0 sm:col-span-2 relative">
    <div class="max-w-lg flex rounded-md shadow-sm">
        <select  id="{{ $name }}"
                name="{{ $name }}"
                class="flex-1 form-select block w-full rounded-r-md sm:text-sm sm:leading-5"
            {{ $attributes }}
        >
            @if(!$optionSlot)
                @foreach($options as $optionValue => $optionLabel)
                    <option
                        @if (is_countable($value))
                            {{ in_array($optionValue, $value) ? 'selected' : ''  }}
                        @else
                            {{ $optionValue === $value ? 'selected' : ''  }}
                        @endif
                        
                        value="{{ $optionValue }}"
                    >
                        {{ $optionLabel }}
                    </option>
                @endforeach
            @else
                {{ $optionSlot }}
            @endif
        </select>

    </div>
    @if($errors->has($name))
        <div class="text-red-500 mt-2 text-sm absolute">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
