<div>
    {{-- Be like water. --}}
    {{-- idea container --}}
    <div class="idea-container  mt-4 bg-white rounded-xl flex ">

        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-shrink-0 mx-2 md:mx-4">
                <a href="">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>

            <div class="mx-2 md:mx-4 w-full">
                <h4 class="text-xl font-semibold">
                    <a href="" class="hover:underline">{{ $idea->title }}</a>
                </h4>

                <div class="text-gray-600 mt-3 ">
                    {{ $idea->description }}
                </div>

                <div class="flex flex-col md:flex-row  md:items-center justify-between mt-6">
                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                        <div class="font-bold hidden md:block text-gray-900">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <time>{{ $idea->created_at->diffForHumans() }}</time>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 Comments</div>
                    </div>


                    <div class="flex items-center space-x-2 mt-4 md:mt-0" x-data="{ isOpen: false }">
                        {{-- status --}}
                        <div
                            class="{{ $idea->status->classes }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            {{ $idea->status->name }}</div>
                        {{-- end of status --}}
                        <button @click="isOpen = !isOpen"
                            class="bg-gray-100 border hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3 relative">
                            <svg fill="currentColor" width="24" height="6">
                                <path
                                    d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                    style="color: rgba(163, 163, 163, .5)">
                            </svg>

                            {{-- dialog --}}
                            <ul x-cloak x-show="isOpen" x-transition.origin.top.left @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="absolute  w-44 font-semibold bg-white shadow-dialog text-left rounded-xl py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0 z-10">
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

                    {{-- mobile votes --}}
                    <div class="flex items-center md:hidden mt-4 md:mt-0">
                        <div class="bg-gray-100 text-center rounded-xl h-9 px-4 py-2 pr-8">
                            <div
                                class="text-sm font-bold leading-none @if ($hasVoted) text-theme-blue-primary @endif">
                                {{ $votesCount }}</div>
                            <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                        </div>
                        @if ($hasVoted)
                            <button wire:click.prevent="vote"
                                class="w-20 bg-theme-blue-primary font-bold text-xxs uppercase rounded-2xl hover:bg-theme-blue-hover text-white transition duration-150 ease-in px-4 py-2 -mx-5">
                                Voted
                            </button>
                        @else
                            <button wire:click.prevent="vote"
                                class="w-20 bg-gray-200 border border-gray-200 font-bold text-xxs uppercase rounded-2xl hover:border-gray-400 transition duration-150 ease-in px-4 py-2 -mx-5">
                                Vote
                            </button>
                        @endif
                    </div>
                    {{-- end of mobile votes --}}
                </div>
            </div>
        </div>
    </div>
    {{-- end of idea container --}}


    {{-- buttons container --}}
    <div class="button-container flex items-center justify-between mt-6">
        <div class="flex md:space-x-4 md:ml-6 items-center  flex-col md:flex-row ">
            <div class="relative" x-data="{ isOpen: false }">

                <button @click="isOpen = !isOpen" type="button"
                    class="flex items-center w-36 justify-center  h-9 text-xs bg-theme-blue-primary font-semibold rounded-xl border border-theme-blue-primary text-white hover:border-theme-blue-hover hover:bg-theme-blue-hover transition duration-150 ease-in px-6 py-3">
                    <span class="">Reply</span>
                </button>

                <div x-cloak x-show="isOpen" x-transition.origin.top.left @click.away="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                    class="absolute z-10 bg-white shadow-dialog rounded-xl mt-2 w-64 md:w-[26rem] text-left font-semibold text-sm">
                    <form action="" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea name="post_comment" id="post_comment" cols="30" rows="4"
                                class="w-full md:text-sm text-xs rounded-xl bg-gray-100 md:placeholder:text-gray-900 border-none px-4 py-2"
                                placeholder="Go ahead, don't be shy. Share your thoughs..."></textarea>
                        </div>

                        <div class="flex items-center space-y-2 md:space-y-0 md:space-x-3 flex-col md:flex-row">
                            <button type="button"
                                class="flex items-center justify-center h-9 md:w-1/2 w-full md:text-sm text-xs bg-theme-blue-primary text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                                Post Comment
                            </button>

                            <button type="button"
                                class="flex items-center justify-center md:w-1/2 w-full h-9 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                                <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="relative" x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" type="button"
                    class="flex items-center justify-center w-36 flex-shrink-0 h-9 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-2 md:mt-0">
                    <span class="mr-2">Set Status</span>
                    <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-cloak x-show="isOpen" x-transition.origin.top.left @click.away="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                    class="absolute  z-20 bg-white shadow-dialog  rounded-xl mt-2 w-64 md:w-[19rem] text-left font-semibold text-sm">
                    <form action="" class="space-y-4 px-4 py-6">
                        {{-- options --}}
                        <div class="space-y-2">
                            <div>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" class="bg-gray-200 text-gray-600 border-none cursor-pointer"
                                        name="status" value="1" checked>
                                    <span class="ml-2">Open</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio"
                                        class="bg-gray-200 text-theme-purple border-none cursor-pointer"
                                        name="status" value="2">
                                    <span class="ml-2">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio"
                                        class="bg-gray-200 text-theme-yellow border-none cursor-pointer"
                                        name="status" value="3">
                                    <span class="ml-2">In Progress</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio"
                                        class="bg-gray-200 text-theme-green border-none cursor-pointer" name="status"
                                        value="3">
                                    <span class="ml-2">Implemented</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio"
                                        class="bg-gray-200 text-theme-red border-none cursor-pointer" name="status"
                                        value="3">
                                    <span class="ml-2">Closed</span>
                                </label>
                            </div>
                        </div>
                        {{-- end of options --}}

                        <div>
                            <textarea name="update_comment" id="update_comments" cols="30" rows="3"
                                class="w-full text-sm bg-gray-100 rounded-xl placeholder:text-gray-900 border-none px-4 py-2"
                                placeholder="Add an update comment (optional)"></textarea>
                        </div>

                        <div class="flex items-center justify-between space-x-3">
                            <button type="button"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                                <svg class="text-gray-600 w-4 transform -rotate-45" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                            <button type="submit"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-theme-blue-primary text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                                <span class="ml-1">Update</span>
                            </button>
                        </div>

                        <div>
                            <label class="font-normal inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="notify_voters"
                                    class="rounded cursor-pointer bg-gray-200" checked="">
                                <span class="ml-2">Notify all voters</span>
                            </label>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        {{-- votes --}}
        <div class="hidden items-center space-x-3 md:flex">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug @if ($hasVoted) text-theme-blue-primary @endif">
                    {{ $votesCount }}</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>

            @if ($hasVoted)
                <button type="button" wire:click.prevent="vote"
                    class="w-32 h-9 text-xs text-white bg-theme-blue-primary font-semibold uppercase rounded-xl  hover:bg-theme-blue-hover transition duration-150 ease-in px-6 py-3">
                    <span>Voted</span>
                </button>
            @else
                <button type="button" wire:click.prevent="vote"
                    class="w-32 h-9 text-xs bg-gray-200 font-semibold uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                    <span>Vote</span>
                </button>
            @endif
        </div>
        {{-- end of votes --}}
    </div>
    {{-- end of buttons container --}}

</div>
