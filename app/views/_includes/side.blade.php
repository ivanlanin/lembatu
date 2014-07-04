
<div class="navbar-default navbar-static-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav" id="side-menu">
    <!-- @include('_includes.side.search') -->
    <li><a href="{{ URL::to('/') }}"><i class="fa fa-home fa-fw"></i> {{ Lang::get('msg.home') }}</a></li>
    <li><a href="#"><i class="fa fa-wrench fa-fw"></i> {{ Lang::get('msg.setup') }}</a></li>
    <li class="active">
    <a href="#"><i class="fa fa-table fa-fw"></i> {{ Lang::get('msg.manage') }}<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="{{ URL::to('projects') }}">{{ Lang::get('msg.projects') }}</a></li>
    </ul>
    </li>
    <li><a href="#"><span class="glyphicon glyphicon-stats fa-fw"></span> {{ Lang::get('msg.report') }}</a></li>
    </ul> <!-- /#side-menu -->
</div> <!-- /.sidebar-collapse -->
</div>
