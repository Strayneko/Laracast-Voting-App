<x-app-layout>
    <script>
        window.addEventListener('alpine:init', () => {
            Alpine.data('events', () => ({
                ignores: ['button', 'svg', 'path', 'a'],
                handleClick($e) {
                    const clicked = $e.target;
                    // get element tagname that user clicked on
                    const target = $e.target.tagName.toLowerCase();

                    // check element tagname, if element tagname not available in ignore list
                    // click the idea-link element
                    if (!this.ignores.includes(target)) $e.target.closest(
                            '.idea-container')
                        .querySelector('.idea-link').click()

                }
            }))
        })
    </script>
    {{-- filters --}}
    <div class="filters flex space-y-2 md:space-y-0 md:space-x-6 flex-col md:flex-row">

        <div class="md:w-1/3 w-full">
            <x-filter-dropdown name="percobaan">
                <x-filter-dropdown-item value="Category One" name="Category One" />
                <x-filter-dropdown-item value="Category Two" name="Category Two" />
                <x-filter-dropdown-item value="Category Three" name="Category Three" />
                <x-filter-dropdown-item value="Category Four" name="Category Four" />
            </x-filter-dropdown>
        </div>

        <div class="md:w-1/3 w-full">
            <x-filter-dropdown>
                <x-filter-dropdown-item value="Filter One" name="Filter One" />
                <x-filter-dropdown-item value="Filter Two" name="Filter Two" />
                <x-filter-dropdown-item value="Filter Three" name="Filter Three" />
                <x-filter-dropdown-item value="Filter Four" name="Filter Four" />
            </x-filter-dropdown>
        </div>

        {{-- search form --}}
        <div class="md:w-2/3 relative w-full">
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

        @foreach ($ideas as $idea)
            {{-- idea container --}}
            <div x-data="events" @click="handleClick($event)"
                class="idea-container bg-white rounded-xl flex cursor-pointer transition duration-150 ease-in hover:shadow-card">
                <div class="border-r hidden md:block border-gray-100 px-5 py-8">
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

                <div class="flex flex-1 flex-col md:flex-row px-2 py-6">
                    {{-- avatar --}}
                    <div class="flex-shrink-0 mx-4 md:mx-0">
                        <a href="">
                            <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    {{-- end of avatar --}}

                    <div class="mx-4 w-full flex flex-col justify-between">
                        <h4 class="text-xl font-semibold mt-2 md:mt-0">
                            <a href="{{ route('idea.show', ['idea' => $idea]) }}"
                                class="hover:underline idea-link">{{ $idea->title }}</a>
                        </h4>

                        <div class="text-gray-600 mt-3 line-clamp-3">
                            {{ $idea->description }}
                        </div>

                        <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                                <time>{{ $idea->created_at->diffForHumans() }}</time>
                                <div>&bull;</div>
                                <div>{{ $idea->category->name }}</div>
                                <div>&bull;</div>
                                <div class="text-gray-900">3 Comments</div>
                            </div>


                            <div x-data="{ isOpen: false }" class="flex items-center space-x-2 mt-4 md:mt-0">
                                {{-- status --}}
                                <div
                                    class="{{ $idea->status->classes }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                    {{ $idea->status->name }}
                                </div>
                                {{-- end of status --}}
                                <button @click="isOpen = !isOpen"
                                    class="bg-gray-100 border hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3 relative">
                                    <svg fill="currentColor" width="24" height="6">
                                        <path
                                            d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                            style="color: rgba(163, 163, 163, .5)">
                                    </svg>

                                    {{-- dialog --}}
                                    <ul x-cloak x-show="isOpen" x-transition.origin.top.left
                                        @click.away="isOpen = false" @keydown.escape.window="isOpen = false"
                                        class="absolute w-44 font-semibold bg-white shadow-dialog text-left rounded-xl py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0 ">
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

                            <div class="flex items-center md:hidden mt-4 md:mt-0">
                                <div class="bg-gray-100 text-center rounded-xl h-9 px-4 py-2 pr-8">
                                    <div class="text-sm font-bold leading-none">12</div>
                                    <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                                </div>

                                <button
                                    class="w-20 bg-gray-200 border border-gray-200 font-bold text-xxs uppercase rounded-2xl hover:border-gray-400 transition duration-150 ease-in px-4 py-2 -mx-5">
                                    Vote
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end of idea container --}}
        @endforeach


    </div>
    {{-- end of ideas container --}}

    {{-- pagination --}}
    <div class="my-8">
        {{ $ideas->links() }}
    </div>
    {{-- end of pagination --}}
</x-app-layout>
