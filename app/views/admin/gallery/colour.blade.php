@extends('layout.admin')

@section('content')

<section class="row">
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
        <h1>Colour Gallery</h1>
    </div>
    <div class="large-3 columns end">
        <a href="#" class="button small info" data-reveal-id="create">Add new gallery</a>
    </div>

    <hr>

</section>

<section class="row">

    @foreach($albums as $album)
        <div class="large-4 columns left">

            <div class="colour-album">
                <div class="album-cover">
                    <div class="remove-icon">
                        <a href="{{ url().'/admin/colour/removealbum/'.$album->id }}">
                           <i class="fa fa-times"></i>
                         </a>
                    </div>
                    <a href="{{ url().'/admin/colour/'.$album->url }}">
                        {{ HTML::image($album->image,$album->title) }}
                        <div class="album-name">
                            {{ $album->title }}
                        </div>
                    </a>
                </div>
            </div>

        </div>
    @endforeach


</section>

<div id="create" class="reveal-modal" data-reveal>
    <a class="close-reveal-modal">&#215;</a>
    <h2>New gallery</h2>

       {{ Form::open(array('url' => 'admin/colour/newcolour', 'files'=>true)) }}
           {{ Form::label('title') }}
           {{ Form::text('title') }}

           {{ Form::label('description') }}
           {{ Form::textarea('description') }}

           {{ Form::label('image', 'Choose an Image',array('class'=>'strong')) }}
           {{ Form::file('image', array('multiple'=>true)) }}



           {{ Form::submit('Create Album', array('class'=>'button small')) }}
       {{ Form::close() }}


</div>

@stop