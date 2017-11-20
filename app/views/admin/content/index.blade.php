@extends('layout.admin')

@section('content')
    <div class="large-6 columns">
        <h1>View all pages </h1>
    </div>
    <div class="large-3 columns end">
        <a href="#" class="button small info" data-reveal-id="create">Create new page</a>
    </div>

    <hr>

    @foreach($content as $con)
        <div class="large-7">
            <div class="large-8 columns">
                {{ $con->name }}
            </div>
            <div class="large-2 columns">
                 {{ HTML::link('admin/content/amend/'.$con->url,'Edit',array('class'=>'button tiny success')) }}
            </div>

            <div class="large-2 columns end">
                 {{ Form::open(array('url' => 'admin/destroycontent')) }}
                     <div class="large-1 columns">
                         <button class="button alert tiny " type="submit"><i class="fa fa-trash"></i></button>
                         {{ Form::hidden('id',$con->id) }}
                     </div>
                 {{ Form::close() }}
            </div>
        </div>


    @endforeach




    <div id="create" class="reveal-modal" data-reveal>
    <a class="close-reveal-modal">&#215;</a>
        <h2>Create new page</h2>

        {{ Form::open(array('url'=>'admin/createcontent')) }}

            {{ Form::label('name') }}
            {{ Form::text('name') }}

            {{ Form::submit('create',array('class'=>'button small')) }}
        {{ Form::close() }}

    </div>

@stop