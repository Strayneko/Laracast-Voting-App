<div>

    @can('update', $idea)
        {{-- edit idea modal --}}
        <livewire:edit-idea :idea="$idea" />
        {{-- end of edit idea modal --}}
    @endcan

    @can('delete', $idea)
        {{-- delete idea modal --}}
        <livewire:delete-idea :idea="$idea" />
        {{-- end of delete idea modal --}}
    @endcan

    @auth
        <livewire:mark-idea-as-spam :idea="$idea" />
    @endauth

    @admin
        <livewire:mark-idea-as-not-spam :idea="$idea" />
    @endadmin
</div>
