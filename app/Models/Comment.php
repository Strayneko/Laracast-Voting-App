<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $perPage = 25;

    // relation to user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relation to idea model
    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
