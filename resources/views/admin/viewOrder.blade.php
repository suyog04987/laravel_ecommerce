<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Commerce Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
    <style>
      .title{
        text-align: center;
        font-weight: bolder;
        padding: 4px;
      }
      .table{
        border: 2px solid white;
        margin-top: 15px;
        width: 50%;
        
      }
      .head{
        background-color: blue;
        font-size: large;
        font-weight: bolder;
        color: black;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      
        <!-- partial:partials/_navbar.html -->
       @include('admin.navbar')
        <!-- partial -->
        
        <div class="main-panel">
          <div class="content-wrapper">

          <h1 class="title"> All Orders</h1>

          <table class="table">


            <tr class="head">
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Product Title</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Payment Status</th>
              <th>Delivery Status</th>
              <th>Image</th>
              <th>Action</th>
              <th>Delivery</th>
              
            </tr>

            @foreach($order as $data)
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->product_title}}</td>
                <td>{{$data->quantity}}</td>
                <td>${{$data->price}}</td>
                <td>{{$data->payment_status}}</td>
                <td>{{$data->delivery_status}}</td>
                <td><img src="/productImg/{{$data->image}}" alt="" class="img_size"></td>
                <td style="padding: 30px;"><a href="{{url('remove_order',$data->id)}}"> <button  onclick="return confirm('Are you Sure To Delete')" class="btn btn-danger">Remove</button></a></td>

                
                <td>
                @if($data->delivery_status=='processing')
                  <a href="{{url('delivery_status',$data->id)}}"><button class="btn btn-primary">Delivered</button></a>

                  @else

                  <p>Delivered</p>

                  @endif
                </td>
            </tr>

            @endforeach

          </table>

          

          </div>
        </div>

    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>