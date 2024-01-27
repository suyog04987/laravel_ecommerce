<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')

    <style>
      .img_size{
        width: 300px;
        height: 300px;
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

          <div class="container">
            @foreach($newProduct as $product)
        <h2>{{ $product->title }}</h2>
        
        <div class="row">
            <div class="col-md-6">
                <img src="/productImg/{{$product->image}}" alt="{{ $product->title }}" class="img_size">
            </div>
            <div class="col-md-6">
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Category:</strong> {{ $product->category }}</p>
                <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                <p><strong>Price:</strong> ${{ $product->price }}</p>
                @if($product->discount_price)
                    <p><strong>Discount Price:</strong> ${{ $product->discount_price }}</p>
                @endif
            </div>
        </div>
        @endforeach

        <a href="{{ url('/view_product') }}" class="btn btn-primary">Back to Products</a>
    </div>


          </div>
        </div>
        
        

    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>