<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
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

          <!-- body part -->
    <div class="container">
        <h2>Add Product</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{ url('add_product') }}" method="POST"   enctype="multipart/form-data" style="max-width: 500px; margin: auto;">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" style="color: black;" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" style="color: black;" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="form-control" style="color: black;" required>
            </div>

            <div class="form-group">
                <label for="discount_price">Discount Price:</label>
                <input type="number" name="discount_price" id="discount_price" class="form-control" style="color: black;">
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" style="color: black;" required>
            </div>

            <div class="form-group">
                <label for="catagory">Catagory:</label>
                <select name="catagory" class="form-control" style="color: white;">
                    <option value="" selected="">Add a Catagory</option>
                    @foreach($items as $item)
                    <option>{{$item->catagory_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control-file"  accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>




          </div>
        </div>
     

    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>