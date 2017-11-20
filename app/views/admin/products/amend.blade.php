@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="large-6 columns">
            <h1>Amend <span class="soft-blue">{{ $products->title }}</span> </h1>
        </div>
        <div class="large-4 columns end">
            {{ HTML::link('admin/products','Back to all products') }}
        </div>
    </div>
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

        {{ Form::open(array('url'=>'admin/productstamend','files'=>true)) }}

            {{ Form::label('title','Product Name',array('class'=>'strong')) }}
            <div class="row">

                <div class="large-4 columns">
                    {{ Form::text('title',$products->title,array('class'=>'large-6')) }}
                </div>

                <div class="large-2 columns ">
                    @if($products->availability == 1)
                        <?php $class = 'soft-green'; ?>
                    @elseif($products->availability == 0)
                         <?php $class = 'soft-red-bg'; ?>
                    @endif
                    {{ Form::select('availability', array('1' => 'In Stock', '0' => 'Out of Stock'), $products->availability,array('class'=>$class)) }}
                </div>

                <div class="large-3 columns end">

                    @if($products->small == 1)
                        <?php $checkeds = 'true' ?>
                    @else
                        <?php $checkeds = '' ?>
                    @endif
                    @if($products->medium == 1)
                        <?php $checkedm = 'true' ?>
                    @else
                        <?php $checkedm = '' ?>
                    @endif
                    @if($products->large == 1)
                        <?php $checkedl = 'true' ?>
                    @else
                        <?php $checkedl = '' ?>
                    @endif


                    {{ Form::checkbox('small','1',$checkeds) }}
                    {{ Form::label('small','S',array('class'=>'strong')) }}
                    {{ Form::checkbox('medium','1',$checkedm) }}
                    {{ Form::label('medium','M',array('class'=>'strong')) }}
                    {{ Form::checkbox('large','1',$checkedl) }}
                    {{ Form::label('large','L',array('class'=>'strong')) }}


                </div>

            </div>


            {{ Form::label('description','Product Description',array('class'=>'strong','id'=>'wysiwyg')) }}
            {{ Form::textarea('description',$products->description,array('id'=>'wysiwyg')) }}
            <br><br>
            {{ Form::label('description_2','Product Description 2',array('class'=>'strong','id'=>'wysiwyg')) }}
            {{ Form::textarea('description_2',$products->description_2, array('id'=>'wysiwyg')) }}
            <br><br>
            {{ Form::label('description_3','Product Description 3',array('class'=>'strong','id'=>'wysiwyg')) }}
            {{ Form::textarea('description_3',$products->description_3, array('id'=>'wysiwyg')) }}
            <br><br>
            <div class="row">
                @if($products->image_1)
                    <div class="large-2 columns">
                        <div class="grey product-image">
                             {{ HTML::image($products->image_1, $products->title) }}
                             <div class="remove-icon">
                                <a href="{{ url().'/admin/remove-img/'.$products->url.'_1' }}">
                                   <i class="fa fa-times"></i>
                                 </a>
                             </div>

                        </div>
                        {{ Form::label('image', 'Change Image',array('class'=>'strong')) }}
                        {{ Form::file('images_1') }}
                    </div>
                @else
                    {{ Form::label('image', 'Add Image',array('class'=>'strong')) }}
                    {{ Form::file('images_1') }}
                @endif

                 @if($products->image_2)
                    <div class="large-2 columns">
                        <div class="grey product-image">
                             {{ HTML::image($products->image_2, $products->title) }}
                             <div class="remove-icon">
                                <a href="{{ url().'/admin/remove-img/'.$products->url.'_2' }}">
                                   <i class="fa fa-times"></i>
                                 </a>
                             </div>
                        </div>
                        {{ Form::label('image', 'Change Image',array('class'=>'strong')) }}
                        {{ Form::file('images_2') }}
                    </div>
                 @elseif($products->image_1 == '')
                    {{ Form::label('image', 'Add Image',array('class'=>'strong')) }}
                    {{ Form::file('images_2') }}
                 @endif

                 @if($products->image_3)
                    <div class="large-2 columns">
                        <div class="grey product-image">
                             {{ HTML::image($products->image_3, $products->title) }}
                             <div class="remove-icon">
                                <a href="{{ url().'/admin/remove-img/'.$products->url.'_3' }}">
                                   <i class="fa fa-times"></i>
                                 </a>
                             </div>
                        </div>
                        {{ Form::label('image', 'Change Image',array('class'=>'strong')) }}
                        {{ Form::file('images_3') }}
                    </div>
                @elseif(!empty($products->image_2) && empty($products->image_3))
                    <div class="large-2 columns">
                        {{ Form::label('image', 'Add Image',array('class'=>'strong')) }}
                        {{ Form::file('images_3') }}
                    </div>
                @endif

                 @if($products->image_4)
                    <div class="large-2 columns">
                        <div class="grey product-image">
                             {{ HTML::image($products->image_4, $products->title) }}
                             <div class="remove-icon">
                                <a href="{{ url().'/admin/remove-img/'.$products->url.'_4' }}">
                                   <i class="fa fa-times"></i>
                                 </a>
                             </div>
                        </div>
                        {{ Form::label('image', 'Change Image',array('class'=>'strong')) }}
                        {{ Form::file('images_4') }}
                    </div>
                @elseif(!empty($products->image_3) && empty($products->image_4))
                    <div class="large-2 columns">
                        {{ Form::label('image', 'Add Image',array('class'=>'strong')) }}
                        {{ Form::file('images_4') }}
                    </div>
                @endif

                 @if($products->image_5)
                    <div class="large-2 columns">
                        <div class="grey product-image">
                             {{ HTML::image($products->image_5, $products->title) }}
                            <div class="remove-icon">
                                <a href="{{ url().'/admin/remove-img/'.$products->url.'_1' }}">
                                   <i class="fa fa-times"></i>
                                 </a>
                             </div>
                        </div>
                        {{ Form::label('image', 'Change Image',array('class'=>'strong')) }}
                        {{ Form::file('images_5') }}
                    </div>
                 @elseif(!empty($products->image_4) && empty($products->image_5))
                    <div class="large-2 columns">
                        {{ Form::label('image', 'Add Image',array('class'=>'strong')) }}
                        {{ Form::file('images_5') }}
                    </div>
                 @endif

                 @if($products->image_6)
                    <div class="large-2 columns">
                        <div class="grey product-image">
                             {{ HTML::image($products->image_6, $products->title) }}
                            <div class="remove-icon">
                                <a href="{{ url().'/admin/remove-img/'.$products->url.'_6' }}">
                                   <i class="fa fa-times"></i>
                                 </a>
                             </div>
                        </div>
                        {{ Form::label('image', 'Change Image',array('class'=>'strong')) }}
                        {{ Form::file('images_6') }}
                    </div>
                @elseif(!empty($products->image_5) && empty($products->image_6))
                    <div class="large-2 columns">
                        {{ Form::label('image', 'Add Image',array('class'=>'strong')) }}
                        {{ Form::file('images_6') }}
                    </div>
                @endif

                @if($products->image_7)
                    <div class="large-2 columns">
                        <div class="grey product-image">
                            {{ HTML::image($products->image_7, $products->title) }}
                            <div class="remove-icon">
                                <a href="{{ url().'/admin/remove-img/'.$products->url.'_7' }}">
                                   <i class="fa fa-times"></i>
                                 </a>
                             </div>
                        </div>
                        {{ Form::label('image', 'Change Image',array('class'=>'strong')) }}
                        {{ Form::file('images_7') }}
                    </div>
                     @elseif(!empty($products->image_6) && empty($products->image_7))
                       <div class="large-2 columns">
                           {{ Form::label('image', 'Add Image',array('class'=>'strong')) }}
                           {{ Form::file('images_7') }}
                       </div>
                   @endif

                @if($products->image_8)
                    <div class="large-2 columns">
                        <div class="grey product-image">
                            {{ HTML::image($products->image_8, $products->title) }}
                            <div class="remove-icon">
                                <a href="{{ url().'/admin/remove-img/'.$products->url.'_8' }}">
                                   <i class="fa fa-times"></i>
                                 </a>
                             </div>
                        </div>
                        {{ Form::label('image', 'Change Image',array('class'=>'strong')) }}
                        {{ Form::file('images_8') }}
                    </div>
                @elseif(!empty($products->image_7) && empty($products->image_8))
                    <div class="large-2 columns">
                        {{ Form::label('image', 'Add Image',array('class'=>'strong')) }}
                        {{ Form::file('images_8') }}
                    </div>
                @endif

                @if($products->image_9)
                    <div class="large-2 columns">
                        <div class="grey product-image">
                            {{ HTML::image($products->image_9, $products->title) }}
                            <div class="remove-icon">
                                <a href="{{ url().'/admin/remove-img/'.$products->url.'_9' }}">
                                   <i class="fa fa-times"></i>
                                 </a>
                             </div>
                        </div>
                        {{ Form::label('image', 'Change Image',array('class'=>'strong')) }}
                        {{ Form::file('images_9') }}
                    </div>
                @elseif(!empty($products->image_8) && empty($products->image_9))
                    <div class="large-2 columns">
                        {{ Form::label('image', 'Add Image',array('class'=>'strong')) }}
                        {{ Form::file('images_9') }}
                    </div>
                @endif

                @if($products->image_10)
                    <div class="large-2 columns">
                        <div class="grey product-image">
                            {{ HTML::image($products->image_10, $products->title) }}
                            <div class="remove-icon">
                                <a href="{{ url().'/admin/remove-img/'.$products->url.'_10' }}">
                                   <i class="fa fa-times"></i>
                                 </a>
                             </div>
                        </div>
                        {{ Form::label('image', 'Change Image',array('class'=>'strong')) }}
                        {{ Form::file('images_10') }}
                    </div>
                @elseif(!empty($products->image_9) && empty($products->image_10))
                    <div class="large-2 columns">
                        {{ Form::label('image', 'Add Image',array('class'=>'strong')) }}
                        {{ Form::file('images_10') }}
                    </div>
                @endif

            </div>

            <div class="row">
                <div class="large-2">
                     {{ Form::label('price', 'Price',array('class'=>'strong')) }}
                     {{ Form::text('price',$products->price) }}
                </div>
            </div>


            <br>
            {{ Form::hidden('id',$products->id) }}
            {{ Form::hidden('category_id',$products->category_id) }}
            {{ Form::submit('Update',array('class'=>'success button small')) }}

        {{ Form::close() }}



@stop