<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;


    // relation to idea model
    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    // get status style classes
    // public function getStatusClasses()
    // {
    //     // 1. Open
    //     // 2. Considering
    //     // 3. In Progress
    //     // 4. Implemented
    //     // 5. Closed

    //     $classes = [
    //         1 => 'bg-gray-200',
    //         2 => 'bg-theme-purple text-white',
    //         3 => 'bg-theme-yellow text-white',
    //         4 => 'bg-theme-green text-white',
    //         5 => 'bg-theme-red text-white',
    //     ];

    //     return $classes[$this->id] ?? 'bg-gray-200';
    // }
}
