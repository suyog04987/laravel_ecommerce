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
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>E-Commers</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
   </head>

   <style>
    .center{
        margin: auto;
        width: 50%;
        text-align: center;
        padding: 30px;
    }

    table,th,td{
        border: 1px solid black;
    }
    .th_deg{
        background-color: skyblue;
        text-align: center;
        font-size: 20px;
        padding: 5px;
    }
    .img_size{
        width: 300px;
        height: auto;
      }
   </style>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
    
      <div class="center">
        <table>
            <tr>
                <th  class="th_deg">Product Title</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>
            <?php $totalPrice=0 ?>
            @foreach($cart as $data)
            <tr>
                <td>{{$data->product_title}}</td>
                <td>{{$data->quantity}}</td>
                <td>${{$data->price}}</td>
                <td><img src="/productImg/{{$data->image}}" alt="" class="img_size"></td>
                <td style="padding: 30px;"><a href="{{url('remove_cart',$data->id)}}"> <button  onclick="return confirm('Are you Sure To Delete')" class="btn btn-danger">Remove</button></a></td>
            </tr>
            <?php $totalPrice=$totalPrice+$data->price ?>
            @endforeach
        </table>
        <div style="padding-top: 30px;">
            <h1 style="font-weight: bold;"><span style="color: blue;">Total Price:</span> ${{$totalPrice}}</h1>
        </div>
      </div>
     
      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By  Suyog<br>
         
            Produced By Suyog Gautam
         
         </p>
      </div>
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>