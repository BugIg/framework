<div class="flex flex-col">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block w-full shadow overflow-hidden sm:rounded border-b border-gray-200">
            <table class="w-full">
                <thead class="bg-gray-500">
                    <tr>
                        @foreach($columns as $key => $column)
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                {{ $column['title'] }}
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
