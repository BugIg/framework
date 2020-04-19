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
                </tbody>
            </table>
        </div>

        @if ($isPaginate)
            {!! $items->render("avored::partials.paginate") !!}
        @endif


    </div>
</div>
