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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans bg-gray-background text-gray-900 text-sm">
    <header class="flex items-center justify-between px-8 py-4">
        <a href="">
            <img src="{{ asset('images/logo.svg') }}" alt="Laracast Logo">
        </a>
        <div class="flex items-center">
            @if (Route::has('login'))
                <div class="top-0 right-0 px-6 py-4 ">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="underline" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
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
    <main class="container flex max-w-[68.5rem]">
        <div class="w-[17.5rem] mr-5">
            <div class="border-2 border-theme-blue-primary rounded-xl mt-16 border-gradient">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">
                        Add an idea
                    </h3>
                    <p class="text-xs mt-4">
                        Let us know what you would like and we'll take a look over!
                    </p>
                </div>

                {{-- form --}}
                <form action="" method="POST" class="space-y-4 px-4 py-6">
                    <div>
                        <input type="text"
                            class="w-full bg-gray-100 text-sm border-none rounded-xl placeholder:text-gray-900 px-4 py-2"
                            placeholder="Your idea">
                    </div>

                    <div>
                        <x-filter-dropdown name="category_add" id="category_add" class="bg-gray-100 text-sm">
                            <x-filter-dropdown-item name="a" />
                        </x-filter-dropdown>
                    </div>

                    <div>
                        <textarea name="idea" id="idea" cols="30" rows="4"
                            class="w-full bg-gray-200 rounded-xl border-none placeholder:text-gray-900 text-sm px-4 py-2"
                            placeholder="Describe your idea"></textarea>
                    </div>

                    <div class="flex items-center justify-between space-x-3">
                        <button type="button"
                            class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                            <svg class="text-gray-600 w-4 -rotate-45" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span class="ml-2">Attach</span>
                        </button>

                        <button type="submit"
                            class="flex items-center justify-center w-1/2 h-11 text-xs bg-theme-blue-primary font-semibold rounded-xl border border-theme-blue-primary text-white hover:border-theme-blue-hover hover:bg-theme-blue-hover transition duration-150 ease-in px-6 py-3">
                            <span class="ml-2">Submit</span>
                        </button>


                    </div>
                </form>
                {{-- end of form --}}
            </div>
        </div>
        <div class="w-[43.75rem]">
            <nav class="flex items-center justify-between text-xs">
                <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                    <li><a href="#" class="border-b-4 pb-3 border-theme-blue-primary">All Ideas (87)</a></li>
                    <li><a href="#"
                            class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-theme-blue-primary">Considering
                            (6)</a></li>
                    <li><a href="#"
                            class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-theme-blue-primary">In
                            Progress (1)</a></li>
                </ul>

                <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                    <li><a href="#"
                            class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-theme-blue-primary">Implemented
                            (10)</a></li>
                    <li><a href="#"
                            class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-theme-blue-primary">Closed
                            (55)</a></li>
                </ul>
            </nav>

            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>



    </main>
</body>

</html>
