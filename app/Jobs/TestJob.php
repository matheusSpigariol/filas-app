<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TestJob implements ShouldQueue
{
    use Dispatchable, Queueable, InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private string $message)
    {
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(5);
        info(
            __CLASS__. ': meu processo foi executado...',
            ['message' => $this->message]
        );
    }
}
