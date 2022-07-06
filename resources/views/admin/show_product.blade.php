<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    JS
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    JQuery
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
   @include('admin.css')

    <style type="text/css">

    .tablecenter
    {
      margin:auto;
      width: 50%;
      border: 2px hidden white;
      text-align: center;
      margin-top: 40px;
      font-size: 30px;

    }

    th, td {
     border: 1px hidden rgb(243, 242, 242);
           }

    .font_size
    {
        text-align: center;
        font-size: 40px;
        padding-top:20px;
    }

    .img_size
    {
        width: 150px;
        height: 150px;
    }

    .th_color
    {
        background: skyblue;
    }

    .th_deg
    {
        padding: 30px;
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

                @if (session()->has('message'))

                <div style="align: center;" class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

                          {{ session()->get('message')}}

                </div>

                @endif

                <div style="padding-left:1370px; padding-bottom:30px; color:black;">

                    <form action="{{ url('') }}" method="get">

                        @csrf
                        <input type="text" name="search" placeholder="Search For Something">

                        <input type="submit" value="Search" class="btn btn-outline-primary">

                    </form>

                </div>

   <h2 class="font_size">All Products</h2>

  <table class="tablecenter">
         <tr class="th_color">
             <th class="th_deg">Description</th>
             <th class="th_deg">Quantity</th>
             <th class="th_deg">Product title</th>
             <th class="th_deg">Catagory</th>
             <th class="th_deg">Price</th>
             <th class="th_deg">Discount Price</th>
             <th class="th_deg">Product Image</th>
             <th class="th_deg">Edit Product</th>
             <th class="th_deg">Delete Product</th>
         </tr>


         @foreach ($product as $product )


         <tr>
             <td>{{ $product->title }}</td>
             <td>{{ $product->description }}</td>
             <td>{{ $product->quantity }}</td>
             <td>{{ $product->catagory }}</td>
             <td>{{ $product->price }}</td>
             <td>{{ $product->discount_price }}</td>

             <td>
                 <img class="img_size" src="/product/{{ $product->image }}">
             </td>

             <td>
                <a class="btn btn-success" href="{{ url('update_product',$product->id) }}">Edit Product</a>
             </td>
             <td>
                <a class="btn btn-danger" onclick="return  confirm(Are You Sure To Delete)" href="{{ url('delete_product',$product->id) }}">Delete Product</a>
             </td>
         </tr>

         @endforeach
  </table>
            </div>
        </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
      @include('admin.script')


  </body>
</html>
