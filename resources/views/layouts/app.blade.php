<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laracast Site</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <livewire:styles />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans bg-gray-background text-gray-900 text-sm ">
    <div class="hidden bg-theme-red bg-theme-purple bg-theme-yellow bg-theme-green "></div>
    <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
        <a href="">
            <img src="{{ asset('images/logo.svg') }}" alt="Laracast Logo">
        </a>
        <div class="flex items-center mt-2 md:mt-0">
            @if (Route::has('login'))
            <div class="top-0 right-0 px-6 py-4 ">
                @auth
                <div class="items-center flex space-x-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                            {{ __('Log out') }}
                        </a>
                    </form>

                    <livewire:comment-notifications />
                </div>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
                @endauth
            </div>
            @endif
            <a href="">
                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar"
                    class="w-10 h-10 rounded-full">
            </a>
        </div>
    </header>


    {{-- main --}}
    <main class="container flex max-w-[68.5rem] flex-col md:flex-row">
        <div class="w-[17.5rem] mx-auto md:mr-5 md:mx-1">
            <div class="border-2 md:sticky md:top-8 border-theme-blue-primary rounded-xl mt-16 border-gradient">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">
                        Add an idea
                    </h3>
                    <p class="text-xs mt-4">
                        @auth
                        Let us know what you would like and we'll take a look over!
                        @else
                        Please log in to create an idea.
                        @endauth
                    </p>
                </div>

                @auth
                {{-- form --}}
                <livewire:create-idea />
                {{-- end of form --}}
                @else
                <div class="my-6 text-center space-y-2">
                    <a href="{{ route('login') }}"
                        class="inline-block justify-center w-1/2 h-9 text-xs bg-theme-blue-primary text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-2">Login</a>
                    <a href="{{ route('register') }}"
                        class="inline-block justify-center w-1/2 h-9 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-2">
                        Sign Up
                    </a>
                </div>
                @endauth

            </div>
        </div>
        <div class="w-full px-2 md:px-0 md:w-[43.75rem]">
            <livewire:status-filters />
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>



    </main>

    @if (session()->has('success_message'))
    <x-notification-success :redirect="true" message-to-display="{{ session('success_message') }}" />
    @endif


    {{-- livewire scripts --}}
    <livewire:scripts />
</body>

</html>