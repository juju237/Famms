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

        .h2_font
              {
                  font-size: 60px;
                  padding-bottom: 40px;
              }

        .input_color
        {
            color: black;

        }

        .tablecenter
        {
            margin: auto;
            width: 60%;
            text-align: center;
            margin-top: 30px;
            border: 2px hidden rgb(199, 207, 214);
            font-size: 30px;
            border-radius: 10px;
        }
  td{
    border: 2px hidden rgb(255, 255, 255);
    border-radius: 10px;
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

            <div class="div_center">

                <h2 class="h2_font">ADD CATAGORY</h2>

              <form action="{{ url('/add_catagory') }}" method="POST">
             @csrf

              <input class="input_color" type="text" name="catagory" placeholder="Write catagory name">

            <input type="submit" class="btn btn-primary" name="submit" value="Add catagory">
            </form>


            </div>

            <table class="tablecenter">
                <tr style="background-color: skyblue">
                    <td>Category Name</td>
                    <td>Action</td>
                </tr>


                @foreach ($data as $data)

                <tr>
                    <td>{{ $data->catagory_name }}</td>
                    <td>
                        <a onclick="return confirm('Are You Sure To DELETE')" class="btn btn-danger" href="{{ url('delete_catagory',$data->id) }}">DELETE</a>
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
