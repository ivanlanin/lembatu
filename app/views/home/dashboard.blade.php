@extends('_layouts.default')
@section('content')
Welcome {{Auth::user()->username}}!
@stop
