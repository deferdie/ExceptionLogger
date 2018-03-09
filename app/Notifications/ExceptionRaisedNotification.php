<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class ExceptionRaisedNotification extends Notification
{
    use Queueable;

    public $projectStatusCode;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($projectStatusCode)
    {
        $this->projectStatusCode = $projectStatusCode;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'slack', 'nexmo'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if($this->projectStatusCode->notification->can_email)
        {
            return (new MailMessage)
                ->line('An Exception has been raised')
                ->action('Notification Action', url('/'))
                ->line('Notification Action', url('/'))
                ->line('Thank you for using our application!' . $this->projectStatusCode->code);
        }
        
    }

    public function toSlack($notifiable)
    {
        if($this->projectStatusCode->notification->can_slack)
        {
            return (new SlackMessage)
                ->error()
                ->content('Whoops! Something went wrong.');
        }
    }

    public function toNexmo($notifiable)
    {
        if($this->projectStatusCode->notification->can_sms)
        {
            return (new NexmoMessage)
                ->content('You have an error!!');
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
