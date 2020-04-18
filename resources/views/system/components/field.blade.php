<div class="sm:grid sm:grid-cols-3 sm:items-start sm:py-5 mt-5 md:mt-0">
    <label for="{{ $for }}" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
        {{ __($label) }}
    </label>
    {{ $slot }}
</div>
