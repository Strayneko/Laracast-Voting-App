<nav class="items-center justify-between text-xs hidden md:flex">
    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li>
            <a wire:click.prevent="setStatus('All')" href="#"
                class="border-b-4 pb-3 hover:border-theme-blue-primary text-gray-400  @if ($status === 'All') border-theme-blue-primary text-gray-900 @endif">All
                Ideas ({{ $status_count['all_statuses'] }})</a>
        </li>
        <li>
            <a wire:click.prevent="setStatus('Considering')" href="#"
                class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-theme-blue-primary @if ($status === 'Considering') border-theme-blue-primary text-gray-900 @endif">Considering
                ({{ $status_count['considering'] }})
            </a>
        </li>
        <li><a wire:click.prevent="setStatus('In Progress')" href="#"
                class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-theme-blue-primary @if ($status === 'In Progress') border-theme-blue-primary text-gray-900 @endif">In
                Progress ({{ $status_count['in_progress'] }})</a></li>
    </ul>

    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li>
            <a wire:click.prevent="setStatus('Implemented')" href="#"
                class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-theme-blue-primary @if ($status === 'Implemented') border-theme-blue-primary text-gray-900 @endif">Implemented
                ({{ $status_count['implemented'] }})
            </a>
        </li>
        <li>
            <a wire:click.prevent="setStatus('Closed')" href="#"
                class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-theme-blue-primary @if ($status === 'Closed') border-theme-blue-primary text-gray-900 @endif">Closed
                ({{ $status_count['closed'] }})
            </a>
        </li>
    </ul>
</nav>
