
<div class="flex">
    @foreach ($permissions as $group)

        <div class="w-1/3 px-4 py-5 border border-gray-200 sm:px-6 m-2 rounded">
            <h3 class="text-lg leading-6 font-medium border-b pb-3 text-gray-900">
                {{ $group->label() }}
            </h3>
            @foreach ($group->permissionList as $permission)
                <div class="pt-4">
                        <span role="checkbox"
                              tabindex="0"
                              aria-checked="true"
                              class="bg-gray-200 relative inline-block flex-shrink-0 h-6 w-12 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline">
                          <span aria-hidden="true"
                                class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"></span>
                        </span>

                    {{--                        <a-switch--}}
                    {{--                            {{ (isset($role) && $role->hasPermission($permission->routes())) ? 'default-checked' : '' }}--}}
                    {{--                            key="{{ $permission->key() }}"--}}
                    {{--                            v-on:change="onUserPermissionSwitchChange($event, '{{ $permission->key() }}')"--}}
                    {{--                        >--}}
                    {{--                        </a-switch>--}}

                    <input
                        id="permissions-{{ $permission->key() }}"
                        type="hidden"
                        value="{{ (isset($role)) ? $role->hasPermission($permission->routes()) : 0 }}"
                        name="permissions[{{ $permission->routes() }}]"  />
                    {{ $permission->label() }}
                </div>
            @endforeach
        </div>
    @endforeach
</div>
