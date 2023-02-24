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
    <livewire:idea-comments :idea="$idea" />
    {{-- end of comment container --}}






    {{-- end of comments container --}}
</x-app-layout>
