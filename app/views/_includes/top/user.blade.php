
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li><a href="#"><i class="fa fa-user fa-fw"></i> {{ Lang::get('msg.userProfile') }}</a></li>
        <li><a href="#"><i class="fa fa-gear fa-fw"></i> {{ Lang::get('msg.settings') }}</a></li>
        <li class="divider"></li>
        <li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out fa-fw"></i> {{ Lang::get('msg.logout') }}</a></li>
    </ul>
</li>
