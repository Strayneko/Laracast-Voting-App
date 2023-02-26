<div>
    @if ($comments->isNotEmpty())
    <div class="comments-container relative space-y-6 md:ml-[5.5rem] my-8 mt-1 pt-4">

        {{-- comment container --}}
        @forelse ($comments as $comment)
        <livewire:idea-comment :key="$comment->id" :comment="$comment" :ideaUserId="$idea->user->id" />
        @endforeach


        {{-- end of comment container --}}
    </div>

    <div class="my-8 md:ml-[5.5rem]">
        {{ $comments->onEachSide(1)->links() }}
    </div>
    @else
    <div class="mx-auto w-70 mt-12">
        <img src="{{ asset('images/no-ideas.svg') }}" alt="No Ideas" class="mx-auto mix-blend-luminosity">
        <div class="text-gray-400 text-center mt-6 font-bold">No Comments yet...</div>
    </div>
    @endif
</div>