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

    public static function getCount()
    {
        // get status count
        return Idea::query()
            ->selectRaw("count(*) as all_statuses")
            ->selectRaw("count(case when status_id = 1 then 1 end) as open")
            ->selectRaw("count(case when status_id = 2 then 1 end) as considering")
            ->selectRaw("count(case when status_id = 3 then 1 end) as in_progress")
            ->selectRaw("count(case when status_id = 4 then 1 end) as implemented")
            ->selectRaw("count(case when status_id = 5 then 1 end) as closed")
            ->first()
            ->toArray();
    }
}
