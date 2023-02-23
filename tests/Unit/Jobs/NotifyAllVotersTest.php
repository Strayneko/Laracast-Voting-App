<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use App\Models\Category;
use App\Jobs\NotifyAllVoters;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Mail\IdeaStatusUpdateMailable;

class NotifyAllVotersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_sends_an_email_to_all_voters()
    {
        $user = User::factory()->create([
            'email' => 'bayurendi10@gmail.com',
        ]);

        $userB = User::factory()->create([
            'email' => 'bayu@gmail.com',
        ]);

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusConsidering = Status::factory()->create(['id' => 2, 'name' => 'Considering']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusConsidering->id,
            'title' => 'My First Idea',
            'description' => 'Description for my first idea',
        ]);

        Vote::create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
        ]);

        Vote::create([
            'idea_id' => $idea->id,
            'user_id' => $userB->id,
        ]);

        Mail::fake();

        NotifyAllVoters::dispatch($idea);

        Mail::assertQueued(IdeaStatusUpdateMailable::class, function ($mail) {
            return $mail->hasTo('bayurendi10@gmail.com')
                && $mail->build()->subject === 'An idea you voted for has a new status';
        });

        Mail::assertQueued(IdeaStatusUpdateMailable::class, function ($mail) {
            return $mail->hasTo('bayu@gmail.com')
                && $mail->build()->subject === 'An idea you voted for has a new status';
        });
    }
}
