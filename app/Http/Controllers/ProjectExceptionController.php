<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessExceptionFromClient;
use App\Project;
use App\ProjectException;

class ProjectExceptionController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except('store');
	}

    public function index()
    {
		$exceptions = ProjectException::paginate(15);

    	return view('exception.index', [
			'exceptions' => $exceptions
		]);
	}
	
	public function show(ProjectException $exception)
    {
    	return view('exception.show', [
			'exception' => $exception
		]);
	}
	
	public function store(Request $request)
    {
		$event = (object) json_decode($request->event_content);
		
		$project = Project::whereId($event->project_id)->first();

		try{
			$exception = $project->exceptions()->create([
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
			ProcessExceptionFromClient::dispatch($exception);
			
		}catch(\Exception $e)
		{
			\Log::info($e);
		}
    }
}
