<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Idea extends Model
{
    use HasFactory, Sluggable;

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
}
