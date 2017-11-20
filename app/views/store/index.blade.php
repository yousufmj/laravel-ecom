@extends('layout.main')

@section('content')

    <section class="row padding">
        <div class="large-8 large-centered columns">
            <div class="slider">
                <div class="flexslider">
                  <ul class="slides">
                    <li>
                      <img src="http://localhost/broq/public/img/slider.jpg" />
                    </li>
                    <li>
                      <img src="http://localhost/broq/public/img/album/test/test_cover.jpg" />
                    </li>
                    <li>
                      <img src="http://localhost/broq/public/img/album/testtet/testtet_cover.jpg" />
                    </li>

                  </ul>
                </div>
            </div>
        </div>

    </section>

    {{ $home->page_content }}

    <section class="row products-index">
        <h2>New Products</h2>

        @foreach($products as $product)
        <div class="large-3 columns">
                <div class="products">
                    <a href="http://localhost/broq/public/store/product/{{ $product->url }}">
                        {{ HTML::image($product->image_1,$product->title, array('class'=>'feature','width'=>'240')) }}
                    </a>

                    <h5><a href="http://localhost/broq/public/store/product/{{ $product->url }}">{{ $product->title }} - {{ $product->price }}</a></h5>

                        {{ Form::open(array('url'=>'store/addtocart')) }}
                            {{ Form::hidden('quantity',1) }}
                            {{ Form::hidden('id',$product->id) }}

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


