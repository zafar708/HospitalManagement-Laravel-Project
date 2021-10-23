<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
      label{
    display: inline-block; 
    width: 200px;
  }
  </style>
    @include('admin.css')
    
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

           <form action="{{url('update_doctor/'.$doctor->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-4">
              <label>Doctor Name</label>
              <input type="text" style="color: black;" name="name" value="{{$doctor->name}}">
            </div>
            <div class="mt-4">
              <label>Phone</label>
              <input type="number" style="color: black;" name="number" value="{{$doctor->phone}}">
            </div>
            <div class="mt-4">
              <label>Speciality</label>
              <input type="text" name="speciality" style="color: black; width: 200px;" value="{{$doctor->speciality}}">
            </div>
            <div class="mt-4">
              <label>Room No</label>
              <input type="text" style="color: black;" name="room" value="{{$doctor->room}}">
            </div>
            <div class="mt-4 flex">
              <label>Old Image</label>
              <img src="{{asset('doctorimage/'.$doctor->image)}}" alt="image" width="200px" height="200px">
            </div>
            <div class="mt-4">
              <label>change Image</label>
              <input type="file" name="file">
            </div>
            <div class="mt-4">
              
              <input type="submit" class="btn btn-success">
            </div>
           </form>
         </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>