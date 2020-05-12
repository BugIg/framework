<div class="flex flex-col">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block w-full shadow overflow-hidden sm:rounded border-b border-gray-200">
            <table class="w-full">
                <thead class="bg-gray-500">
                    <tr>
                        @foreach($columns as $key => $column)
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                    @if ($isSortable($column) && $sortOrder($column) === 'asc')

                                        <a href="{{ url()->current().'?'. http_build_query(array_merge(request()->all(), ['sort' => [$column['key'] => 'desc']])) }}"
                                           class="flex">
                                            <span>{{ $column['title'] }}</span>
                                            <img class="h-3 w-3 ml-1 text-xs text-gray-100"
                                                 src="{{ asset('vendor/avored/images/icons/arrow-up.svg') }}"
                                            />
                                         </a>
                                    @elseif($isSortable($column) && $sortOrder($column) === 'desc')

                                    <a href="{{ url()->current().'?'. http_build_query(array_merge(request()->all(), ['sort' => [$column['key'] => 'asc']])) }}"
                                       class="flex">
                                        <span>{{ $column['title'] }}</span>
                                        <img class="h-3 w-3 ml-1 text-xs text-gray-100"
                                             src="{{ asset('vendor/avored/images/icons/arrow-down.svg') }}"
                                        />
                                    </a>
                                    @else
                                        {{ $column['title'] }}
                                    @endif

                            </td>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @if ($items->count() <= 0)
                        <tr class="bg-white">
                            <td colspan="{{ count($columns) }}"
                                class="py-24  text-center"
                            >
                                <svg class="h-6 w-6 text-gray-600 inline-block" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                                </svg>
                                {{ __('avored-admin::system.empty_table')}}
                            </td>
                        </tr>
                    @else
                        @foreach($items as $key => $row)
                            <tr class="{{ ($loop->index % 2) ? 'bg-gray-100' : 'bg-white' }}">
                                @foreach($columns as $colId => $col)
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                        @if($col['key'] === 'action')
                                            {!! $action($row, $col) !!}
                                        @else
                                            {{ $value($row, $col) }}
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        @if ($isPaginate)
            {!! $items->render("avored-admin::partials.paginate") !!}
        @endif


    </div>
</div>
