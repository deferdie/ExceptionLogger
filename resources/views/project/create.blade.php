@extends('layouts.app')

@section('content')

    <h2>Create Project</h2>

    <form action="{{route('storeProject')}}" class="form" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="project-name">Project Name</label>
            <input type="text" name="name" id="project-name" placeholder="Enter project name" required class="form-control" />
        </div>
        
        <div class="form-group">
            <label for="SCM">GIT URL</label>
            <input type="text" name="SCM" id="SCM" placeholder="Source control URL" class="form-control" />
        </div>
        
        <div class="form-group">
            <label for="colour">Select Colour</label>
            <input type="color" name="colour" id="colour" placeholder="Select a project colour" class="form-control" />
        </div>
        
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="active" selected>Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" value="Create Project" class="btn btn-block btn-primary">
        </div>
    </form>

@endsection