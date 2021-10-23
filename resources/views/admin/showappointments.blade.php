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
        <div class="mt-5 page-body-wrapper col-lg-12">

      <div class=" mt-5 table-responsive">
  	<div class="mt-2">
          @if(session('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
              {{session('message')}}
        </div>
          @endif
           
         </div>
    
    <table class="table table-bordered text-dark" id="appointments">
      <caption>All Appointments</caption>
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Doctor</th>
          <th>Date</th>
          <th>Number</th>
          <th>Message</th>
          <th>Status</th>
          <th>Approved</th>
          <th>Canceled</th>
          <th>Send Mail</th>

        </tr>
      </thead>
      <tbody>
        @foreach($appointments as $appointment)
        <tr>
        	<td>{{$appointment->name}}</td>
        	<td>{{$appointment->email}}</td>
          <td>{{$appointment->doctor}}</td>
          <td>{{$appointment->date}}</td>
          <td>{{$appointment->number}}</td>
          <td>{{$appointment->message}}</td>
          <td>{{$appointment->status}}</td>
          <td><a class="btn btn-success" onclick="return confirm('are you sure to approve the appointment status')" href="{{url('approve_appointment/'.$appointment->id)}}" title="">approve</a></td>
          <td><a class="btn btn-danger" onclick="return confirm('are you sure to cancel the appointment status')" href="{{url('statuscancel_appointment/'.$appointment->id)}}" title="">cancel</a></td>
          <td><a class="btn btn-primary" onclick="return confirm('are you sure to send the Mail')" href="{{url('email_view/'.$appointment->id)}}" title="">Send Mail</a></td>
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
              $('#appointments').DataTable();
             } );
    </script>
  </body>
</html>