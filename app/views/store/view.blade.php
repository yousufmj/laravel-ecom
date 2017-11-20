@extends('layout.main')

@section('content')

<section class="row">


        <!-- Product Image -->
        <div class="small-12 medium-6 large-4 columns padding-bottom">
        <ul class="clearing-thumbs clearing-feature" data-clearing>
            <li class="clearing-featured-img"><a href="{{ $product->image_1 }}">{{ HTML::image($product->image_1,$product->title) }}</a></li>
             @if($product->image_2)
                <li><a href="{{ $product->image_2 }}">{{ HTML::image($product->image_2,$product->title) }}</a></li>
             @endif
             @if($product->image_3)
                <li><a href="{{ $product->image_3 }}">{{ HTML::image($product->image_3,$product->title) }}</a></li>
             @endif
             @if($product->image_4)
                <li><a href="{{ $product->image_4 }}">{{ HTML::image($product->image_4,$product->title) }}</a></li>
             @endif
             @if($product->image_5)
                <li><a href="{{ $product->image_5 }}">{{ HTML::image($product->image_5,$product->title) }}</a></li>
             @endif
             @if($product->image_6)
                <li><a href="{{ $product->image_6 }}">{{ HTML::image($product->image_6,$product->title) }}</a></li>
             @endif
             @if($product->image_7)
                <li><a href="{{ $product->image_7 }}">{{ HTML::image($product->image_7,$product->title) }}</a></li>
             @endif
             @if($product->image_8)
                <li><a href="{{ $product->image_8 }}">{{ HTML::image($product->image_8,$product->title) }}</a></li>
             @endif
             @if($product->image_9)
                <li><a href="{{ $product->image_9 }}">{{ HTML::image($product->image_9,$product->title) }}</a></li>
             @endif
             @if($product->image_10)
                <li><a href="{{ $product->image_10 }}">{{ HTML::image($product->image_10,$product->title) }}</a></li>
             @endif
        </ul>

        </div>
        <div class="small-12 medium-6 large-2 columns product-view">
            @if($product->image_2)
            {{ HTML::image($product->image_2,$product->title) }}
            @endif
            @if($product->image_3)
            {{ HTML::image($product->image_3,$product->title) }}
            @endif
            @if($product->image_4)
            {{ HTML::image($product->image_4,$product->title) }}
            @endif
        </div>

        <!-- Cart button and quantity -->
        <div class="large-6 columns end padding-bottom">
        <h1 class="padding-bottom">{{ $product->title }} - &pound;{{ $product->price }}</h1>

         {{ Form::open(array('url'=>'store/addtocart')) }}

            <div class="row">
              <div class="large-4">
                  <div class="large-6 columns">
                   {{ Form::label('quantity','Qty',array('class'=>'strong')) }}
                  </div>
                    <div class="large-6 columns end">

                     {{ Form::select('quantity', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),'1') }}
                     {{ Form::hidden('id', $product->id) }}
                    </div>
                </div>
              </div>

               <div class="row">
                <div class="large-6">
                    <div class="large-4 columns">
                     {{ Form::label('size','Size',array('class'=>'strong')) }}
                    </div>
                      <div class="large-6 columns end">

                      <select name="size">
                          @if($product->small)
                              <option value="small">Small</option>
                          @endif
                          @if($product->medium)
                              <option value="medium">Medium</option>
                          @endif
                          @if($product->large)
                              <option value="large">Large</option>
                          @endif

                      </select>
                       {{ Form::hidden('id', $product->id) }}
                      </div>
                  </div>
                </div>
               <div class="large-4">
                    <button type="submit" class="button tiny">ADD TO CART </button>
                </div>
          {{ Form::close() }}
         </div>

         <div class="large-6 columns padding-top">
                 <!--Product Discription -->

                 <dl class="tabs" data-tab>
                     <dd class="active"><a href="#panel1">Description</a></dd>
                     <dd><a href="#panel2">Description 2</a></dd>
                     <dd><a href="#panel3">Description 3</a></dd>
                 </dl>

                 <div class="tabs-content">
                     <div class="content active" id="panel1">
                         <p>{{ $product->description }}</p>
                     </div>

                     <div class="content" id="panel2">
                          <p>{{ $product->description_2 }}</p>
                     </div>

                     <div class="content" id="panel3">
                          <p>{{ $product->description_3 }}</p>
                     </div>


                 </div>

             </div>


</section>

<section class="row padding">
<hr>
    <h3> Related Products</h3>

    @foreach($related as $rel)
            <div class="large-3 columns product-related left">
                    <div class="products">
                        <a href="http://localhost/broq/public/store/product/{{ $rel->url }}">
                            {{ HTML::image($rel->image_1,$rel->title, array('class'=>'feature','width'=>'240')) }}
                        </a>

                        <h5><a href="http://localhost/broq/public/store/product/{{ $rel->url }}">{{ $rel->title }} - {{ $rel->price }}</a></h5>

                            {{ Form::open(array('url'=>'store/addtocart')) }}
                                {{ Form::hidden('quantity',1) }}
                                {{ Form::hidden('id',$rel->id) }}

                                <button type="submit" class="button tiny">
                                    {{ HTML::image('img/white-cart.gif', 'Add to cart') }}
                                    Add To Cart
                                </button>

                            {{ Form::close() }}

                    </div>
                </div>

            @endforeach



</section>



@stop