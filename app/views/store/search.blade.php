@extends('layout.main')

@section('search-keyword')

    <section class="row">
        <header><h1>Search Results for <span class="soft-red">{{ $keyword }}</span> </h1></header>

    </section>

@stop

@section('content')

    <section class="row">

        @foreach($products as $product)

            <div class="products">
                <a href="{{ url().'/store/product/'.$product->url }}">
                    {{ HTML::image($product->image_1,$product->title, array('class'=>'feature','width'=>'240')) }}
                </a>

                <h3><a href="{{ url().'/store/product/'.$product->url }}">{{ $product->title }}</a></h3>

                <p>{{ $product->description }}</p>

                <p>

                    {{ Form::open(array('url'=>'store/addtocart')) }}
                        {{ Form::hidden('quantity',1) }}
                        {{ Form::hidden('id',$product->id) }}

                        <button type="submit" class="button">
                            {{ $product->price }}
                            {{ HTML::image('img/white-cart.gif', 'Add to cart') }}
                            Add To Cart
                        </button>

                    {{ Form::close() }}
                </p>
            </div>

        @endforeach

    </section>

@stop