<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Notifiable;

    protected $fillable = ['name', 'SCM', 'colour', 'status', 'user_id'];

    public function exceptions()
    {
        return $this->hasMany(ProjectException::class);
    }

    public function statusCodes()
    {
        return $this->hasMany(StatusCode::class);
    }

    public function routeNotificationForMail($notification)
    {
        return 'deferdie@gmail.com';
    }
}
