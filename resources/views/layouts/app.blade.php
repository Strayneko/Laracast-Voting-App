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
    <main class="container flex max-w-[62.5rem]">
        <div class="w-[17.5rem] mr-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium non quas blanditiis quasi perferendis
            provident pariatur vel itaque aperiam sapiente reiciendis vitae quidem dignissimos tempora natus, hic
            officiis ut ducimus fugiat saepe. Iusto fugit porro labore adipisci voluptate, cum consequuntur distinctio
            suscipit iure ipsam similique repellat molestias natus alias illo. Repellat exercitationem necessitatibus
            suscipit nemo, expedita quisquam? Eaque blanditiis vitae adipisci deserunt cumque assumenda! Nemo,
            praesentium odit quo maxime esse dolorem reiciendis sit obcaecati modi accusamus, aliquam quisquam ipsa
            expedita officia impedit dolores libero dignissimos, laborum eveniet? Fuga, aut, corporis neque ipsum
            aspernatur delectus explicabo placeat obcaecati, temporibus soluta magnam!
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
