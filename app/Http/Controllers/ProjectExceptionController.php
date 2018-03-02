<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectException;
use App\Project;

class ProjectExceptionController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except('store');
	}

    public function index()
    {
    	return view('exception.index');
	}
	
	public function store(Request $request)
    {
		$event = (object) json_decode($request->event_content);
		
		\Log::info(dump($event->server_name));

		$project = Project::whereId($event->project_id)->first();

		$project->exceptions()->create([
			'status_code' => $event->status_code, 
			'url' => $event->url, 
			'message' => $event->message, 
			'headers' => $event->header, 
			'stack_trace' => $event->body, 
			'file' => $event->file, 
			'line_number' =>  $event->lineNumber,
			'request_uri' =>  $event->request_uri,
			'server_name' =>  $event->server_name,
			'enviroment' =>  $event->enviroment,
		]);

		//Dispatch notification
		
    }
}
