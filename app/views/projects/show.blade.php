@extends('_layouts.default')

@section('content')
@include('_includes.message')

<div class="jumbotron text-center">
    <h2>{{ $project->name }}</h2>
    <p>
        <strong>Code</strong> {{ $project->code }}<br>
    </p>
</div>

@stop
