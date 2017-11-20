@extends('layout.main')

@section('content')

<section class="row">
    <header><h2>{{ $category->name }}</h2></header>


        @foreach($products as $product)

            <div class="products">
                <a href="http://localhost/broq/public/store/view/{{ $product->id }}">
                    {{ HTML::image($product->image,$product->title, array('class'=>'feature','width'=>'240')) }}
                </a>

                <h3><a href="http://localhost/broq/public/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

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