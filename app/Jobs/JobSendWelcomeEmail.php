<?php

namespace App\Jobs;

use App\Mail\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class JobSendWelcomeEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private $userId)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = User::find($this->userId);
        Mail::to($user->email)->later(now()->addMinute(), new SendWelcomeEmail(($user)));
    }
}
