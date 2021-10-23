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
           <form action="{{url('send_mail/'.$appoint_id->id)}}" method="post">
            @csrf
            <div class="mt-4">
              <label>Greeting</label>
              <input type="text" style="color: black;" name="greeting" required="">
            </div>
            <div class="mt-4">
              <label>Body</label>
              
              <textarea name="body" style="color: black;"></textarea>
            </div>
            
            <div class="mt-4">
              <label>Action Text</label>
              <input type="text" style="color: black;" name="actiontext" required="">
            </div>
           <div class="mt-4">
              <label>Action Url</label>
              <input type="text" style="color: black;" name="actionurl" required="">
            </div>
            <div class="mt-4">
              <label>End Part</label>
              <input type="text" style="color: black;" name="endpart" required="">
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