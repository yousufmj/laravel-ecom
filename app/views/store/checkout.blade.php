@extends('layout.main')

@section('content')

<span class="payment-errors"></span>
{{ Form::open(array('url'=>'store/checkout', 'id' =>'checkout', 'data-abide' => true)) }}

<div class="row">
<div class="large-8 large-centered column">

    <!-- basket review -->
    <section class="row checkout-border checkout-section">

        <div class="large-5 columns">
            <strong class="checkout-number">1</strong>
            <span class="checkout-name">Basket</span>
        </div>

        <div class="large-6 columns end">
            <table role="grid">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)

                    <tr>
                        <td>
                            {{ HTML::image($product->image_1,$product->title,array('class'=>'product-cart')) }}
                            {{ HTML::link('/store/product/'.$product->url, $product->title) }}

                        </td>
                        <td>
                            &pound;{{ $product->total_price }}

                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

    </section>



    <!-- Delivery details -->
    <section class="row checkout-border checkout-section">

        <div class="large-5 columns">
            <strong class="checkout-number">2</strong>
            <span class="checkout-name">Delivery Information</span>
        </div>

        <div class="large-6 columns end">

            <div class="row">
                <div class="name-field">
                    <label>Full Name
                        {{ Form::text('delivery_name','', ['required']) }}
                        <small class="error">Name is required </small>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="name-field">
                    <label>Street
                        {{ Form::text('street','', ['required']) }}
                        <small class="error">Street name is required </small>
                    </label>
                </div>
            </div>

            <div class="row">
                {{ Form::text('street2','') }}
            </div>

            <div class="row">
                <div class="name-field">
                    <label>Town/City
                        {{ Form::text('town','', ['required']) }}
                        <small class="error">Town or City is required </small>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="name-field">
                    <label>County
                        {{ Form::text('county','', ['required']) }}
                        <small class="error">Town or City is required </small>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="name-field">
                    <label>Post Code
                        {{ Form::text('postcode','', ['required']) }}
                        <small class="error">Town or City is required </small>
                    </label>
                </div>
            </div>


        </div>
    </section>



    <!-- Payment details -->
    <section class="row checkout-border checkout-section">
        <div class="large-5 columns">
            <strong class="checkout-number">3</strong>
            <span class="checkout-name">Payment</span>
        </div>
        <div class="large-6 columns end">

            <div class="stripe-errors panel hide"></div>

            <div class="row">
               <label>
                     <span>Card Number</span>
                     <input type="text" size="20" data-stripe="number"/>
               </label>
            </div>


            <div class="row">
                <div class="large-4 columns">
                    <label>Exp month (MM)</label>
                    <select data-stripe="exp-month">
                        <?php foreach(range(1,12) as $month){ ?>
                            <option value="<?=$month?>"><?=$month?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="large-4 columns">
                    <label>Exp Year (YYYY)</label>
                    <select  data-stripe="exp-year">
                        <?php
                            $current = date('Y');
                            $next = $current+10;
                         foreach(range($current,$next) as $year){ ?>
                            <option value="<?=$year?>"><?=$year?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="large-4 columns">
                    <label>CVC</label>
                    <input type="text" size="4" data-stripe="cvc"/>
                </div>

            </div>
            {{ Form::hidden('amount',$total) }}
            <!-- {{ Form::submit('Pay',array('class'=>'button tiny info')) }} -->
            <button class="button small soft-red-bg checkout-button right">Submit my Order</button>
        </div>

    </section>




</div>
</div>



{{ Form::close() }}






<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
  Stripe.setPublishableKey('@stripeKey');
</script>
<script src="{{ asset('js/assets/stripe.js') }}"></script>

@stop