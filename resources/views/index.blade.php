<x-app-layout>
    {{-- filters --}}
    <div class="filters flex space-x-6">

        <div class="w-1/3">
            <x-filter-dropdown name="percobaan">
                <x-filter-dropdown-item value="Category One" name="Category One" />
                <x-filter-dropdown-item value="Category Two" name="Category Two" />
                <x-filter-dropdown-item value="Category Three" name="Category Three" />
                <x-filter-dropdown-item value="Category Four" name="Category Four" />
            </x-filter-dropdown>
        </div>

        <div class="w-1/3">
            <x-filter-dropdown>
                <x-filter-dropdown-item value="Filter One" name="Filter One" />
                <x-filter-dropdown-item value="Filter Two" name="Filter Two" />
                <x-filter-dropdown-item value="Filter Three" name="Filter Three" />
                <x-filter-dropdown-item value="Filter Four" name="Filter Four" />
            </x-filter-dropdown>
        </div>

        {{-- search form --}}
        <div class="w-2/3 relative">
            <input type="search" placeholder="Find an idea"
                class="w-full rounded-xl bg-white border-none placeholder:text-gray-900 px-4 py-2 pl-8">
            <div class="absolute top-0 flex itmes-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
        {{-- end of search form --}}
    </div>
    {{-- end of filters --}}

    {{-- ideas container --}}
    <div class="ideas-container space-y-6 my-6">
        {{-- idea container --}}
        <div
            class="idea-container bg-white rounded-xl flex cursor-pointer transition duration-150 ease-in hover:shadow-card">
            <div class="border-r border-gray-100 px-5 py-8">
                {{-- votes --}}
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Vote</div>
                </div>
                {{-- end of votes --}}

                <div class="mt-8">
                    <button
                        class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 border border-gray-200 transition duration-150 ease-in hover:border-gray-400">
                        Vote
                    </button>
                </div>
            </div>

            <div class="flex flex-1 px-2 py-6">
                <div class="flex-shrink-0">
                    <a href="">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                    </a>
                </div>

                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">A random title can go here</a>
                    </h4>

                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
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
                                    class="absolute w-44 font-semibold bg-white shadow-dialog text-left rounded-xl py-3 ml-8">
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


        {{-- idea container --}}
        <div class="idea-container bg-white rounded-xl flex cursor-pointer hover:shadow-card">
            <div class="border-r border-gray-100 px-5 py-8">
                {{-- votes --}}
                <div class="text-center">
                    <div class="font-semibold text-2xl text-theme-blue-primary">66</div>
                    <div class="text-gray-500">Vote</div>
                </div>
                {{-- end of votes --}}

                <div class="mt-8">
                    <button
                        class="w-20 text-white font-bold text-xxs bg-theme-blue-primary uppercase rounded-xl px-4 py-3 border border-theme-blue-primary transition duration-150 ease-in hover:border-theme-blue-hover">
                        Voted
                    </button>
                </div>
            </div>

            <div class="flex px-2 py-6">
                <a href="" class="flex-shrink-0">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                </a>

                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">A random title can go here</a>
                    </h4>

                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos dolores, ducimus cum ad voluptatum
                        error quibusdam quo, incidunt ullam fuga in quaerat facere saepe blanditiis deleniti quasi
                        dignissimos ab inventore, laudantium dolor doloribus! Doloribus adipisci quae quis est
                        consectetur, aut consequatur sint, maxime eveniet accusamus beatae libero ab deserunt tenetur
                        corporis assumenda ut id placeat quisquam expedita quam quo dolor. Iusto praesentium unde
                        reiciendis autem vitae, exercitationem illum consequuntur. Labore sequi blanditiis velit
                        possimus itaque consectetur dignissimos illum non accusamus? Cupiditate enim natus delectus quia
                        voluptatibus, officia sequi repellat dolorum eos tenetur vero suscipit, accusamus similique
                        harum blanditiis dolore veritatis?
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <time>10 hours ago</time>
                            <div>&bull;</div>
                            <time>1 Category</time>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>


                        <div class="flex items-center space-x-2">
                            {{-- status --}}
                            <div
                                class="bg-theme-yellow text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                In progress
                            </div>
                            {{-- end of status --}}
                            <button
                                class="bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3 relative">
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


        {{-- idea container --}}
        <div class="idea-container bg-white rounded-xl flex cursor-pointer hover:shadow-card">
            <div class="border-r border-gray-100 px-5 py-8">
                {{-- votes --}}
                <div class="text-center">
                    <div class="font-semibold text-2xl">0</div>
                    <div class="text-gray-500">Vote</div>
                </div>
                {{-- end of votes --}}

                <div class="mt-8">
                    <button
                        class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 border border-gray-200 transition duration-150 ease-in hover:border-gray-400">
                        Vote
                    </button>
                </div>
            </div>

            <div class="flex px-2 py-6">
                <a href="" class="flex-shrink-0">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                </a>

                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">A random title can go here</a>
                    </h4>

                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos dolores, ducimus cum ad voluptatum
                        error quibusdam quo, incidunt ullam fuga in quaerat facere saepe blanditiis deleniti quasi
                        dignissimos ab inventore, laudantium dolor doloribus! Doloribus adipisci quae quis est
                        consectetur, aut consequatur sint, maxime eveniet accusamus beatae libero ab deserunt tenetur
                        corporis assumenda ut id placeat quisquam expedita quam quo dolor. Iusto praesentium unde
                        reiciendis autem vitae, exercitationem illum consequuntur. Labore sequi blanditiis velit
                        possimus itaque consectetur dignissimos illum non accusamus? Cupiditate enim natus delectus quia
                        voluptatibus, officia sequi repellat dolorum eos tenetur vero suscipit, accusamus similique
                        harum blanditiis dolore veritatis?
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <time>10 hours ago</time>
                            <div>&bull;</div>
                            <time>1 Category</time>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>


                        <div class="flex items-center space-x-2">
                            {{-- status --}}
                            <div
                                class="bg-theme-red text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                Closed
                            </div>
                            {{-- end of status --}}
                            <button
                                class="bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3 relative">
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



        {{-- idea container --}}
        <div class="idea-container bg-white rounded-xl flex cursor-pointer hover:shadow-card">
            <div class="border-r border-gray-100 px-5 py-8">
                {{-- votes --}}
                <div class="text-center">
                    <div class="font-semibold text-2xl">100</div>
                    <div class="text-gray-500">Vote</div>
                </div>
                {{-- end of votes --}}

                <div class="mt-8">
                    <button
                        class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 border border-gray-200 transition duration-150 ease-in hover:border-gray-400">
                        Vote
                    </button>
                </div>
            </div>

            <div class="flex px-2 py-6">
                <a href="" class="flex-shrink-0">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                </a>

                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">A random title can go here</a>
                    </h4>

                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos dolores, ducimus cum ad voluptatum
                        error quibusdam quo, incidunt ullam fuga in quaerat facere saepe blanditiis deleniti quasi
                        dignissimos ab inventore, laudantium dolor doloribus! Doloribus adipisci quae quis est
                        consectetur, aut consequatur sint, maxime eveniet accusamus beatae libero ab deserunt tenetur
                        corporis assumenda ut id placeat quisquam expedita quam quo dolor. Iusto praesentium unde
                        reiciendis autem vitae, exercitationem illum consequuntur. Labore sequi blanditiis velit
                        possimus itaque consectetur dignissimos illum non accusamus? Cupiditate enim natus delectus quia
                        voluptatibus, officia sequi repellat dolorum eos tenetur vero suscipit, accusamus similique
                        harum blanditiis dolore veritatis?
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <time>10 hours ago</time>
                            <div>&bull;</div>
                            <time>1 Category</time>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>


                        <div class="flex items-center space-x-2">
                            {{-- status --}}
                            <div
                                class="bg-theme-green text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                Implemented
                            </div>
                            {{-- end of status --}}
                            <button
                                class="bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3 relative">
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



        {{-- idea container --}}
        <div class="idea-container bg-white rounded-xl flex cursor-pointer hover:shadow-card">
            <div class="border-r border-gray-100 px-5 py-8">
                {{-- votes --}}
                <div class="text-center">
                    <div class="font-semibold text-2xl">2</div>
                    <div class="text-gray-500">Vote</div>
                </div>
                {{-- end of votes --}}

                <div class="mt-8">
                    <button
                        class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 border border-gray-200 transition duration-150 ease-in hover:border-gray-400">
                        Vote
                    </button>
                </div>
            </div>

            <div class="flex px-2 py-6">
                <a href="" class="flex-shrink-0">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                </a>

                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">A random title can go here</a>
                    </h4>

                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos dolores, ducimus cum ad voluptatum
                        error quibusdam quo, incidunt ullam fuga in quaerat facere saepe blanditiis deleniti quasi
                        dignissimos ab inventore, laudantium dolor doloribus! Doloribus adipisci quae quis est
                        consectetur, aut consequatur sint, maxime eveniet accusamus beatae libero ab deserunt tenetur
                        corporis assumenda ut id placeat quisquam expedita quam quo dolor. Iusto praesentium unde
                        reiciendis autem vitae, exercitationem illum consequuntur. Labore sequi blanditiis velit
                        possimus itaque consectetur dignissimos illum non accusamus? Cupiditate enim natus delectus quia
                        voluptatibus, officia sequi repellat dolorum eos tenetur vero suscipit, accusamus similique
                        harum blanditiis dolore veritatis?
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <time>10 hours ago</time>
                            <div>&bull;</div>
                            <time>1 Category</time>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>


                        <div class="flex items-center space-x-2">
                            {{-- status --}}
                            <div
                                class="bg-theme-purple text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                Considering
                            </div>
                            {{-- end of status --}}
                            <button
                                class="bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3 relative">
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



    </div>
    {{-- end of ideas container --}}

</x-app-layout>
