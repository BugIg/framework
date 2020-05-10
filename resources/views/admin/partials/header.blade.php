<div class="bg-gray-200 flex w-full pl-1 h-16 shadow-md">
    <button @click="sidebarClick"
            class="md:hidden -ml-0.5 -mt-0.5 h-16 w-12
                inline-flex items-center justify-center rounded-md text-gray-500
                hover:text-gray-700 focus:outline-none focus:bg-gray-200" aria-label="Open sidebar">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <div class="inline-flex ml-5 text-lg font-bold items-center justify-center">
        @yield('pageTitle', 'Dashboard')
    </div>

    <div class="ml-auto mr-6 w-1/3 relative inline-flex items-center justify-end">
        @yield('actions', '')
    </div>

</div>
