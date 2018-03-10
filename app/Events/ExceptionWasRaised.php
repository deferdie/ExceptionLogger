<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\ProjectException;

class ExceptionWasRaised implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $exception;
    public $internalExceptionToHandle;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ProjectException $exception)
    {
        // Check if the exception has a unique project exception
        $uniqueCount = ProjectException::where('url', $exception->url)->first();
        
        if($uniqueCount->uniqueException != null)
        {
            $uniqueCount->uniqueException->count = $uniqueCount->uniqueException->count + 1;
            $uniqueCount->uniqueException->save();

            $exception->project_unique_exception_id = $uniqueCount->uniqueException->id;
            $exception->save();
            
        }else{

            // Create a new project exception id
            $uniqueCount->uniqueException()->create([
                'count' => 1
            ]);

            $exception->project_unique_exception_id = $uniqueCount->uniqueException->id;
            $exception->save();
        }

        $this->exception = $exception->makeJson();
        $this->internalExceptionToHandle = $exception->id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('exceptionChannel');
    }
}
