<style>
.col4{width:33%;}
</style>

Thank you {{ $firstname }} for ordering from the b.r.o.q <br> <br>

Your order has been dispatched and is on its way


<table>
    <thead>
        <tr>
            <th> Product</th>
            <th> Quantity</th>
            <th> Subtotal</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td><img src="{{ $product->image_1 }}" alt="{{ $product->title }}"/> {{ $product->title }}</td>
            <td>{{ $product->quantity }}</td>
            <td>&pound;{{ $product->total_price }}</td>
        </tr>
    @endforeach
    </tbody>
</table>



The b.r.o.q





