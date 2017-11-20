@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="large-6 columns">
            <h1 class="info">Amend {{ $spec->name }}</h1>
        </div>

    </div>


            {{ Form::open(array('url'=>'admin/speqtrumammend')) }}

            {{ Form::label('name','Page Name',array('class'=>'strong')) }}
            <div class="row">
                <div class="large-4 column">
                    {{ Form::text('name',$spec->name,array('class'=>'large-6')) }}
                </div>

            </div>



            {{ Form::label('white','White Content',array('class'=>'strong','id'=>'wysiwyg')) }}
            {{ Form::textarea('white',$spec->description_1,array('id'=>'wysiwyg')) }}
            <br>
            {{ Form::label('grey','Grey Content',array('class'=>'strong','id'=>'wysiwyg')) }}
            {{ Form::textarea('grey',$spec->description_2,array('id'=>'wysiwyg')) }}
            <br>
            {{ Form::label('green','Green Content',array('class'=>'strong','id'=>'wysiwyg')) }}
            {{ Form::textarea('green',$spec->description_3,array('id'=>'wysiwyg')) }}
            <br>
            {{ Form::label('red','Red Content',array('class'=>'strong','id'=>'wysiwyg')) }}
            {{ Form::textarea('red',$spec->description_4,array('id'=>'wysiwyg')) }}

            {{ Form::hidden('id',$spec->id) }}

            <br>

            {{ Form::submit('Update',array('class'=>'success button small')) }}

        {{ Form::close() }}



@stop