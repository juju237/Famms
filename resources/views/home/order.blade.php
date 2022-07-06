<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css')}}"rel="stylesheet" />

      <style>
        .tabledsg
        {
            position: relative;
            left: 15%;
            width: 70%;
            padding: 30px;
            text-align: center;

        }

        table,th,td
        {
            border: 2px solid black;
        }

        .thdsg
        {
            padding:10px;
            background-color: crimson;
            font-size: 20px;
            font-weight: bold;
        }
      </style>

    </head>
   <body>

         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->



         <div class="tabledsg">

            <table>
                <tr>
                    <th class="thdsg" >Product Title</th>
                    <th class="thdsg" >Quantity</th>
                    <th class="thdsg" >Price</th>
                    <th class="thdsg" >Payment Status</th>
                    <th class="thdsg" >Delivery Status</th>
                    <th class="thdsg" >Image</th>
                    <th class="thdsg" >Cancel Order</th>
                </tr>

                @foreach ($order as $order )


                <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>

                    <td>

                        <img height="100px" width="180px" src ="product/{{$order->image}}">
                    </td>


                    <td>
                        @if($order->delivery_status=='processing')
                        <a class="btn btn-danger" onclick="return confirm('Are You Sure To Cancel The Order!!')" href="{{ url('cancel_order',$order->id) }}">Cancel</a>

                        @else
                             <p style ="color:aquamarine">DONE</p>
                        @endif

                    </td>
                </tr>

                @endforeach

            </table>
         </div>





      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
