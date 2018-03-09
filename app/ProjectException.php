<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 use  Carbon\Carbon;

class ProjectException extends Model
{
    protected $fillable = [
        'status_code', 
        'url', 
        'message', 
        'headers', 
        'stack_trace', 
        'file', 
        'line_number', 
        'request_uri', 
        'server_name',
        'enviroment', 
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeRecent($query, $interval)
    {
        return $query->where('created_at', '>=', Carbon::now()->subMinute($interval)->toDateTimeString());
    }

    public function scopeNotified($query, $status)
    {
        return $query->where('notified', $status);
    }
}
