<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#realtime"><i class="fa fa-dashboard fa-fw"></i> Realtime</a>
            </li>

            <li>
                <a href="{{route('dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Projects &amp; Applications<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('projects')}}">Manage projects</a>
                    </li>
                    
                    <li>
                        <a href="{{route('createProject')}}">Create project</a>
                    </li>

                    <li>
                        <a href="{{route('applications')}}">Manage application</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->       
</nav>
