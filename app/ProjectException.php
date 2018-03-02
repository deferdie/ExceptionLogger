<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
