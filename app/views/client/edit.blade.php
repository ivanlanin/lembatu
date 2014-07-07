@extends('_layouts.default')

@section('content')
{{ HTML::ul($errors->all()) }}

{{ Form::model($model) }}

<div class="form-group">
    {{ Form::label('code', 'Code') }}
    {{ Form::text('code', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

{{ Form::submit(Lang::get('msg.save'), array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
