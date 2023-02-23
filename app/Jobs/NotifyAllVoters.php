<?php

namespace App\Jobs;

use App\Models\Idea;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\IdeaStatusUpdateMailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class NotifyAllVoters implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Idea $idea)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->idea->votes()
            ->select('name', 'email')
            ->chunk(100, function ($voters) {
                foreach ($voters as $user) {
                    Mail::to($user)
                        ->queue(new IdeaStatusUpdateMailable($this->idea));
                }
            });
    }
}
