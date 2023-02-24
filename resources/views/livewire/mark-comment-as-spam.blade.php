<x-modal-confirm 
    livewire-event-to-open-modal="markSpamCommentWasSet"
    event-to-close-modal="commentWasMarkedAsSpam"
    modal-title="Mark Comment as Spam"
    modal-description="Are you sure you want mark this comment as spam."
    modal-confirm-button-text="Mark as spam" wire-click="markAsSpam" />
