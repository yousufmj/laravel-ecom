@extends('layout.admin')

@section('content')

    <section class="row padding">

        <h1>Order for <span class="soft-blue">{{ $user->firstname }}  {{ $user->lastname }}</span> </h1>

        <h3 class="soft-red">Products Ordered</h3>


            <div class="large-12">
                <div class="row">

                 @foreach($orders as $order)
                    <div class="large-4 columns left">

                        <div class="large-6 columns">
                            {{ HTML::image($order->image_1, $order->title) }}
                        </div>


                        <div class="large-6 columns">

                            <div class="row">
                                   <b>Product name:</b> {{ $order->title }}
                            </div>

                            <div class="row">
                                    <b>Quantity:</b> {{ $order->quantity }}
                            </div>

                            <div class="row">
                                    <b>Size:</b> {{ $order->bsize }}
                            </div>

                            <div class="row">
                                  <b>Sub total:</b>  {{ $order->total_price }}
                            </div>

                        </div>

                    </div>

                 @endforeach
                </div>
            </div>



    </section>
    <br>
    <!-- Customer details -->
    <section class="row padding">

        <h3 class="soft-red">Customer Details</h3>

        <div class="large-6 column">

            <div class="row">
                <b>Full Name:</b> {{ $user->firstname }} {{ $user->lastname }}
            </div>

            <div class="row">
                <b>Email:</b> {{ $user->email }}
            </div>


            <div class="row">
                <b>Telephone:</b> {{ $user->telephone }}
            </div>

            <br>
            <div class="row">

                <h4 class="soft-red">Delivery Details</h4>
            </div>

            <div class="row">
                <div class="large-4 columns">
                    <b>Delivery Name:</b>
                </div>
                <div class="large-6 columns end">
                    {{ $user->delivery_name }}
                </div>

            </div>

            <div class="row">

                <div class="large-4 columns">
                    <b>Street:</b>
                </div>
                <div class="large-6 columns end">
                    {{ $user->address }}
                </div>

            </div>

            @if($user->address_2)
            <div class="row">
                <div class="large-4 columns">
                    <b>Street 2:</b>
                </div>
                <div class="large-6 columns end">
                    {{ $user->address_2 }}
                </div>

            </div>
            @endif

            <div class="row">
                <div class="large-4 columns">
                    <b>Town/City:</b>
                </div>
                <div class="large-6 columns end">
                    {{ $user->town }}
                </div>

            </div>

            <div class="row">
                <div class="large-4 columns">
                    <b>County:</b>
                </div>
                <div class="large-6 columns end">
                    {{ $user->county }}
                </div>
            </div>

            <div class="row">
                <div class="large-4 columns">
                    <b>Postcode:</b>
                </div>
                <div class="large-6 columns end">
                    {{ $user->postcode }}
                </div>
            </div>

        </div>


    </section>

    <br>
    <section class="row padding">
     <h3 class="soft-red">Final Order details</h3>

        <div class="large-4 columns">
            <div class="row">
                <b>Total Price:</b> {{ $total->total }}
            </div>
            <div class="row">
                <?php
                    $date = new DateTime($total->updated_at);
                ?>
                <b>Ordered on</b>  {{ $date->format('D d M Y H:i') }}
            </div>
        </div>

        {{ Form::open(array('url'=>'admin/orderprocess')) }}

            {{ Form::hidden('token',$total->stripe_token) }}
            {{ Form::hidden('user',$total->user_id) }}
            {{ Form::submit('Process Order', array('class'=>'button small success')) }}

        {{ Form::close() }}
</section>

@stop