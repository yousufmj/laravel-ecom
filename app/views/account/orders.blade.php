@extends('layout.main')

@section('content')

<section class="row">
    <h1>Order Historty</h1>

    <ul class="breadcrumbs">
        <li>{{ HTML::link('account','account') }} </li>
        <li>Orders</li>
    </ul>
</section>


<section class="row">
    <div class="account-section">
        <div class="medium-3 columns">
            <h4>Orders</h4>

        </div>

        <div class="small-12 medium-8 columns end account-content">
            <h4 class="padding-bottom">Outstanding orders</h4>

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


            <h4 class="padding-bottom">Previous orders</h4>

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
                    @if($previous)
                        @foreach($previous as $p)

                            <tr>
                                <td>{{ HTML::link('account/orders/view/'.$p->order_id,$p->order_id) }}</td>
                                 <?php   $date = new DateTime($p->updated_last);  ?>
                                <td>{{ $date->format('d M Y') }}</td>
                                <td>{{ $p->qty }}</td>
                                <td>Being Processed</td>
                                <td>{{ $p->overall_price }}</td>
                                <td>{{ HTML::link('account/orders/view/'.$p->order_id,'View',array('class'=>'button tiny ')) }}</td>
                            </tr>

                        @endforeach
                    @else

                        <tr>
                            <td colspan="6" class="text-center">You currently have no previous orders</td>
                        </tr>

                    @endif
                </tbody>
            </table>

        </div>


    </div>

</section>

@stop