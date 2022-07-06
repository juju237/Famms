<!DOCTYPE html>
<html lang="en">
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



    </head>
   <body>
      <div class="hero_area">

         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->

      <div class="col-sm-6 col-md-4 col-lg-4" style=" margin: auto; position: absolute; top:10%; left: 43%; padding:30px ">

           <div class="img-box" style="padding: 20px">
              <img src="/product/{{ $product->image }}" alt="">
           </div>
           <div class="detail-box">
              <h5>
                <b>
                 {{ $product->title }}
                </b>
              </h5>

              @if ($product->discount_price!=null)

               <h6 style="color:crimson">
                   <b>Discount price</b>
                 <br>
                   <b>FCFA</b> {{ $product->discount_price }}
               </h6>

              <h6 style="text-decoration: line-through; color:rgb(11, 246, 250) " >
               <b>Price</b>
               <br>
               FCFA {{ $product->price }}
              </h6>

              @else

              <h6 style="color:rgb(11, 246, 250)">
               <b>Price</b>
              <br>
               <b>FCFA</b> {{ $product->price }}
              </h6>

              @endif

               <h5><b>Product Catagory</b> : {{ $product->catagory }}</h5>

               <h5><b>Product Details</b> : {{ $product->description }}</h5>

               <h5><b>Available Quantity</b> : {{ $product->quantity }}</h5>

               <form  action="{{ url('add_cart',$product->id) }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-4">
                       <input type="number" name="quantity" min="1" value="1" style="width: 100px">
                    </div>
                      <br>
                    <div class="col-md-4">
                       <input type="submit" value="Add to Cart">
                    </div>

                </div>
            </form>

           </div>
        </div>
     </div>

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Famms</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">JUJU Sarl.</a>
         </p>

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
