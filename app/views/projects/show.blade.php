@extends('_layouts.default')

@section('content')
<h1>Showing {{ $project->name }}</h1>

<div class="jumbotron text-center">
    <h2>{{ $project->name }}</h2>
    <p>
        <strong>Code</strong> {{ $project->code }}<br>
    </p>
</div>

@stop
