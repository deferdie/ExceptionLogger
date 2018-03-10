<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\ProjectException;
use App\Events\ExceptionWasRaised;

class ProcessExceptionFromClient implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $exception;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ProjectException $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Dispatch notification
        broadcast(new ExceptionWasRaised($this->exception));
    }
}
