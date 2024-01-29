<!DOCTYPE html>
<html>
   <head>
   <base href="/public">
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
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding:30px; ">
                     <div class="img-box">
                        <img src="/productImg/{{$detail->image}}" alt="">
                     </div>
                     <div class="detail-box" style="margin: auto; width:80%; padding:30px; ">
                        <h5>
                           {{$detail->title}}
                        </h5>
                        <h6>
                           ${{$detail->price}}
                        </h6>
                        <h6>Discount Amoun: ${{$detail->discount_price}}</h6>
                        <h6>Catagory: {{$detail->catagory}}</h6>
                        <h6>Descripton: {{$detail->description}}</h6>
                     </div>

                     <form action="{{url('add_cart',$detail->id)}}" method="post">
                           @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width:60px">
                                 </div>
                                 <div class="col-md-4">
                                    <input type="submit" value="Add To Cart">
                                 </div>
                              </div>

                           </form>
                  </div>
               </div>

        
      </div>
    
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