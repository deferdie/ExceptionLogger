<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\StatusCode;

class StatusCodeController extends Controller
{
    public function store(Project $project, Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'timeToNotify' => 'required',
            'errors' => 'required'
        ]);

        $status = $project->statusCodes()->create([
            'code' => $request->code,
            'timeToNotify' => $request->timeToNotify,
            'errors' => $request->errors
        ]);
        
        // Set the notifications
        $status->notification()->create([
            'project_id' => $project->id,
        ]);

        return $project->statusCodes;
    }
    
    
    public function update(Project $project, StatusCode $statusCode ,Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'timeToNotify' => 'required',
            'errors' => 'required'
        ]);

        $statusCode->code = $request->code;
        $statusCode->timeToNotify = (int) $request->timeToNotify;
        $statusCode->errors = (int) $request->errors;
        

        $statusCode->notification->can_email = $request->canEmail;
        $statusCode->notification->can_slack =  $request->canSlack;
        $statusCode->notification->can_sms = $request->canSms;
        $statusCode->notification->email = $request->email;
        $statusCode->notification->slack_channel = $request->slack;
        $statusCode->notification->sms_number = $request->sms;

        $statusCode->save();
        $statusCode->notification->save();

        return $statusCode;
    }
}
