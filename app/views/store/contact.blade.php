@extends('layout.main')

@section('content')

    <section class="row">
        <h1>Contact Us</h1>

        {{ Form::open(array('url'=>'store/contact')) }}
            {{ Form::label('name') }}
            {{ Form::text('name') }}

            {{ Form::label('email') }}
            {{ Form::text('email') }}

            {{ Form::label('comment') }}
            {{ Form::textarea('comment') }}

            {{ Form::submit('Send', array('class'=>'button')) }}
        {{ Form::close() }}
    </section>

@stop