<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class StatusCode extends Model
{
    use Notifiable;

    protected $fillable = ['project_id', 'code', 'timeToNotify', 'errors'];

    protected $with = ['notification'];

    public function project()
    {
        $this->belongsTo(Project::class);
    }

    public function notification()
    {
        return $this->hasOne(StatusCodeNotification::class);
    }

    public function routeNotificationForMail($notification)
    {
        return $this->notification->email;
    }

    public function routeNotificationForSlack($notification)
    {
        return $this->notification->slack_channel;
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->notification->sms_number;
    }
}
