<!DOCTYPE html>
<html lang="en">
  <head>
    
    @include('admin.css')
    
    <!-- link for showing data table -->

  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    
  </head>
  <body>
    <div class="container-scroller bg-light">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

         


   <div class="container mt-5">
  	<div class="p-3">
          @if(session('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
              {{session('message')}}
        </div>
          @endif
           
         </div>

    <table class="table table-bordered text-dark" id="doctor">
      <caption>All Doctors</caption>
      <thead>
        <tr align="center">
          <th>Name</th>
          <th>Phone No.</th>
          <th>Speciality</th>
          <th>Room</th>
          <th>Image</th>
          <th>Delete</th>
          <th>Update</th>
         

        </tr>
      </thead>
      <tbody>
        @foreach($doctors as $doctor)
        <tr align="center">
        	<td>{{$doctor->name}}</td>
        	<td>{{$doctor->phone}}</td>
          <td>{{$doctor->speciality}}</td>
          <td>{{$doctor->room}}</td>
          <td> <img src="{{asset('doctorimage/'.$doctor->image)}}" alt="Doctor Iamge"> </td>
         <td><a class="btn btn-danger" onclick="return confirm('are you sure to Delete the doctor')" href="{{url('delete_doctor/'.$doctor->id)}}" title="">Delete</a></td>
          <td><a class="btn btn-primary" onclick="return confirm('are you sure to Update the doctor')" href="{{url('update_doctor/'.$doctor->id)}}" title="">Update</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

        <!-- Jquery library and function for showing data table -->
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script type="text/javascript">
           $(document).ready( function () {
              $('#doctor').DataTable();
             } );
    </script>

  </body>
</html>