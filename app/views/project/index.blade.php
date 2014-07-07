@extends('_layouts.default')

@section('content')
@include('_includes.message')

<table class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <td>ID</td>
            <td>Code</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
@foreach($model as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->code }}</td>
            <td>{{ $value->name }}</td>
            <td>
                <a class="btn btn-small btn-primary" href="{{ URL::to('project/' . $value->id) }}">{{ Lang::get('msg.detail') }}</a>
                <a class="btn btn-small btn-primary" href="{{ URL::to('project/' . $value->id . '/edit') }}">{{ Lang::get('msg.edit') }}</a>
                {{Form::delete('project/' . $value->id)}}
            </td>
        </tr>
@endforeach
    </tbody>
</table>

{{ $model->links() }}

@stop
