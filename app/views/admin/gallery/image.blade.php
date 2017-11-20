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

    <div class="large-8 columns">
        <h1>Edit <span class="soft-blue">{{ $image->title }}</span> </h1>
    </div>
    <div class="large-3 columns end">
        <a href="{{ url().'/admin/colour/'.$album->url }}" class="soft-red" >Back to album</a>
    </div>


</section>

<section >

    {{ Form::open(array('url'=>'admin/colour/image','files'=>true)) }}

        {{ Form::label('title','Image title',array('class'=>'strong')) }}
        <div class="row">

            <div class="large-4 columns">
                {{ Form::text('title',$image->title,array('class'=>'large-6')) }}
            </div>

            <div class="large-4 columns end">
                <select name="album">
                    @foreach($all as $a)
                        <option value="{{ $a->id }}">{{ $a->title }}</option>
                    @endforeach
                </select>
            </div>

        </div>


        {{ Form::label('description','Image description',array('class'=>'strong')) }}
        <div class="row">

            <div class="large-9 columns">
                {{ Form::textarea('description',$image->description,array('id'=>'wysiwyg')) }}
            </div>

        </div>
        <br>
        <div class="row">
            <div class="large-2 columns">
                <div class="grey product-image">
                     {{ HTML::image($image->image, $image->title) }}
                </div>
                {{ Form::label('image', 'Change Image',array('class'=>'strong')) }}
                {{ Form::file('image') }}
            </div>
        </div>
        {{ Form::hidden('id',$image->id) }}
        {{ Form::submit('Update',array('class'=>'button small success')) }}

    {{ Form::close() }}



</section>

@stop