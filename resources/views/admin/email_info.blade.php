<!DOCTYPE html>
<html lang="en">


  <head>

    <base href="/public">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    JS
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    JQuery
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   @include('admin.css')

   <style type="text/css">

   label
   {
     display: inline-block;
     width: 170px;
     font-size: 15px;
     font-weight: bold;
   }

   </style>

  </head>

  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

      <!-- partial -->
      @include('admin.header')

      <div class="main-panel">
        <div class="content-wrapper">

            @if (session()->has('message'))

            <div style="align: center;" class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

                      {{ session()->get('message')}}

            </div>

            @endif

            <h1 style="text-align: center; font-size:25px; ">Sent Email to {{ $order->email }}</h1>

            <form action="{{ url('send_user_email',$order->id) }}" method="POST">

            @csrf

            <div style="padding-left:35%; padding-top: 30px;">

                <label> Email Greeting: </label>

                <input style="color:black; " type="text" name="greeting">

            </div>

            <div style="padding-left:35%; padding-top: 30px;">

                <label> Email FirstLine: </label>

                <input style="color:black; type="text" name="firstline">

            </div>

            <div style="padding-left:35%; padding-top: 30px;">

                <label> Email Body: </label>

                <input style="color:black; type="text" name="body">

            </div>

            <div style="padding-left:35%; padding-top: 30px;">

                <label> Email Button name: </label>

                <input style="color:black; type="text" name="body">

            </div>

            <div style="padding-left:35%; padding-top: 30px;">

                <label> Email Url: </label>

                <input style="color:black;" type="text" name="url">

            </div>

            <div style="padding-left:35%; padding-top: 30px;">

                <label> Email Lastline: </label>

                <input style="color:black; style="color:black;type="text" name="lastline">

            </div>

            <div style="padding-left:35%; padding-top: 30px;">

                <input type="submit" value="Send Email" class="btn btn-primary">

            </div>


        </form>

        </div>
      </div>


    <!-- plugins:js -->
      @include('admin.script')


  </body>
</html>
