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

     .div_center
     {
         text-align: center;
         padding-top: 60px;
     }

     .font_size
     {
         font-size: 60px;
         padding-bottom: 60px;
     }

     .txt
     {
         color:black;
         padding-bottom: 20px;
     }

    label{

        display: inline-block;
        width: 200px;
    }

    .div_design
    {
        padding-bottom: 20px;
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

                <div class="div_center">

                    @if (session()->has('message'))

                    <div style="align: center;" class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

                              {{ session()->get('message')}}

                    </div>

                    @endif

                <h1 class="font_size">Add Product</h1>

                  <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">

                   @csrf

                    <div class="div_design">

                    <label>Product Title :</label>
                      <input class="txt" type="text" name="title" placeholder="Write a title" required="">
                    </div>

                    <div class="div_design">
                        <label>Product Description :</label>
                          <input class="txt" type="text" name="description" placeholder="Write a description" required="">
                    </div>

                    <div class="div_design">
                        <label>Product Price :</label>
                          <input class="txt" type="number" name="price" placeholder="Write it's price" required="">
                    </div>

                    <div class="div_design">
                        <label>Discount Price :</label>
                          <input class="txt" type="number" name="discount_price" placeholder="Write a discount applied">
                    </div>

                    <div class="div_design">
                        <label>Product Quantity :</label>
                          <input class="txt" type="number" min="0" name="quantity" placeholder="Give the quantity" required="">
                    </div>

                    <div class="div_design">
                        <label>Product Catagory :</label>
                          <select class="txt" name="catagory" required="">
                              <option value="" selected="">Add a catagory here</option>

                              @foreach ($catagory as $catagory )
                              <option value="{{ $catagory->catagory_name }}">{{ $catagory->catagory_name }}</option>
                              @endforeach

                          </select>
                    </div>

                    <div class="div_design">
                        <label>Product Image  Here :</label>
                          <input type="file" name="image" required="" >
                    </div>

                        <div class="div_design">

                              <input type="submit"  value="Add Product" Class="btn btn-primary" >
                        </div>

                    </form>

                </div>

            </div>
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
      @include('admin.script')

  </body>
</html>
