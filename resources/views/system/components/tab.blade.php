<div class="pb-5 pt-5 border-b border-gray-200">
    <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{ $tab->label() }}
        </h3>
        <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
            {!! $tab->description() !!}
        </p>
    </div>
    <div class="mt-6 sm:mt-5 border-t border-gray-200 pt-5">
        {{ $slot }}
    </div>
</div>
