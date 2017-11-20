@extends('layout.admin')

@section('content')

    <section class="row">

        <h1>Orders to be processed</h1>

        <table role="grid">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Price</th>
                    <th>Order Date</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @if($basket)

                    @foreach($basket as $b)
                        <tr>

                            <td>{{ $b->firstname }} {{ $b->lastname }}</td>
                            <td>{{ $b->email }}</td>
                            <td> &pound;{{ $b->overall_price }}</td>
                             <?php   $date = new DateTime($b->updated_last);  ?>
                            <td>{{ $date->format('D d M Y H:i') }}</td>
                            <td><a href="{{ url('admin/orders/view/'.$b->basID) }}" class="button tiny success"><i class="fa fa-pencil"></i></a></td>

                        </tr>

                    @endforeach

                @else
                    <tr>
                       <td colspan="5">No orders have been made</td>
                    </tr>

                @endif


            </tbody>
        </table>

    </section>

@stop