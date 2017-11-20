@extends('layout.admin')

@section('content')
    <h1>Amend Navigation Links</h1>



        <div class="large-8">

            @foreach($content as $con)
            {{ Form::open(array('url' => 'admin/amendnavigation')) }}
            <div class="row ">
                <div class="large-4 columns">
                    {{ Form::text('name',$con->name) }}
                    {{ Form::hidden('id',$con->id) }}
                </div>
                <div class="large-4 columns">
                    {{ Form::text('url',$con->url) }}
                    {{ Form::hidden('id',$con->id) }}
                </div>
                <div class="large-1 columns">
                    <button class="button success tiny " type="submit"><i class="fa fa-check"></i></button>
                </div>
                {{ Form::close() }}

                {{ Form::open(array('url' => 'admin/destroynavigation')) }}
                <div class="large-1 columns">
                    <button class="button alert tiny " type="submit"><i class="fa fa-trash"></i></button>
                    {{ Form::hidden('id',$con->id) }}
                </div>
                {{ Form::close() }}
            </div>

            @endforeach
        </div>

        <hr>

        @if($errors->has())
            <div class="alert-box alert" data-alert>
                <p>Following errors have occurred</p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <a href="#" class="close">&times;</a>
            </div>
        @endif


    {{ Form::open(array('url' => 'admin/createnavigation')) }}


        <div class="large-4 columns">
         {{ Form::label('name') }}
            {{ Form::text('name') }}
        </div>

        <div class="large-4 columns end">
        {{ Form::label('url') }}
            {{ Form::text('url') }}
        </div>


        {{ Form::submit('Create Link',array('class'=>'button small')) }}

    {{ Form::close() }}



@stop