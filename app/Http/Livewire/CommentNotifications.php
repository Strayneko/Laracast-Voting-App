<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class CommentNotifications extends Component
{

    const NOTIFICATION_TRESHOLD = 20;
    public $notifications;
    public $notificationCount;
    public $isLoading;

    protected $listeners = ['getNotifications'];


    public function getNotifications()
    {
        $this->notifications = auth()
            ->user()
            ->unreadNotifications()
            ->latest()
            ->take(self::NOTIFICATION_TRESHOLD)
            ->get();
        $this->isLoading = false;
    }

    public function getNotificationCount()
    {
        if (auth()->guest()) abort(403);

        $this->notificationCount = auth()->user()->unreadNotifications()->count();

        if ($this->notificationCount > self::NOTIFICATION_TRESHOLD) $this->notificationCount =  self::NOTIFICATION_TRESHOLD . '+';
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->getNotificationCount();
        $this->getNotifications();
    }

    public function markAsRead($notificationId)
    {
        $notification = DatabaseNotification::findOrFail($notificationId);
        $notification->markAsRead();


        $this->scrollToComment($notification);
    }

    public function scrollToComment($notification)
    {
        $idea  = Idea::find($notification->data['idea_id']);
        if (!$idea) return redirect()->route('idea.index')->with('error_message', 'This idea no longer exists');

        $comment = Comment::find($notification->data['comment_id']);

        if (!$comment) return redirect()->route('idea.index')->with('error_message', 'This comment no longer exists');

        $comments = $idea->comments()->pluck('id');
        $indexOfComment = $comments->search($comment->id);
        $page = (int)($indexOfComment / $comment->getPerPage()) + 1;

        return redirect()
            ->route('idea.show', [
                'idea' => $notification->data['idea_slug'],
                'page' => $page,
            ])
            ->with('scrollToComment', $comment->id);
    }

    public function mount()
    {
        $this->notifications = collect([]);
        $this->isLoading = true;
        $this->getNotificationCount();
    }
    public function render()
    {
        return view('livewire.comment-notifications');
    }
}
