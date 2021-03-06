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
                <a class="btn btn-small btn-primary" href="{{ URL::to('client/show/' . $value->id) }}">{{ Lang::get('msg.detail') }}</a>
                <a class="btn btn-small btn-primary" href="{{ URL::to('client/edit/' . $value->id) }}">{{ Lang::get('msg.edit') }}</a>
                <a class="btn btn-small btn-danger" href="{{ URL::to('client/delete/' . $value->id) }}">{{ Lang::get('msg.delete') }}</a>
            </td>
        </tr>
@endforeach
    </tbody>
</table>

{{ $model->links() }}

@stop
