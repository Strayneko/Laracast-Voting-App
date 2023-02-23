<x-app-layout>
    {{-- back link --}}
    <div>
        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">All ideas or back to chosen category and filters</span>
        </a>
    </div>
    {{-- end of back link --}}

    {{-- idea container and button container --}}
    <livewire:idea-show :idea="$idea" :votesCount="$votesCount" />
    {{-- end ofidea container and button container --}}

    {{-- messages --}}
    <x-notification-success />
    {{-- end of messages --}}

    <x-modals-container :idea="$idea" />

    {{-- comments container --}}
    <div class="comments-container relative space-y-6 md:ml-[5.5rem] my-8 mt-1 pt-4">

        {{-- comment container --}}
        <div class="comment-container relative mt-4 bg-white rounded-xl flex ">

            <div class="flex flex-1 flex-col md:flex-row px-4  py-6">
                <div class="flex-shrink-0">
                    <a href="">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                    </a>
                </div>

                <div class="md:mx-4 w-full">
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


                        <div class="flex items-center space-x-2" x-data="{ isOpen: false }">
                            <div class="relative">
                                <button @click="isOpen = !isOpen"
                                    class="bg-gray-100 border hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3 relative">
                                    <svg fill="currentColor" width="24" height="6">
                                        <path
                                            d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                            style="color: rgba(163, 163, 163, .5)">
                                    </svg>

                                </button>

                                {{-- dialog --}}
                                <ul x-cloak x-show="isOpen" x-transition.origin.top.left @click.away="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    class="absolute z-10 w-44 font-semibold bg-white shadow-dialog text-left rounded-xl py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0">
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
                            </div>
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
