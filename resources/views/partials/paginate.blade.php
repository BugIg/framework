<div class="bg-white py-3 flex items-center justify-between border-t border-gray-200 sm:pl-1">
    <div class="hidden sm:block">
        <p class="text-sm text-gray-700">
            {!!
                __('avored::system.comms.paginator-info', [
                    'perPage' => $paginator->perPage(),
                    'total' => $paginator->total()
                ])
             !!}

        </p>
    </div>
    <div class="flex-1 flex justify-between sm:justify-end">

        @if ($paginator->onFirstPage())
            <a href="#" class="disabled relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none active:bg-gray-100 active:text-gray-700">
                {{ __('avored::system.comms.previous') }}
            </a>
        @else

            <a href="{{ $paginator->previousPageUrl() }}"
               class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                {{ __('avored::system.comms.previous') }}
            </a>

        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="relative ml-3 inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                {{ __('avored::system.comms.next') }}
            </a>


        @else
            <a
               class="disabled ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                {{ __('avored::system.comms.next') }}
            </a>
        @endif

    </div>
</div>
