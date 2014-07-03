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
<div class="row">
<div class="col-lg-12">
@if (isset($pageHeader))
    <h1 class="page-header">{{{ $pageHeader }}}</h1>
@else
    <p>&nbsp;</p>
@endif
@yield('content')
</div>
</div>
</div> <!-- /#page-wrapper -->

</div> <!-- /#wrapper -->

@include('_includes.footer')
</body>
</html>
