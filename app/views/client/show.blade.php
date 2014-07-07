@extends('_layouts.default')

@section('content')
@include('_includes.message')

<div class="jumbotron text-center">
    <h2>{{ $model->name }}</h2>
    <p>
        <strong>Code</strong> {{ $model->code }}<br>
    </p>
</div>

@stop
