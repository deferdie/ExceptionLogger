<?php

namespace App\Listeners;

use App\Events\ExceptionWasRaised;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BroadcastExceptionWasRaisedRealTime
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ExceptionWasRaised  $event
     * @return void
     */
    public function handle(ExceptionWasRaised $event)
    {
        //
    }
}
