<div class="flex flex-col">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
                <thead>
                <tr>

                    <?php
                    //dd($data);
                    ?>
                @foreach($columns as $key => $column)

                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                            {{ $column['title'] }}
                        </td>
{{--                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">--}}
{{--                            Director, Human Resources--}}
{{--                        </td>--}}
{{--                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">--}}
{{--                            bernardlane@example.com--}}
{{--                        </td>--}}
{{--                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">--}}
{{--                            Owner--}}
{{--                        </td>--}}
{{--                        <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">--}}
{{--                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
{{--                        </td>--}}

                @endforeach
                </tr>


                </thead>
                <tbody>
                @foreach($data as $key => $row)
                    <tr class="bg-white">
                        @foreach($columns as $colId => $col)
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                            {{ $value($row, $col) }}
                        </td>
                        @endforeach
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
