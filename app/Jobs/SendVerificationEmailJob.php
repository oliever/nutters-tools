<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendVerificationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $emailAddress;
    public function __construct($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        //throw new Exception();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        info('SendVerificationEmailJob...');
        info($this->emailAddress);
        //throw new Exception();
    }
}
