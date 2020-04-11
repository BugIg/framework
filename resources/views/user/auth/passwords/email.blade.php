<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('meta_title', 'AvoRed E commerce')</title>

    <script defer src="{{ asset('vendor/avored/js/app.js') }}"></script>
    <link href="{{ asset('vendor/avored/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <login-fields inline-template>
        <div>
            <div class="min-h-screen flex items-center justify-center bg-white py-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-md w-full">
                    <div>
                        <a href="https://avored.com" target="_blank">
                            <img class="mx-auto h-12 w-auto"
                                 src="{{ asset('vendor/avored/images/logo.svg') }}"
                                 alt="AvoRed Ecommerce" />
                        </a>
                        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                            {{ __('avored::user.auth.reset.title') }}
                        </h2>
                        <p class="mt-2 text-center text-sm leading-5 text-gray-600 max-w">
                        </p>
                    </div>
                    <div class="">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('admin.password.email') }}">
                        @csrf()
                        <input type="hidden" name="remember" value="true" />
                        <div class="rounded-md shadow-sm">
                            <div class="mt-3">
                                <a-input
                                    name="email"
                                    v-model="emailAddress"
                                    :autofocus="true"
                                    :required="true"
                                    :errors="{{ $errors }}"
                                    class="placeholder-gray-500"
                                    type="email"
                                    placeholder="{{ __('avored::user.auth.login.email') }}"
                                ></a-input>

                            </div>
                        </div>
                        <div class="mt-6">
                            <button
                                type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out"
                            >
                            <span class="absolute left-0 inset-y pl-3">
                                <svg
                                    class="h-5 w-5 text-red-500 group-hover:text-red-400 transition ease-in-out duration-150"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                          clip-rule="evenodd"
                                    />
                                </svg>
                            </span>
                                {{ __('avored::user.auth.reset.reset-btn') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </login-fields>
</div>
@stack('scripts')
</body>
</html>
