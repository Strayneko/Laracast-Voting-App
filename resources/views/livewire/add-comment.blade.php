<div class="relative" x-data="{ isOpen: false }" @keydown.escape.window="isOpen = false" x-init="Livewire.on('commentWasAdded', () => {
    isOpen = false
})

Livewire.hook('message.processed', (message, component) => {
    {{-- scroll to first element when sue pagination --}}
    if (['gotoPage', 'previousPage', 'nextPage'].includes(message.updateQueue[0].method)) {
        const firstComment = document.querySelector('.comment-container:first-child')
        firstComment.scrollIntoView({ behavior: 'smooth' })
    }
    {{-- get the last element of comment --}}
    if (message.updateQueue[0].payload.event === 'commentWasAdded' && message.component.fingerprint.name == 'idea-comments') {
        const lastComment = document.querySelector('.comment-container:last-child')
        {{-- scroll into the element --}}
        lastComment.scrollIntoView({ behavior: 'smooth' })
        lastComment.classList.add('bg-green-50')
        setTimeout(() => {
            lastComment.classList.remove('bg-green-50')
        }, 5000)
    }
})">

    <button @click="isOpen = !isOpen
    if(isOpen) $nextTick(() => $refs.comment.focus())
    " type="button"
        class="flex items-center w-36 justify-center  h-9 text-xs bg-theme-blue-primary font-semibold rounded-xl border border-theme-blue-primary text-white hover:border-theme-blue-hover hover:bg-theme-blue-hover transition duration-150 ease-in px-6 py-3">
        <span class="">Reply</span>
    </button>

    <div x-cloak x-show="isOpen" x-transition.origin.top.left @click.away="isOpen = false"
        @keydown.escape.window="isOpen = false"
        class="absolute z-10 bg-white  shadow-dialog rounded-xl mt-2 w-64 md:w-[26rem] text-left font-semibold text-sm">

        @auth
            <form action="" wire:submit.prevent='addComment' class="space-y-4 px-4 py-6">
                <div>
                    <textarea x-ref="comment" wire:model='comment' name="post_comment" id="post_comment" cols="30" rows="4"
                        class="w-full md:text-sm text-xs rounded-xl bg-gray-100 md:placeholder:text-gray-900 border-none px-4 py-2"
                        placeholder="Go ahead, don't be shy. Share your thoughs..." required></textarea>

                    @error('comment')
                        <p class="text-theme-red text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center space-y-2 md:space-y-0 md:space-x-3 flex-col md:flex-row">
                    <button type="submit"
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
        @else
            <div class="px-4 py-6">
                <p class="font-normal">Please login or create an account to post comment.</p>
                <div class="flex items-center space-x-3 mt-8">
                    <a href="{{ route('login') }}"
                        class="w-1/2 h-11 text-sm text-center bg-theme-blue-primary text-white font-semibold rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                        Sign Up
                    </a>
                </div>
            </div>
        @endauth
    </div>
</div>
