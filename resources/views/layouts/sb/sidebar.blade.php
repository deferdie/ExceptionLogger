@auth
<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
    <ul class="nav nav-pills flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{route('realtime')}}"><i class="fa fa-space-shuttle fa-fw"></i> realtime</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('exceptionLog')}}"><i class="fa fa-dashboard fa-fw"></i> Exceptions</a>
      </li>
    </ul>

    <p>
        Projects &amp; Applications
    </p>

    <ul class="nav nav-pills flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{route('projects')}}">Manage projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('createProject')}}">Create project</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('applications')}}">Manage application</a>
      </li>
    </ul>
</nav>
@endauth