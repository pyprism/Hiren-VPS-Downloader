@extends('main')
@section('content')
<div class="row">
    <div class="col-xs-6 col-md-4 col-md-offset-4">
        {{ Form::open(array('url'=>'users/login', 'class'=>'clearfix')) }}
        <h2 class="form-signup-heading">Login</h2>

        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="form-group">
            {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}
        </div>
        <div class="form-group">
            {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
        </div>

        {{ Form::submit('Login', array('class'=>'btn btn-default'))}}
        {{ Form::close() }}
    </div>
</div>
@stop