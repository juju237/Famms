<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
   @include('admin.css')

   <style type="text/css">

       .title_dsg
       {
         text-align: center;
         font-size: 25px;
         font-weight: bold;
         padding-bottom: 25px;
         font-size: 20px;
       }

       .table_dsg
       {
        border: 2px hidden;
        width:90%;
        margin:auto;
        text-align: center;
        font-size: 20px;
       }

       .th_dsg
       {
        background:skyblue;
       }

       .img_size
       {
        height: 110px;
        width: 110px;
       }

   </style>
  </head>

  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

      <!-- partial -->
      @include('admin.header')

     <!-- partial -->
     <div class="main-panel">
        <div class="content-wrapper">

            <h1 class="title_dsg">ALL Orders</h1>

        <div style="padding-left:1370px; padding-bottom:30px; color:black;">

            <form action="{{ url('search') }}" method="get">

                @csrf
                <input type="text" name="search" placeholder="Search For Something">

                <input type="submit" value="Search" class="btn btn-outline-primary">

            </form>

        </div>

            <table class="table_dsg">

               <tr class="th_dsg">

                   <th style="padding: 5px; ">Name</th>
                   <th style="padding: 5px; ">Email</th>
                   <th style="padding: 5px; ">Address</th>
                   <th style="padding: 5px; ">Phone</th>
                   <th style="padding: 5px; ">Product Title</th>
                   <th style="padding: 5px; ">Quantity</th>
                   <th style="padding: 5px; ">Price</th>
                   <th style="padding: 5px; ">Payment Status</th>
                   <th style="padding: 5px; ">Delivery Status</th>
                   <th style="padding: 5px; ">Image</th>
                   <th style="padding: 5px; ">Delivered</th>
                   <th style="padding: 5px; ">Print PDF</th>
                   <th style="padding: 5px; ">Send Email</th>

               </tr>


               @forelse ($order as $order)


               <tr>

                <td style="padding: 5px;">{{ $order->name }}</td>
                <td style="padding: 5px;">{{ $order->email }}</td>
                <td style="padding: 5px;">{{ $order->address }}</td>
                <td style="padding: 5px;">{{ $order->phone}}</td>
                <td style="padding: 5px;">{{ $order->product_title }}</td>
                <td style="padding: 5px;">{{ $order->quantity }}</td>
                <td style="padding: 5px;">{{ $order->price }}</td>
                <td style="padding: 5px;">{{ $order->payment_status }}</td>
                <td style="padding: 5px;">{{ $order->delivery_status }}</td>

                <td>
                    <img class="img_size" src="/product/{{ $order->image  }}">
                </td>

                <td>

                @if($order->delivery_status=='processing')

                  <a href="{{url('delivered',$order->id) }}" onclick="return confirm('Are You Sure Product Was Delivered !!!')" class="btn btn-success">Delivered</a>

                @else

                 <p style="color:aquamarine">Delivered</p>

                 @endif

                </td>

                <td>
                    <a href="{{ url('print_pdf',$order->id) }}" class="btn btn-primary">Print PDF</a>
                </td>


                <td>

                    <a href="{{ url('send_email',$order->id) }}" class="btn btn-info" >Send Email</a>
                </td>


               </tr>

               @empty

               <tr colspan=16>
                <td>NO DATA FOUND</td>
               </tr>

               @endforelse

            </table>

        </div>
     </div>
     <!-- container-scroller -->

       <!-- plugins:js -->
      @include('admin.script')


  </body>
</html>
