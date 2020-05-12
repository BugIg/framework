  <nav class="bg-red-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="{{ asset('vendor/avored/images/logo.svg') }}" alt="Workflow logo" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline">
              
              
            </div>
          </div>
        </div>
        <div class="hidden md:block">
            @foreach ($menus as $menu)
                <a href="{{ route($menu['route'], $menu['params']) }}" 
                  class="px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:text-white focus:bg-red-700">
                  {{ $menu['name'] }}
                </a>
            @endforeach
        </div>

        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button class="inline-flex items-center justify-center p-2 rounded-md text-red-400 hover:text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 focus:text-white">
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!--
      Mobile menu, toggle classes based on menu state.

      Open: "block", closed: "hidden"
    -->
    <div class="hidden md:hidden">
      <div class="px-2 pt-2 pb-3 sm:px-3">
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-red-900 focus:outline-none focus:text-white focus:bg-red-700">Dashboard</a>
        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-red-300 hover:text-white hover:bg-red-700 focus:outline-none focus:text-white focus:bg-red-700">Team</a>
        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-red-300 hover:text-white hover:bg-red-700 focus:outline-none focus:text-white focus:bg-red-700">Projects</a>
        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-red-300 hover:text-white hover:bg-red-700 focus:outline-none focus:text-white focus:bg-red-700">Calendar</a>
        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-red-300 hover:text-white hover:bg-red-700 focus:outline-none focus:text-white focus:bg-red-700">Reports</a>
      </div>
      <div class="pt-4 pb-3 border-t border-red-700">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="https://placehold.it/100x100" alt="" />
          </div>
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">Tom Cook</div>
            <div class="mt-1 text-sm font-medium leading-none text-red-400">foo@bar.com</div>
          </div>
        </div>
        <div class="mt-3 px-2">
          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-red-400 hover:text-white hover:bg-red-700 focus:outline-none focus:text-white focus:bg-red-700">Your Profile</a>
          <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-red-400 hover:text-white hover:bg-red-700 focus:outline-none focus:text-white focus:bg-red-700">Settings</a>
          <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-red-400 hover:text-white hover:bg-red-700 focus:outline-none focus:text-white focus:bg-red-700">Sign out</a>
        </div>
      </div>
    </div>
  </nav>