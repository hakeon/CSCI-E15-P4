@extends('_master')

@section('title')
    2dododo log in
@stop

@section('content')
    <div class="container-fluid">
    <h1>log in to 2dododo</h1>

    {{ Form::open(array('url' => '/login')) }}

        <form role="form">
            <div class="form-group">
            {{ Form::label('email') }}<br>
            {{ Form::text('email') }}
            </div>

            <div class="form-group">
            {{ Form::label('password') }}<br>
            {{ Form::password('password') }}<br>
            </div>

                <div class="btn btn-default">
                {{ Form::submit('Submit') }}
                </div>

        {{ Form::close() }}

        </form>
    </div>
@stop