<!DOCTYPE html>
<html>

<head>
@include('_includes.head')
</head>

<body>

<div id="wrapper">

<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
@include('_includes.brand')
@include('_includes.top')
@include('_includes.side')
</nav>

<div id="page-wrapper">

@include('_includes.breadcrumb')

<div id="content">

<div class="row page-header-row">
<div class="col-sm-8">
@if (isset($pageHeader))
    <h2 class="page-header">{{{ $pageHeader }}}</h2>
@else
    <p>&nbsp;</p>
@endif
</div>
<div class="col-sm-4 text-right">
@if (isset($create))
<a class="btn btn-small btn-primary" href="{{ URL::to($create) }}">{{ Lang::get('msg.create') }}</a>
@endif
@if (isset($detail))
<a class="btn btn-small btn-primary" href="{{ URL::to($detail) }}">{{ Lang::get('msg.back') }}</a>
@endif
@if (isset($edit))
<a class="btn btn-small btn-primary" href="{{ URL::to($edit) }}">{{ Lang::get('msg.edit') }}</a>
@endif
@if (isset($delete))
{{Form::delete($delete)}}
@endif
</div>
</div>

<div class="row">
<div class="col-sm-12">
@yield('content')
</div>
</div>

</div> <!-- /#content -->
</div> <!-- /#page-wrapper -->

</div> <!-- /#wrapper -->

@include('_includes.footer')
</body>
</html>
