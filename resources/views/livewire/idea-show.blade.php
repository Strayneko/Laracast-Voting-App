<div>
    {{-- Be like water. --}}
    {{-- idea container --}}
    <div class="idea-container  mt-4 bg-white rounded-xl flex ">

        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-shrink-0 mx-2">
                <a href="">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>

            <div class="mx-2 md:mx-4 w-full">
                <h4 class="text-xl font-semibold mt-2 md:mt-0">
                    {{ $idea->title }}
                </h4>

                <div class="text-gray-600 mt-3 ">
                    @admin
                        @if ($idea->spam_reports > 0)
                            <div class="text-theme-red mb-2">Spam Reports: {{ $idea->spam_reports }}</div>
                        @endif
                    @endadmin
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
                        <div class="text-gray-900">{{ $idea->comments()->count() }} Comments</div>
                    </div>


                    <div class="flex items-center space-x-2 mt-4 md:mt-0" x-data="{ isOpen: false }">
                        {{-- status --}}
                        <div
                            class="{{ $idea->status->classes }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            {{ $idea->status->name }}</div>
                        {{-- end of status --}}

                        @auth
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
                                    class="absolute  w-44 font-semibold bg-white shadow-dialog text-left rounded-xl py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0 z-10">
                                    @can('update', $idea)
                                        <li>
                                            <a href=""
                                                @click.prevent="isOpen = false, $dispatch('custom-show-edit-modal')"
                                                class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                                Edit Idea
                                            </a>
                                        </li>
                                    @endcan
                                    <li>
                                        <a href=""
                                            @click.prevent="isOpen = false, $dispatch('custom-show-mark-idea-as-spam-modal')"
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                            Mark as Spam
                                        </a>
                                    </li>
                                    @admin
                                        @if ($idea->spam_reports > 0)
                                            <li>
                                                <a href=""
                                                    @click.prevent="isOpen = false, $dispatch('custom-show-mark-idea-as-not-spam-modal')"
                                                    class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                                    Not Spam
                                                </a>
                                            </li>
                                        @endif
                                    @endadmin
                                    <li>
                                        @can('delete', $idea)
                                            <a href=""
                                                @click.prevent="isOpen = false, $dispatch('custom-show-delete-modal')"
                                                class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                                Delete Idea
                                            </a>
                                        @endcan
                                    </li>
                                </ul>
                                {{-- end of dialog --}}
                            </div>
                        @endauth
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
            {{-- comment form --}}
            <livewire:add-comment :idea="$idea" />
            {{-- end of comment form --}}

            @admin
                <livewire:set-status :idea="$idea" />
            @endadmin
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
