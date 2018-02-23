<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$projects = Project::all();

    	return view('project.index', ['projects' => $projects, 'title' => 'Projects']);
    }

    public function show(Project $project)
    {
    	return view('project.show', ['project' => $project]);
    }

    public function create(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:2'
    	]);

    	$project = Project::create([
    		'user_id' => auth()->user()->id,
    		'name' => $request->name,
	        'SCM'  => $request->SCM,
	        'colour'  => $request->colour,
	        'status'  => $request->status,
    	]);

    	return redirect(route('projects'));
    }

    public function update(Project $project, Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:2'
    	]);

    	$project->name = $request->name;
		$project->SCM = $request->SCM;
	    $project->colour = $request->colour;
		$project->status = $request->status;

		$project->save();

    	return redirect(route('showProject', $project));
    }

    public function delete(Project $project)
    {
    	$project->delete();

    	return redirect(route('projects'));
    }
}
