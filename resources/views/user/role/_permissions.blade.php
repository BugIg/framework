
<div class="flex flex-wrap">
    @foreach ($permissions as $group)
        <div class="w-1/3 mt-3">
            <div class="mx-2 border border-gray-200 rounded p-5">
                <h3 class="text-lg leading-6 font-medium border-b pb-3 text-gray-900">
                    {{ $group->label() }}
                </h3>
                @foreach ($group->permissionList as $permission)
                    <x-avored-field
                        :label="$permission->label()"
                    >
                        <avored-toggle
                            checkbox-name="permissions[{{ $permission->routes() }}]"
                            default-value="{{ (isset($role)) ? $role->hasPermission($permission->routes()) : false }}"
                        >
                        </avored-toggle>
                    </x-avored-field>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
