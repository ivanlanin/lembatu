@extends('_layouts.default')

@section('content')
{{ Form::open(array('url' => 'project')) }}

<div class="form-group">
    {{ Form::label('code', 'Code') }}
    {{ Form::text('code', Input::old('code'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
</div>

{{ Form::submit(Lang::get('msg.save'), array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
