<!DOCTYPE html>
<html lang="en">
   <head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


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
        width: 50%;
        left: 23%;
        top: 11%;
        text-align: center;
        padding: 40px;
        font-size: 20px;

    }

    .tabledsg2
    {

          position: relative;
          width: 50%;
          left: 40%;
          top: 11%;
          text-align: center;
          padding: 10px;
          font-size: 20px;
    }

    .tabledsg3
    {

        width: 80%;
        left: 10%;
        top: 3%;
        position: relative;
        text-align: center;
        padding: 40px;
        font-size: 20px;

    }
    table,th,td
    {
        border: 2px hidden;
    }
    .th_dsg
    {
        font size: 30px;
        padding: 30px;
        background: rgb(153, 7, 7);
    }
     .img_dsg
     {
        height:119px;
        width:119px;
     }
   </style>

    </head>
   <body>

         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->

         @if (session()->has('message'))

                    <div style="align: center;" class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

                              {{ session()->get('message')}}

                    </div>

         @endif


      <div class="tabledsg">
      <table>
        <tr>
            <th class="th_dsg"><b>Product Title</b></th>
            <th class="th_dsg">Product quantity</th>
            <th class="th_dsg">Price</th>
            <th class="th_dsg">Image</th>
            <th class="th_dsg">Action</th>
        </tr>


        <?php $totalprice=0; ?>

        @foreach($cart as $cart)

        <tr>
            <td>{{$cart->product_title}}</td>
            <td>{{$cart->quantity}}</td>
            <td> FCFA {{$cart->price}}</td>

            <td><img class="img_dsg" src="/product/{{$cart->image}}"></td>
            <td><a class="btn btn-danger" href="{{ url('/remove_cart',$cart->id) }}" onclick="return confirm('Are You Sure To Remove This Product?')">Remove</td>
        </tr>

        <?php $totalprice= $totalprice + $cart->price ?>

         @endforeach
        </table>

    </div>

    <div class= tabledsg2>
        <table>
            <tr>
             <th style="background:  rgb(153, 7, 7);"><b>Total Amount : </b></th>
             <th> <b>FCFA</b> {{ $totalprice }}</th>
            </tr>
        </table>
    </div>
   <div class= tabledsg3>
          <h1> Proceed to Order</h1>

          <a href="{{ url('cash_order') }}" class="btn btn-success">Cash On Delivery</a>

          <a href="{{ url('stripe',$totalprice) }}" class="btn btn-success">Online Payment</a>

   </div>


      </div>
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
