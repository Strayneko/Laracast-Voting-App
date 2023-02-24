<div>
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
            <x-filter-dropdown wire:model='category'>
                <x-filter-dropdown-item value="All Categories" name="All Categories" />
                @foreach ($categories as $category)
                    <x-filter-dropdown-item value="{{ $category->name }}" name="{{ $category->name }}" />
                @endforeach
            </x-filter-dropdown>
        </div>

        <div class="md:w-1/3 w-full">
            <x-filter-dropdown wire:model='filter'>
                <x-filter-dropdown-item value="No Filter" name="No Filter" />
                <x-filter-dropdown-item value="Top Voted" name="Top Voted" />
                <x-filter-dropdown-item value="My Ideas" name="My Ideas" />

                @admin
                    <x-filter-dropdown-item value="Spam Ideas" name="Spam Ideas" />
                @endadmin
                @admin
                    <x-filter-dropdown-item value="Spam Comments" name="Spam Comments" />
                @endadmin
            </x-filter-dropdown>
        </div>

        {{-- search form --}}
        <div class="md:w-2/3 relative w-full">
            <input wire:model="search" type="search" placeholder="Find an idea"
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

        @forelse ($ideas as $idea)
            {{-- idea container --}}
            <livewire:idea-index :key="$idea->id" :idea="$idea" :votesCount="$idea->votes_count" />
            {{-- end of idea container --}}
        @empty
            <div class="mx-auto w-70 mt-12">
                <img src="{{ asset('images/no-ideas.svg') }}" alt="No Ideas" class="mx-auto"
                    style="mix-blend-mode: luminosity">
                <div class="text-gray-400 text-center mt-6 font-bold">No Ideas were found...</div>
            </div>
        @endforelse


    </div>
    {{-- end of ideas container --}}

    {{-- pagination --}}
    <div class="my-8">
        {{ $ideas->links() }}
        {{-- append query string
        {{ $ideas->appends(request()->query())->links() }} --}}
    </div>
    {{-- end of pagination --}}
</div>
