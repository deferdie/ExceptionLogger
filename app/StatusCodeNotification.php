<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusCodeNotification extends Model
{
    protected $fillable = ['project_id', 'status_code_id', 'can_email', 'email', 'can_slack', 'slack_channel', 'can_sms', 'sms_number'];

    public function statusCode()
    {
        return $this->belongsTo(StatusCode::class);
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
