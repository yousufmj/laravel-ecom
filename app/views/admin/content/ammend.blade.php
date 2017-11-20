@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="large-6 columns">
            <h1 class="info">Amend {{ $content->name }}</h1>
        </div>

         {{ Form::open(array('url'=>'admin/amendcontent')) }}
        <div class="large-4 columns end">
            <label><b>Published</b></label>
                <div class="switch">
                <?php
                $checked = '';
                if($content->published == 1){$checked = 'checked';}
                 ?>
                  <input id="published" type="checkbox" name="published" {{ $checked }}>
                  <label for="published">Published</label>
                </div>
        </div>
    </div>




            {{ Form::label('name','Page Name',array('class'=>'strong')) }}
            <div class="row">
                <div class="large-4 column">
                    {{ Form::text('name',$content->name,array('class'=>'large-6')) }}
                </div>

            </div>

            {{ Form::label('meta_title','Meta Title - Used for SEO
            purposes. the title of the the page',array('class'=>'strong')) }}
            <div class="row">
                <div class="large-4 column">
                    {{ Form::text('meta_title',$content->meta_title) }}
                </div>
            </div>

            {{ Form::label('meta_description','Meta description - Used for SEO purposes - Description of the the page',array('class'=>'strong')) }}
            <div class="row">
                <div class="large-10 column">
                    {{ Form::text('meta_description',$content->meta_description) }}
                </div>
            </div>


            {{ Form::label('page_content','Page Content',array('class'=>'strong','id'=>'wysiwyg')) }}
            {{ Form::textarea('page_content',$content->page_content,array('id'=>'wysiwyg')) }}
            {{ Form::hidden('id',$content->id) }}

            <br>

            {{ Form::submit('Update',array('class'=>'success button small')) }}

        {{ Form::close() }}



@stop