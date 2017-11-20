@extends('layout.main')

@section('content')
<section class="row">
    <h1>Armoury</h1>

    @foreach($products as $product)
    <div class="large-4 columns padding-bottom left">
        <div class="products all">
            <a href="http://localhost/broq/public/store/product/{{ $product->url }}">
                {{ HTML::image($product->image_1,$product->title, array('class'=>'feature','width'=>'240')) }}

                <p class="armoury">
                    {{ $product->title }} - &pound;{{ $product->price }}
                </p>
            </a>


         </div>
    </div>
    @endforeach

</section>





@stop