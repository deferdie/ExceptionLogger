<?php

namespace App\Listeners;

use App\Events\ExceptionWasRaised;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ProjectException;
use App\Notifications\ExceptionRaisedNotification;

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
        \Log::info('Handling');

        $exception = ProjectException::whereId($event->internalExceptionToHandle)->first();

        // Assess the error
        $this->assess($exception);
    }

    public function assess(ProjectException $exception)
    {
        \Log::info('assessing');
        \Log::info(json_encode($exception->status_code));

        $projectStatusCode = $exception->project->statusCodes()->where('code', $exception->status_code)->first();

        if(!$projectStatusCode)
        {   
            // We should probally notify the admin that a new status code was detected
            return;
        }

        //Check the amount of time this exception occours in the time defined
        $exceptions = ProjectException::where('url', $exception->url)->recent($projectStatusCode->timeToNotify)->notified(false)->count();

        \Log::info($exception->url);

        if($exceptions >= $projectStatusCode->errors)
        {
            //Set the notification status
            ProjectException::where('url', $exception->url)->recent($projectStatusCode->timeToNotify)->update(['notified'=> true]);

            //Fire the notification email
            //$this->sendNotificationEmail($exception);
            \Log::info('Sending Notificatoin');
            
            // Check if we can notify by email
            $projectStatusCode->notify(new ExceptionRaisedNotification($projectStatusCode));
            
        }
    }
}
