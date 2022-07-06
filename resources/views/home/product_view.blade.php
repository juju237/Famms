<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">

        @if (session()->has('message'))

        <div style="align: center;" class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

                  {{ session()->get('message')}}

        </div>

        @endif

          <h2>
             Our <span>products</span>
          </h2>

       <div>


        <br><br>

        <form action="{{ url('search_product') }}" method="GET">
            @csrf

            <input style="width 500px;" type="text" name="search" placeholder="Search">

            <input type="submit" value="search">

        </form>

       </div>

       </div>
       <div class="row">

   @foreach($product as $products)


          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{ url('product_details',$products->id) }}" class="option1">
                      Product Details
                      </a>


                <form  action="{{ url('add_cart',$products->id) }}" method="POST">
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
                <div class="img-box">
                   <img src="product/{{ $products->image }}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      {{ $products->title }}
                   </h5>

                   @if ($products->discount_price!=null)

                    <h6 style="color:crimson">
                        Discount price
                      <br>
                        FCFA {{ $products->discount_price }}
                    </h6>

                   <h6 style="text-decoration: line-through; color:rgb(11, 246, 250) " >
                    Price
                    <br>
                    FCFA {{ $products->price }}
                   </h6>

                   @else

                   <h6 style="color:rgb(11, 246, 250)">
                    Price
                   <br>
                    FCFA {{ $products->price }}
                   </h6>

                   @endif
                </div>
             </div>
          </div>

          @endforeach

          <span style="padding-top:20px;">

          {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
           </span>
    </div>
 </section>
