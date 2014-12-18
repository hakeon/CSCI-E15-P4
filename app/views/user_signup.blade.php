@extends('_master')

@section('title')
    2dododo sign up
@stop

@section('content')
    <div class="container-fluid">
    <h1>sign up for 2dododo</h1>

    @foreach($errors->all() as $message)
        <div class='error'>{{ $message }}</div>
    @endforeach


        {{ Form::open(array('url' => '/signup')) }}

        <form role="form">

            <div class="form-group">
                {{ Form::label('username') }}<br>
                {{ Form::text('username') }}
            </div>

            <div class="form-group">
                {{ Form::label('email') }}<br>
                {{ Form::text('email') }}
            </div>

            <div class="form-group">
                {{ Form::label('password') }}<br>
                {{ Form::password('password') }}
                <small>Min 6 characters</small>
            </div>

            <div class="btn btn-default">
                {{ Form::submit('Submit') }}
            </div>

        {{ Form::close() }}
    </form>
    </div>
@stop