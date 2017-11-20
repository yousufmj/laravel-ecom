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
                <h1>View all Categories </h1>
            </div>
            <div class="large-3 columns end">
                <a href="#" class="button small info" data-reveal-id="create">Create a Category</a>
            </div>

            <hr>

            <div class="large-8">

                @foreach($categories as $category)
                {{ Form::open(array('url' => 'admin/amendcategory')) }}
                <div class="row ">
                    <div class="large-6 columns">
                        {{ Form::text('name',$category->name) }}
                        {{ Form::hidden('id',$category->id) }}
                    </div>
                    <div class="large-1 columns">
                        <button class="button success tiny " type="submit"><i class="fa fa-check"></i></button>
                    </div>
                    {{ Form::close() }}

                    {{ Form::open(array('url' => 'admin/destroycategories')) }}
                    <div class="large-1 columns">
                        <button class="button alert tiny " type="submit"><i class="fa fa-trash"></i></button>
                        {{ Form::hidden('id',$category->id) }}
                    </div>
                    {{ Form::close() }}
                </div>

                @endforeach
            </div>


        <div id="create" class="reveal-modal" data-reveal>
            <a class="close-reveal-modal">&#215;</a>
            <h2>Create a new Category</h2>

               {{ Form::open(array('url' => 'admin/createcategories')) }}
                   {{ Form::label('name') }}
                   {{ Form::text('name') }}

                   {{ Form::submit('Create Category', array('class'=>'button small')) }}
               {{ Form::close() }}


        </div>




@stop