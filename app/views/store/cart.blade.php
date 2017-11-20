@extends('layout.main')

@section('content')

    @if($products)
    <!-- With paypal -->
    <section class="row">
         <!--<form action="https://www.paypal.com/cgi-bin/webscr" method="POST">-->
            <div class="large-8 column">

                <table role="grid">
                    <thead>
                        <tr>
                            <th width="250">Product Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Size</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)

                        <tr>
                            <td>
                                {{ HTML::image($product->image_1,$product->title,array('class'=>'product-cart')) }}
                                {{ HTML::link('/store/product/'.$product->url, $product->title) }}
                                <a href="http://localhost/broq/public/store/removeitem/{{ $product->bas_id }}">
                                    {{ HTML::image('img/remove.gif','Remove Product') }}
                                </a>
                            </td>
                            <td>&pound; {{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->size }}</td>
                            <td>
                                &pound;{{ $product->total_price }}

                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
            </section>



            <section class="row">
                <div class="large-8">
                    <div class="large-7 large-centered columns ">
                <div class="payment">
                    <div class="payment-price">
                          Total &pound;{{ $total }}
                    </div>
                    <div class="payment-checkout">
                        {{ HTML::link(url(),'Continue Shopping',array('class'=>'button small soft-blue-bg')) }}
                        {{ HTML::link('store/checkout','Checkout',array('class'=>'button small info')) }}

                        <!-- <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="currency_code" value="GBP">
                        <input type="hidden" name="business" value="yousuf@kruzerdesigns.com">
                        <input type="hidden" name="item_name" value="Store Purchase">
                        <input type="hidden" name="amount" value="{{ Cart::total() }}">
                        <input type="hidden" name="first_name" value="{{ Auth::user()->firstname }}">
                        <input type="hidden" name="last_name" value="{{ Auth::user()->lastname }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                       <input type="submit" value="Checkout with paypal" class="button small info"> -->
                    </div>
                </div>

        </form>
            </div>
                </div>
            </section>

    @else

    <section class="row">
        <h4>Your basket is currently empty</h4>
    </section>

    @endif
@stop