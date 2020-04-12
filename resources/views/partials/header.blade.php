<header class="flex flex-shrink-0">
    <div class="w-64 flex-shrink-0 px-4 py-3 bg-red-800">
        <button class="block w-ful flex items-center">
            <img
                class="h-8 w-8 rounded-full object-cover"
                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=144&q=80">
            <span class="ml-4 mr-2 text-sm font-medium text-white">{{ $user->full_name }}</span>
            <svg class="ml-auto h-6 w-6 stroke-current text-gray-400" viewBox="0 0 24 24" fill="none">
                <path
                    d="M16 10l-4 4-4-4"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </button>
    </div>
    <div class="flex-1 flex items-center px-6 justify-between bg-red-400">
        <nav class="flex">
            <div href="#" class="ml-2 text-sm px-3 py-2 leading-none
                rounded-lg inline-block font-medium text-white
                bg-red-600">
                Page Title Goes Here
            </div>

        </nav>
        <div class="flex">
{{--            <div class="hidden relative py-1">--}}
{{--                <span class="absolute inset-y-0 left-0 flex items-center pl-2">--}}
{{--                  <svg class="h-5 w-5 fill-current text-gray-500" viewBox="0 0 24 24">--}}
{{--                    <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                          d="M10 2a8 8 0 100 16 8 8 0 000-16zM0 10C0 4.477 4.477 0 10 0s10 4.477 10 10-4.477 10-10 10S0 15.523 0 10z"--}}
{{--                    />--}}
{{--                    <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                          d="M16.293 16.293a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414z" />--}}
{{--                  </svg>--}}
{{--                </span>--}}
{{--                <input class="block pl-10 pr-4 py-2 w-64 bg-gray-900 rounded-lg text-sm placeholder-gray-400 text-white focus:bg-white focus:placeholder-gray-700 focus:text-gray-900 focus:outline-none" placeholder="Search">--}}
{{--            </div>--}}
            <a href="{{ route('admin.dashboard') }}" class="ml-5 text-gray-400 hover:text-gray-200">
                <img class="h-8 w-8 inline-block" src="{{ asset('vendor/avored/images/logo.svg') }}" />
                <span class="inline-block font-semibold text-2xl text-red-900">AvoRed</span>
            </a>

        </div>
    </div>
</header>
