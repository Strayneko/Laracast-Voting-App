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

                    <div x-data="{ isOpen: false }" class="relative">
                        <button @click="isOpen = !isOpen">
                            <svg class="h-8 w-8 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                            </svg>
                            <div
                                class="absolute rounded-full bg-theme-red text-white text-xxs w-6 h-6 flex justify-center items-center border-2 -top-1 -right-1">
                                8</div>
                        </button>
                        <ul class="absolute inline-block  w-[320px] md:w-96 text-left text-gray-700 text-sm bg-white shadow-dialog rounded-xl max-h-128 overflow-y-auto z-10 -right-32 md:-right-12"
                            {{-- style="right: -46px" --}} x-cloak x-show.transition.origin.top="isOpen"
                            @click.away="isOpen = false" @keydown.escape.window="isOpen = false">
                            <li>
                                <a href="#" @click.prevent="
                                                                                    isOpen = false
                                                                                "
                                    class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-3">
                                    <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                        class="rounded-xl w-10 h-10" alt="avatar">
                                    <div class="ml-4">
                                        <div class="line-clamp-6">
                                            <span class="font-semibold">drehimself</span> commented on
                                            <span class="font-semibold">This is my idea</span>:
                                            <span>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis
                                                ea eum nobis quae!
                                                Explicabo perferendis esse in reiciendis numquam repellat ipsam nam
                                                corporis enim!
                                                Consequuntur repellendus fugit perspiciatis vel ea aut atque quibusdam
                                                fuga laudantium
                                                impedit dignissimos amet quod corrupti, esse labore facere
                                                exercitationem porro provident
                                                voluptates repudiandae iste accusantium quo est dolor. Ipsum alias,
                                                delectus nulla eveniet
                                                est maiores labore beatae temporibus. Voluptatibus fugiat esse aliquam
                                                autem temporibus at
                                                labore, exercitationem qui sit omnis et sapiente perspiciatis aliquid
                                                obcaecati vero minus
                                                architecto quaerat quod porro quas voluptates eos. Fuga nobis neque
                                                debitis consectetur
                                                impedit dolorum accusamus aut vero ducimus."</span>
                                        </div>
                                        <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" @click.prevent="
                                                                                    isOpen = false
                                                                                "
                                    class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-3">
                                    <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                        class="rounded-xl w-10 h-10" alt="avatar">
                                    <div class="ml-4">
                                        <div>
                                            <span class="font-semibold">drehimself</span> commented on
                                            <span class="font-semibold">This is my idea</span>:
                                            <span>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere quos,
                                                eveniet consequatur
                                                aspernatur dolor vitae culpa voluptatem maiores tempore
                                                reprehenderit!"</span>
                                        </div>
                                        <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" @click.prevent="
                                                                                    isOpen = false
                                                                                "
                                    class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-3">
                                    <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                        class="rounded-xl w-10 h-10" alt="avatar">
                                    <div class="ml-4">
                                        <div>
                                            <span class="font-semibold">drehimself</span> commented on
                                            <span class="font-semibold">This is my idea</span>:
                                            <span>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere quos,
                                                eveniet consequatur
                                                aspernatur dolor vitae culpa voluptatem maiores tempore
                                                reprehenderit!"</span>
                                        </div>
                                        <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" @click.prevent="
                                                                                    isOpen = false
                                                                                "
                                    class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-3">
                                    <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                        class="rounded-xl w-10 h-10" alt="avatar">
                                    <div class="ml-4">
                                        <div>
                                            <span class="font-semibold">drehimself</span> commented on
                                            <span class="font-semibold">This is my idea</span>:
                                            <span>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere quos,
                                                eveniet consequatur
                                                aspernatur dolor vitae culpa voluptatem maiores tempore
                                                reprehenderit!"</span>
                                        </div>
                                        <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="border-t border-gray-300 text-center">
                                <button
                                    class="w-full block font-semibold hover:bg-gray-100 transition duration-150 ease-in px-5 py-4">
                                    Mark all as read
                                </button>
                            </li>
                        </ul>
                    </div>
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