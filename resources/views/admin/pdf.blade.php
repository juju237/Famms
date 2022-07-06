<!DOCTYPE html>
<head>

    <title><i>Order PDF</i></title>
</head>

<body>

              <h1><i>Order Details</i></h1>

    Customer ID :<h3>{{$order->user_id}}</h3>


    Customer Name :<h3>{{$order->name}}</h3>


     Customer Email :<h3>{{$order->email}}</h3>


     Customer Phone :<h3>{{$order->ahone}}</h3>


     Customer Address :<h3>{{$order->address}}</h3>


     Product Id :<h3>{{$order->product_id}}</h3>


     Product Name :<h3>{{$order->product_title}}</h3>


     Product Price :<h3>{{$order->price}}</h3>


     Product Quantity :<h3>{{$order->quantity}}</h3>


     Payment Status :<h3>{{$order->payment_status}}</h3>

     <br><br>
    <img height="250" width="450" src="product/{{ $order->image }}">

</body>

</html>
