<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_count_of_each_status()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open']);
        $statusConsidering = Status::factory()->create(['name' => 'Considering']);
        $statusInProgress = Status::factory()->create(['name' => 'Considering']);
        $statusImplemented = Status::factory()->create(['name' => 'Implemented']);
        $statusClosed = Status::factory()->create(['name' => 'Closed']);

        Idea::factory()->newData()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
        ]);

        Idea::factory(2)->newData()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusConsidering->id,
        ]);


        Idea::factory(3)->newData()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusInProgress->id,
        ]);


        Idea::factory(4)->newData()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusImplemented->id,
        ]);


        Idea::factory(5)->newData()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusClosed->id,
        ]);



        $this->assertEquals(15, Status::getCount()['all_statuses']);
        $this->assertEquals(1, Status::getCount()['open']);
        $this->assertEquals(2, Status::getCount()['considering']);
        $this->assertEquals(3, Status::getCount()['in_progress']);
        $this->assertEquals(4, Status::getCount()['implemented']);
        $this->assertEquals(5, Status::getCount()['closed']);
    }
}
