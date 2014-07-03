
<div class="navbar-default navbar-static-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav" id="side-menu">
    <!-- @include('_includes.side.search') -->
    <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard fa-fw"></i> {{ Lang::get('msg.dashboard') }}</a></li>
    <li class="active">
    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> {{ Lang::get('msg.manage') }}<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="{{ URL::to('projects') }}">{{ Lang::get('msg.projects') }}</a></li>
    </ul>
    </li>
    </ul> <!-- /#side-menu -->
</div> <!-- /.sidebar-collapse -->
</div>
