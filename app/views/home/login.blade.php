<!DOCTYPE html>
<html>

<head>
@include('_includes.head')
</head>

<body>

<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="login-panel panel panel-default">

<div class="panel-heading">
    <h3 class="panel-title">{{ Lang::get('msg.pleaseSignIn') }}</h3>
</div>

<div class="panel-body">
{{ Form::open(array('url' => 'login', 'role' => 'form')) }}
    <fieldset>
    <div class="form-group">
        {{ Form::text('username', Input::old('username'),
            array('class' => 'form-control', 'placeholder' => Lang::get('msg.username'),
            'autofocus' => '')) }}
    </div>
    <div class="form-group">
        {{ Form::password('password',
            array('class' => 'form-control', 'placeholder' => Lang::get('msg.password'))) }}
    </div>
    <!-- <div class="checkbox">
        <label>
            <input name="remember" type="checkbox" value="Remember Me">Remember Me
        </label>
    </div> -->
    {{ Form::submit(Lang::get('msg.login'), array('class' => 'btn btn-lg btn-success btn-block')) }}
    </fieldset>
{{ Form::close() }}
</div>

</div>
</div>
</div>
</div>

@include('_includes.footer')

</body>

</html>
