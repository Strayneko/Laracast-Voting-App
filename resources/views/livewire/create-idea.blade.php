<div>
    <form wire:submit.prevent='createIdea' action="#" method="POST" class="space-y-4 px-4 py-6">
        <div>
            <input type="text" wire:model.defer="title"
                class="w-full bg-gray-100 text-sm border-none rounded-xl placeholder:text-gray-900 px-4 py-2"
                placeholder="Your idea" required>

            @error('title')
                <p class="text-theme-red text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <x-filter-dropdown name="category_add" id="category_add" class="bg-gray-100 text-sm"
                wire:model.defer='category'>
                @foreach ($categories as $category)
                    <x-filter-dropdown-item name="{{ $category->name }}" value="{{ $category->id }}" required />
                @endforeach
            </x-filter-dropdown>

            @error('category')
                <p class="text-theme-red text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <textarea name="idea" id="idea" cols="30" rows="4" wire:model.defer='description'
                class="w-full bg-gray-200 rounded-xl border-none placeholder:text-gray-900 text-sm px-4 py-2"
                placeholder="Describe your idea" required></textarea>

            @error('description')
                <p class="text-theme-red text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between space-x-3">
            <button type="button"
                class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                <svg class="text-gray-600 w-4 -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                </svg>
                <span class="ml-2">Attach</span>
            </button>

            <button type="submit"
                class="flex items-center justify-center w-1/2 h-11 text-xs bg-theme-blue-primary font-semibold rounded-xl border border-theme-blue-primary text-white hover:border-theme-blue-hover hover:bg-theme-blue-hover transition duration-150 ease-in px-6 py-3">
                <span class="ml-2">Submit</span>
            </button>


        </div>
        <div>
            @if (session()->has('success_message'))
                <div x-data="{ isVisible: true }" x-init="setTimeout(() => {
                    isVisible = false
                }, 2000)" x-show="isVisible" x-transition
                    class="text-theme-green mt-4">
                    {{ session()->get('success_message') }}
                </div>
            @endif
        </div>
    </form>
</div>
