<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div x-data="events" @click="handleClick($event)"
        class="idea-container bg-white rounded-xl flex cursor-pointer transition duration-150 ease-in hover:shadow-card">
        <div class="border-r hidden md:block border-gray-100 px-5 py-8">
            {{-- votes --}}
            <div class="text-center">
                <div class="font-semibold text-2xl @if ($hasVoted) text-theme-blue-primary @endif">
                    {{ $votesCount }}</div>
                <div class="text-gray-500">Vote</div>
            </div>
            {{-- end of votes --}}

            <div class="mt-8">
                @if ($hasVoted)
                    <button wire:click.prevent="vote"
                        class="w-20 bg-theme-blue-primary font-bold text-xxs uppercase rounded-xl px-4 py-3 border  transition duration-150 ease-in hover:bg-theme-blue-hover text-white">
                        Voted
                    </button>
                @else
                    <button wire:click.prevent="vote"
                        class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 border border-gray-200 transition duration-150 ease-in hover:border-gray-400">
                        Vote
                    </button>
                @endif
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
                    @admin
                        @if ($idea->spam_reports > 0)
                            <div class="text-theme-red mb-2">Spam Reports: {{ $idea->spam_reports }}</div>
                        @endif
                    @endadmin
                    {{ $idea->description }}
                </div>

                <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                        <time>{{ $idea->created_at->diffForHumans() }}</time>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">{{ $idea->comments_count }} Comments</div>
                    </div>


                    <div x-data="{ isOpen: false }" class="flex items-center space-x-2 mt-4 md:mt-0">
                        {{-- status --}}
                        <div
                            class="{{ 'status-'.Str::kebab($idea->status->name)}}   text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            {{ $idea->status->name }}
                        </div>
                        {{-- end of status --}}

                    </div>

                    <div class="flex items-center md:hidden mt-4 md:mt-0">
                        <div class="bg-gray-100 text-center rounded-xl h-9 px-4 py-2 pr-8">
                            <div
                                class="text-sm font-bold leading-none @if ($hasVoted) text-theme-blue-primary @endif">
                                {{ $votesCount }}</div>
                            <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                        </div>

                        @if ($hasVoted)
                            <button wire:click.prevent="vote"
                                class="w-20 bg-theme-blue-primary border text-white font-bold text-xxs uppercase rounded-2xl hover:bg-theme-blue-hover transition duration-150 ease-in px-4 py-2 -mx-5">
                                Vote
                            </button>
                        @else
                            <button wire:click.prevent="vote"
                                class="w-20 bg-gray-200 border border-gray-200 font-bold text-xxs uppercase rounded-2xl hover:border-gray-400 transition duration-150 ease-in px-4 py-2 -mx-5">
                                Vote
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
