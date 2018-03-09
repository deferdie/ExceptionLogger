<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

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

        return $project->statusCodes;
    }
}
