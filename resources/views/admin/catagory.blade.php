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
      .div_center{
        text-align: center;
        padding-top: 35px;
      }

      .h2_head{
        font-size: 35px;
        padding-bottom: 40px;
      }

      .input_color{
        color:black;
      }

      .table{
        border: 2px solid white;
        margin:auto;
        text-align: center;
        font-size: large;
        margin-top: 10px;
        width: 50%;
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
          <div class= "div_center">
          @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

        <script>
    // Close the alert when the close button is clicked
    $('.alert .close').on('click', function(){
        $(this).parent().fadeOut();
    });
</script>

          <h2 class="h2_head">Add Catagory </h2>

          <form action="{{url('/add_catagory')}}" method="POST">
          @csrf
          <input class="input_color" type="text" name="catagory" placeholder="Write an Item Name">
          <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
          </form>
          <br>
          <br>


          <div class="table">
    <table >
    <thead>
      <tr>
        <th>SN</th>
        <th>Catagory</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($item as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->catagory_name}}</td>
        <td>
          <a  onclick="return confirm('Are you Sure To Delete')" href="{{url('delete_catagory',$item->id)}}'"> <button class="btn btn-danger">Delete</button></a>
        </td>
      </tr>
      @endforeach
    </tbody>
    </table>
  </div>
          
          </div>



          </div>
  </div>


 

    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>