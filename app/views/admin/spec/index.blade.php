@extends('layout.admin')

@section('content')

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

        <div class="large-6 columns">
            <h1>Speqtrum </h1>
        </div>
        <div class="large-3 columns end">
            <a href="#" class="button small info" data-reveal-id="create">Create new content</a>
        </div>

        <hr>

        @foreach($specs as $spec)
            <div class="large-7">
                <div class="large-8 columns">
                    {{ $spec->name }}
                </div>
                <div class="large-2 columns">
                     {{ HTML::link('admin/speqtrum/amend/'.$spec->url,'Edit',array('class'=>'button tiny success')) }}
                </div>

                <div class="large-2 columns end">
                     {{ Form::open(array('url' => 'admin/destroyspeqtrum')) }}
                         <div class="large-1 columns">
                             <button class="button alert tiny " type="submit"><i class="fa fa-trash"></i></button>
                             {{ Form::hidden('id',$spec->id) }}
                         </div>
                     {{ Form::close() }}
                </div>
            </div>


        @endforeach






        <div id="create" class="reveal-modal" data-reveal>
            <a class="close-reveal-modal">&#215;</a>
                <h2>Create new page</h2>

                {{ Form::open(array('url'=>'admin/createspec')) }}

                    {{ Form::label('name') }}
                    {{ Form::text('name') }}

                    {{ Form::label('white') }}
                    {{ Form::textarea('white') }}

                    {{ Form::label('grey') }}
                    {{ Form::textarea('grey') }}

                    {{ Form::label('green') }}
                    {{ Form::textarea('green') }}

                    {{ Form::label('red') }}
                    {{ Form::textarea('red') }}

                    {{ Form::submit('create',array('class'=>'button small')) }}
                {{ Form::close() }}

        </div>



@stop