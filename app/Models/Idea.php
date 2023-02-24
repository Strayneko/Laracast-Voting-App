<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Exceptions\VoteNotFoundException;
use App\Exceptions\DuplicateVoteException;

class Idea extends Model
{
    use HasFactory, Sluggable;

    const PAGINATION_COUNT = 10;

    protected $guarded = ['id'];


    // relation to user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function sluggable(): array
    {
        // generate slug from title with eloquent sluggable
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // relation to category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // relation to comment model
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // relation to status model
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function votes()
    {
        return $this->belongsToMany(User::class, 'votes');
    }

    public function isVotedByUser(?User $user)
    {
        // check if user exists
        if (!$user) return false;

        return Vote::where('user_id', $user->id)
            ->where('idea_id', $this->id)
            ->exists();
    }


    public function vote(User $user)
    {
        if ($this->isVotedByUser($user)) throw new DuplicateVoteException;

        Vote::create([
            'idea_id' => $this->id,
            'user_id' => $user->id,
        ]);
    }

    public function removeVote(User $user)
    {
        $voteToDelete = Vote::where('idea_id', $this->id)
            ->where('user_id', $user->id)
            ->first();

        // check if there is vote available
        if ($voteToDelete) {
            $voteToDelete->delete();
        } else {
            throw new VoteNotFoundException;
        }
    }
}
