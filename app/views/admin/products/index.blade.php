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
                <h1>View all products </h1>
                <p>Here you can view, delete, create new Products</p>
            </div>
            <div class="large-3 columns end">
                <button class="button small info" id="createPr">Create a product</button>
            </div>


            <hr>


        <div class="large-7">
             @foreach($products as $product)

                <div class="row">
                    <div class="large-2 columns">
                        {{ HTML::image($product->image_1, $product->title, array('width'=>'50')) }}
                    </div>

                    <div class="large-3 columns">
                        {{ $product->title }}
                    </div>

                    <div class="large-2 columns">
                        {{ HTML::link('admin/products/amend/'.$product->id,'Edit',array('class'=>'button tiny success')) }}
                    </div>

                    <div class="large-2 columns end">
                        {{ Form::open(array('url' =>'admin/destroyproducts' )) }}
                            {{ Form::hidden('id', $product->id) }}
                             <button class="button alert tiny " type="submit"><i class="fa fa-trash"></i></button>
                        {{ Form::close() }}
                    </div>
                </div>
                <br>

             @endforeach
        </div>


    </section>



<section class="row">

        <div id="create">
              <h2>Create a new product</h2>



                    {{ Form::open(array('url' => 'admin/createproducts', 'files'=>true)) }}

                                {{ Form::label('category_id', 'Category') }}
                                {{ Form::select('category_id',$categories) }}

                                {{ Form::label('title','Product Title',array('class'=>'strong')) }}
                                {{ Form::text('title') }}

                                {{ Form::label('description','Product Description',array('class'=>'strong')) }}
                                {{ Form::textarea('description') }}
                                <br>
                                {{ Form::label('price',null,array('class'=>'strong')) }}
                                {{ Form::text('price', null) }}
                                <div id="image_1">
                                {{ Form::label('images_1', 'Choose an Image',array('class'=>'strong')) }}
                                {{ Form::file('images_1', array('multiple'=>true)) }}
                                </div>
                                <div id="image_2">
                                {{ Form::label('images_2', 'Choose an Image',array('class'=>'strong')) }}
                                {{ Form::file('images_2', array('multiple'=>true)) }}
                                </div>
                                <div id="image_3">
                                {{ Form::label('images_3', 'Choose an Image',array('class'=>'strong')) }}
                                {{ Form::file('images_3', array('multiple'=>true)) }}
                                </div>
                                <div id="image_4">
                                {{ Form::label('images_4', 'Choose an Image',array('class'=>'strong')) }}
                                {{ Form::file('images_4', array('multiple'=>true)) }}
                                </div>
                                 <div id="image_5">
                                {{ Form::label('images_5', 'Choose an Image',array('class'=>'strong')) }}
                                {{ Form::file('images_5', array('multiple'=>true)) }}
                                </div>
                                 <div id="image_6">
                                {{ Form::label('images_6', 'Choose an Image',array('class'=>'strong')) }}
                                {{ Form::file('images_6', array('multiple'=>true)) }}
                                </div>
                                 <div id="image_7">
                                {{ Form::label('images_7', 'Choose an Image',array('class'=>'strong')) }}
                                {{ Form::file('images_7', array('multiple'=>true)) }}
                                </div>
                                 <div id="image_8">
                                {{ Form::label('images_8', 'Choose an Image',array('class'=>'strong')) }}
                                {{ Form::file('images_8', array('multiple'=>true)) }}
                                </div>
                                 <div id="image_9">
                                {{ Form::label('images_9', 'Choose an Image',array('class'=>'strong')) }}
                                {{ Form::file('images_9', array('multiple'=>true)) }}
                                </div>
                                 <div id="image_10">
                                {{ Form::label('images_10', 'Choose an Image',array('class'=>'strong')) }}
                                {{ Form::file('images_10', array('multiple'=>true)) }}
                                </div>
                                <!--
                               <div class="image-upload">
                                       <div class="dz-default dz-message"><span>Drop files here to upload</span></div>



                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                             </div>
                               </div>

                                -->



                            {{ Form::submit('Create Product', array('class'=>'button small info')) }}
                            {{ Form::close() }}


            </div>
</section>


<script language="javascript">
$( document ).ready(function() {


    $('div#create').hide();
    $( "button#createPr" ).click(function() {
      $( "div#create" ).show();
    });

    $('div#image_2').hide();
    $('div#image_3').hide();
    $('div#image_4').hide();
    $('div#image_5').hide();
    $('div#image_6').hide();
    $('div#image_7').hide();
    $('div#image_8').hide();
    $('div#image_9').hide();
    $('div#image_10').hide();

    $('#image_1').on('change', function(evt) {
        var file = evt.target.files[0];
        if (file)
            $('#image_2').show();
    });

    $('#image_2').on('change', function(evt) {
            var file = evt.target.files[0];
            if (file)
                $('#image_3').show();
        });

    $('#image_3').on('change', function(evt) {
            var file = evt.target.files[0];
            if (file)
                $('#image_4').show();
        });

    $('#image_4').on('change', function(evt) {
            var file = evt.target.files[0];
            if (file)
                $('#image_5').show();
        });

    $('#image_5').on('change', function(evt) {
            var file = evt.target.files[0];
            if (file)
                $('#image_6').show();
        });

    $('#image_6').on('change', function(evt) {
            var file = evt.target.files[0];
            if (file)
                $('#image_7').show();
        });


    $('#image_7').on('change', function(evt) {
            var file = evt.target.files[0];
            if (file)
                $('#image_8').show();
        });

    $('#image_8').on('change', function(evt) {
                var file = evt.target.files[0];
                if (file)
                    $('#image_9').show();
            });

    $('#image_9').on('change', function(evt) {
            var file = evt.target.files[0];
            if (file)
                $('#image_10').show();
        });



});

</script>
@stop