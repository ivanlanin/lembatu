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

<!-- Core Scripts - Include with every page -->
<script src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

<!-- Page-Level Plugin Scripts - Blank -->

<!-- SB Admin Scripts - Include with every page -->
<script src="{{ URL::asset('js/sb-admin.js') }}"></script>

<!-- Page-Level Demo Scripts - Blank - Use for reference -->

</body>

</html>
