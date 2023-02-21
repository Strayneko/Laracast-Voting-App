<x-app-layout>
    {{-- back link --}}
    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">All ideas</span>
        </a>
    </div>
    {{-- end of back link --}}

    {{-- idea container --}}
    <div class="idea-container mt-4 bg-white rounded-xl flex ">

        <div class="flex flex-1 px-4 py-6">
            <div class="flex-shrink-0">
                <a href="">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                </a>
            </div>

            <div class="mx-4 w-full">
                <h4 class="text-xl font-semibold">
                    <a href="" class="hover:underline">A random title can go here</a>
                </h4>

                <div class="text-gray-600 mt-3 ">
                    Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae
                    quisquam quas impedit quam provident illo dignissimos nam, consequatur officia modi eligendi odio
                    aperiam dicta cumque deserunt, ab neque voluptatem aspernatur rem magni temporibus beatae mollitia
                    repudiandae pariatur. Atque excepturi recusandae est repellat qui facilis minus? Nesciunt saepe
                    molestiae aut pariatur?
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                        <div class="font-bold text-gray-900">John Doe</div>
                        <div>&bull;</div>
                        <time>10 hours ago</time>
                        <div>&bull;</div>
                        <div>1 Category</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 Comments</div>
                    </div>


                    <div class="flex items-center space-x-2">
                        {{-- status --}}
                        <div
                            class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            Open
                        </div>
                        {{-- end of status --}}
                        <button
                            class="bg-gray-100 border hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3 relative">
                            <svg fill="currentColor" width="24" height="6">
                                <path
                                    d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                    style="color: rgba(163, 163, 163, .5)">
                            </svg>

                            {{-- dialog --}}
                            <ul
                                class="absolute hidden w-44 font-semibold bg-white shadow-dialog text-left rounded-xl py-3 ml-8">
                                <li>
                                    <a href=""
                                        class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                        Mark as spam
                                    </a>
                                </li>
                                <li>
                                    <a href=""
                                        class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                        Delete post
                                    </a>
                                </li>
                            </ul>
                            {{-- end of dialog --}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of idea container --}}


    {{-- buttons container --}}
    <div class="button-container flex items-center justify-between mt-6">
        <div class="flex space-x-4 ml-6 items-center">
            <button type="button"
                class="flex items-center w-36 justify-center  h-9 text-xs bg-theme-blue-primary font-semibold rounded-xl border border-theme-blue-primary text-white hover:border-theme-blue-hover hover:bg-theme-blue-hover transition duration-150 ease-in px-6 py-3">
                <span class="">Reply</span>
            </button>


            <button type="button"
                class="flex items-center justify-center w-1/2 h-9 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                <span class="mr-2">Set Status</span>
                <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </div>

        {{-- votes --}}
        <div class="flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug">12</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>

            <button type="button"
                class="w-32 h-9 text-xs bg-gray-200 font-semibold uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                <span>Vote</span>
            </button>
        </div>
        {{-- end of votes --}}
    </div>
    {{-- end of buttons container --}}

    {{-- comments container --}}
    <div class="comments-container relative space-y-6 ml-[5.5rem] my-8 mt-1 pt-4">
        {{-- comment container --}}
        <div class="comment-container relative mt-4 bg-white rounded-xl flex ">

            <div class="flex flex-1 px-4 py-6">
                <div class="flex-shrink-0">
                    <a href="">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                    </a>
                </div>

                <div class="mx-4 w-full">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">A random title can go here</a>
                    </h4> --}}

                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Officiis adipisci fugiat illum quam esse non ab, totam maiores nam velit?
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <time>10 hours ago</time>

                        </div>


                        <div class="flex items-center space-x-2">
                            <button
                                class="bg-gray-100 border hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3 relative">
                                <svg fill="currentColor" width="24" height="6">
                                    <path
                                        d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                        style="color: rgba(163, 163, 163, .5)">
                                </svg>

                                {{-- dialog --}}
                                <ul
                                    class="absolute hidden w-44 font-semibold bg-white shadow-dialog text-left rounded-xl py-3 ml-8">
                                    <li>
                                        <a href=""
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                            Mark as spam
                                        </a>
                                    </li>
                                    <li>
                                        <a href=""
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                            Delete post
                                        </a>
                                    </li>
                                </ul>
                                {{-- end of dialog --}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of comment container --}}


        {{-- comment container --}}
        <div class="comment-container is-admin relative mt-4 bg-white rounded-xl flex ">

            <div class="flex flex-1 px-4 py-6">
                <div class="flex-shrink-0">
                    <a href="">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                    </a>
                    <span class="text-xxs font-bold text-theme-blue-primary text-center block mt-1">Admin</span>
                </div>

                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">Status changed to "Under Consideration"</a>
                    </h4>

                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Officiis adipisci fugiat illum quam esse non ab, totam maiores nam velit?
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-theme-blue-primary">Andrea</div>
                            <div>&bull;</div>
                            <time>10 hours ago</time>

                        </div>


                        <div class="flex items-center space-x-2">
                            <button
                                class="bg-gray-100 border hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3 relative">
                                <svg fill="currentColor" width="24" height="6">
                                    <path
                                        d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                        style="color: rgba(163, 163, 163, .5)">
                                </svg>

                                {{-- dialog --}}
                                <ul
                                    class="absolute hidden w-44 font-semibold bg-white shadow-dialog text-left rounded-xl py-3 ml-8">
                                    <li>
                                        <a href=""
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                            Mark as spam
                                        </a>
                                    </li>
                                    <li>
                                        <a href=""
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                            Delete post
                                        </a>
                                    </li>
                                </ul>
                                {{-- end of dialog --}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of comment container --}}


        {{-- comment container --}}
        <div class="comment-container relative mt-4 bg-white rounded-xl flex ">

            <div class="flex flex-1 px-4 py-6">
                <div class="flex-shrink-0">
                    <a href="">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                    </a>
                </div>

                <div class="mx-4 w-full">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">A random title can go here</a>
                    </h4> --}}

                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Officiis adipisci fugiat illum quam esse non ab, totam maiores nam velit?
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <time>10 hours ago</time>

                        </div>


                        <div class="flex items-center space-x-2">
                            <button
                                class="bg-gray-100 border hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3 relative">
                                <svg fill="currentColor" width="24" height="6">
                                    <path
                                        d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                        style="color: rgba(163, 163, 163, .5)">
                                </svg>

                                {{-- dialog --}}
                                <ul
                                    class="absolute hidden w-44 font-semibold bg-white shadow-dialog text-left rounded-xl py-3 ml-8">
                                    <li>
                                        <a href=""
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                            Mark as spam
                                        </a>
                                    </li>
                                    <li>
                                        <a href=""
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                            Delete post
                                        </a>
                                    </li>
                                </ul>
                                {{-- end of dialog --}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of comment container --}}

    </div>
    </div>
    {{-- end of comments container --}}
</x-app-layout>
