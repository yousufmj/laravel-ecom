@extends('layout.main')

@section('content')

<section class="row">
    <h1>My Account</h1>

    <div class="row account-section">
        <div class="medium-3 columns">
            <h4>Settings</h4>
            <p>Update and edit your account settings</p>
            {{ HTML::link('account/settings','Edit Settings', array('class'=>'button tiny')) }}
        </div>

        <div class="small-12 medium-8 columns end account-content">
            <h4 class="padding-bottom">My Account Settings</h4>
            <p><strong>Name:</strong> {{ $account->firstname.' '.$account->lastname }} </p>
            <p><strong>Email:</strong> {{ $account->email }}</p>
        </div>
    </div>

</section>



<section class="row">

    <div class="row account-section">
        <div class="medium-3 columns">
            <h4>Delivery</h4>
            <p>Edit your delivery address</p>
            {{ HTML::link('account/delivery','Edit delivery details', array('class'=>'button tiny')) }}
        </div>

        <div class="small-12 medium-8 columns end account-content">
            <h4 class="padding-bottom">My Delivery Details</h4>
            <p><strong>Street:</strong> {{ $account->address }}</p>
            <p><strong>Postcode:</strong> {{ $account->postcode }}</p>
        </div>
    </div>

</section>



<section class="row">

    <div class="row account-section">

        <div class=" medium-3 columns">
            <h4>Orders</h4>
            <p>View recent orders</p>
            {{ HTML::link('account/orders','View all orders', array('class'=>'button tiny')) }}
        </div>

        <div class="small-12 medium-8 columns end account-content">
             <h4 class="padding-bottom">Outstanding Orders</h4>

           <table role="grid">
               <thead>
                   <tr>
                       <th>Order No</th>
                       <th>Order Date</th>
                       <th>Items</th>
                       <th>Order Status</th>
                       <th>Price</th>
                       <th></th>
                   </tr>
               </thead>
               <tbody>
                   @if($outstanding)
                       @foreach($outstanding as $out)

                           <tr>
                               <td>{{ HTML::link('account/orders/view/'.$out->order_id,$out->order_id) }}</td>
                                <?php   $date = new DateTime($out->updated_last);  ?>
                               <td>{{ $date->format('d M Y') }}</td>
                               <td>{{ $out->qty }}</td>
                               <td>Being Processed</td>
                               <td>{{ $out->overall_price }}</td>
                               <td>{{ HTML::link('account/orders/view/'.$out->order_id,'View',array('class'=>'button tiny ')) }}</td>
                           </tr>

                       @endforeach
                   @else

                       <tr>
                           <td colspan="6" class="text-center">You currently have no orders</td>
                       </tr>

                   @endif
               </tbody>
           </table>

        </div>


    </div>


</section>

@stop