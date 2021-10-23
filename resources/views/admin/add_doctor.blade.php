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

         <div class="container pt-5 " align="center">
          @if(session('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
              {{session('message')}}
        </div>
          @endif
           <form action="{{url('upload_doctor')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-4">
              <label>Doctor Name</label>
              <input type="text" style="color: black;" name="name" placeholder="name" required="">
            </div>
            <div class="mt-4">
              <label>Phone</label>
              <input type="number" style="color: black;" name="number" placeholder="number" required="">
            </div>
            <div class="mt-4">
              <label>Speciality</label>
              <select name="speciality" style="color: black; width: 200px;" required="" >
                <option>--Select--</option>
                <option value="skin">skin</option>
                <option value="heart">heart</option>
                <option value="eye">eye</option>
                <option value="nose">nose</option>
                
              </select>
            </div>
            <div class="mt-4">
              <label>Room No</label>
              <input type="text" style="color: black;" name="room" placeholder="room" required="">
            </div>
            <div class="mt-4">
              <label>Doctor Image</label>
              <input type="file" name="file" required="">
            </div>
            <div class="mt-4">
              
              <input type="submit" class="btn btn-success" required="">
            </div>
           </form>
         </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>