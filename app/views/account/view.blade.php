@extends('layout.main')

@section('content')

<section class="row">
    <h1>Order Details</h1>

    <ul class="breadcrumbs">
        <li>{{ HTML::link('account','Account') }} </li>
        <li>{{ HTML::link('account/orders','Orders') }} </li>
        <li>details</li>
    </ul>
</section>

<section class="row">
 <?php
 if($despatch->processed == 1)
 {
    $des = 'Dispatched';
    $delivery = 'Dispatched Date';
 } else{
    $des = 'Processing';
    $delivery = 'Date Ordered';
 }

  ?>

    <div class="small-12 medium-5">
        <div class="account-section">
            <div class="account-content">
                <strong>Delivery Details</strong><br>
                {{ $user->delivery_name }}<br>
                {{ $user->address }}<br>
                @if($user->address_2)
                {{ $user->address_2 }}<br>
                @endif
                {{ $user->county }}<br>
                {{ $user->postcode }}<br>
            </div>
        </div>
    </div>
    <table role="grid">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>{{ $delivery }}</th>
                <th>QTY</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)

                <tr>
                    <td>{{ $order->title }}</td>

                    <td>{{ $des }}</td>
                    <?php   $date = new DateTime($despatch->updated_at);  ?>
                    <td>{{ $date->format('d M Y') }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->total_price }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>



</section>


@stop