<!-- Off-canvas menu for mobile -->
<div v-if="sidebar" class="">
    <div @click="sidebarClick" class="fixed inset-0 z-30 transition-opacity ease-linear duration-300">
        <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
    </div>
    <div class="fixed inset-0 flex z-40">
        <div  v-if="sidebar" class="flex-1 flex flex-col max-w-xs w-full relative bg-white">
            <div class="absolute top-0 right-0 -mr-12 p-1">
                <button @click="sidebarClick" class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600" aria-label="Close sidebar">
                    <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                <div class="flex-shrink-0 flex items-center px-4">
                    <img class="h-8 w-auto" src="{{ asset('vendor/avored/images/logo.svg') }}" alt="AvoRed" />
                    <span class="text-xl ml-2">AvoRed</span>
                </div>
                <nav class="mt-5 px-2">
                    @foreach($menus as $menu)
                        @if($menu->hasSubMenu())
                            <h3 class="flex items-center px-2 py-2 text-center leading-6 font-medium text-gray-500 rounded-md focus:outline-none focus:bg-gray-200">
                                <a href="#" 
                                    @click.prevent="sidebarMenuClick('{{ $menu->key() }}')" 
                                    class="px-2 py-3 leading-6 font-medium text-gray-900">
                                    <img
                                        class="mr-4 h-6 w-6 text-gray-100 inline-block"
                                        src="{{ $menu->icon() }}"
                                    />

                                    {{ $menu->label() }}
                                </a>
                            </h3>

                            <div ref="sidebar-menu-{{ $menu->key() }}" class="hidden">
                            @foreach($menu->subMenu($menu->key()) as $subMenu)
                                <a href="{{ route($subMenu->route(), $subMenu->params()) }}" class="mt-3 group flex items-center px-12 py-2 text-sm text-base leading-6 font-light text-gray-900 rounded-md bg-gray-100 focus:outline-none focus:bg-gray-200">
                                    {{ $subMenu->label() }}
                                </a>
                            @endforeach
                            </div>
                        @endif

                    @endforeach
                </nav>
            </div>
            <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                <a href="#" class="flex-shrink-0 group block focus:outline-none">
                    <div class="flex items-center">
                        <div>
                            <img class="inline-block h-10 w-10 rounded-full" 
                                src="{{ $user->getDefaultImage() }}" alt="{{ $user->full_name }}" />
                        </div>
                        <div class="ml-3">
                            <p class="text-base leading-6 font-medium text-gray-700 group-hover:text-gray-900">
                                {{ $user->full_name }}
                            </p>
                            <p class="text-sm leading-5 font-medium text-gray-500 group-hover:text-gray-700 group-focus:underline transition ease-in-out duration-150">
                                View profile
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="flex-shrink-0 w-14">
            <!-- Force sidebar to shrink to fit close icon -->
        </div>
    </div>
</div>

<!-- Static sidebar for desktop -->
<div  class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 border-r border-gray-200 bg-white">
        <div class="h-0 flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex items-center flex-shrink-0 px-4">
                <img class="h-8 w-auto" src="{{ asset('vendor/avored/images/logo.svg') }}" alt="AvoRed" />
                <span class="text-xl ml-2">AvoRed</span>
            </div>
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <nav class="mt-5 flex-1 px-2 bg-white">
                @foreach($menus as $menu)
                    @if($menu->hasSubMenu())
                        <h3 class="flex items-center border-t border-gray-300 focus:outline-none focus:bg-gray-200">
                            <a href="#" 
                                @click.prevent="sidebarMenuClick('{{ $menu->key() }}')" 
                                class="px-2 py-3 leading-6 font-medium text-gray-900">
                                <img
                                    class="mr-4 h-6 w-6 text-gray-100 inline-block"
                                    src="{{ $menu->icon() }}"
                                />
                                {{ $menu->label() }}
                            </a>
                        </h3>
                        <div ref="sidebar-menu-{{ $menu->key() }}" class="hidden">
                            @foreach($menu->subMenu($menu->key()) as $subMenu)
                                <a href="{{ route($subMenu->route(), $subMenu->params()) }}"
                                class="mt-3 group flex items-center px-12 py-2 text-sm text-base leading-6 font-light text-gray-900 rounded-md focus:outline-none focus:bg-gray-200">
                                    {{ $subMenu->label() }}
                                </a>
                            @endforeach
                        </div>
                    @endif

                @endforeach
            </nav>
        </div>
        <div class="flex-shrink-0 flex border-t border-gray-200 p-4">

                <div class="flex items-center">
                    <div>
                    
                        <img class="inline-block h-10 w-10 rounded-full"
                            src="{{ $user->getDefaultImage() }}"
                             alt="{{ $user->full_name }}" />
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium text-gray-700 group-hover:text-gray-900">
                            {{ $user->full_name }}
                        </p>
                        <a onclick="event.preventDefault();
                                document.getElementById('admin-logout-form').submit();"
                               href="{{ route('admin.logout') }}"
                               class="text-xs text-gray-500 group-hover:text-gray-700"
                        >
                            {{ __('avored::system.admin-menus.logout') }}
                        </a>
                        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST"  class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>

        </div>
    </div>
</div>
