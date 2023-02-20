<x-app-layout>
    <div class="filters flex space-x-6">

        <x-filter-dropdown name="percobaan">
            <x-filter-dropdown-item value="Category One" name="Category One" />
            <x-filter-dropdown-item value="Category Two" name="Category Two" />
            <x-filter-dropdown-item value="Category Three" name="Category Three" />
            <x-filter-dropdown-item value="Category Four" name="Category Four" />
        </x-filter-dropdown>

        <x-filter-dropdown>
            <x-filter-dropdown-item value="Filter One" name="Filter One" />
            <x-filter-dropdown-item value="Filter Two" name="Filter Two" />
            <x-filter-dropdown-item value="Filter Three" name="Filter Three" />
            <x-filter-dropdown-item value="Filter Four" name="Filter Four" />
        </x-filter-dropdown>

        {{-- search form --}}
        <div class="w-2/3 relative">
            <input type="search" placeholder="Find an idea"
                class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">
            <div class="absolute top-0 flex itmes-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
        {{-- end of search form --}}
    </div>
</x-app-layout>
