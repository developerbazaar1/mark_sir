@extends('admin.layouts.header')
@section('styles')
    
@endsection
@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1>
            <i class="fa-light fa-users"></i> Total Users
          </h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
        
          <li class="breadcrumb-item active"><a href="{{ route('admin-users') }}">User Master</a></li>
        </ul>
    </div>
     @if($message = Session::get('success'))
         <div class="alert alert-success alert-dismissible fade show w-100 success_alert" role="alert">
           <strong>Success!</strong> {{ $message }}   
         </div>
     @endif
   <div class="row">
      <div class="col-md-12">
         <div class="tile">
            <div class="tile-body">
               <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="sampleTable">
                     <thead>
                        <tr>
                            <th>Sr. Number</th>
                            <th>Name</th>
                            <th>User id</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                     </thead>
                     <tbody>
                      @if(count($users) > 0)
                        @php
                             $sno = 1;
                        @endphp
                        @foreach($users as $user)
                        <tr>
                           <td>{{$sno}}</td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td>{{$user->created_at}}</td>
<!--                            <td>{{$user->access_status}}</td> -->
                           <td>
                              <div class="form-check form-switch">
                               <input data-id="{{$user->id}}" class="form-check-input toggle-class" type="checkbox" role="switch" id="flexSwitchCheckChecked" @php if($user->access_status == 'active'){ echo 'checked'; }  @endphp>
                              </div>
                           </td>
                           
                           <td class="">
                              <a href="#" class="delet-btn demoSwal" id="demoSwal" data-id="{{$user->id}}" data-uri="delete-user">
                                 <i class=" fa fa-trash-o dlt-icon" aria-hidden="true"></i>
                              </a>
                           </td>
                        </tr>
                      @php
                          $sno++;
                        @endphp
                       @endforeach
                      @endif
                        
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
   

 
@endsection
@section('scripts')     

<!-- Page specific javascripts-->
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
<!-- Data table plugin-->
<script type="text/javascript" src="{{ URL::asset('admin-assets/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin-assets/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js -->
"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<!-- Google analytics script-->
<script type="text/javascript">
  if(document.location.hostname == 'pratikborsadiya.in') {
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-72504830-1', 'auto');
    ga('send', 'pageview');
  }
</script>
<script>
 $("#sampleTable").on("click", ".demoSwal", function(){
//   $('.demoSwal').click(function(){

    var id = jQuery(this).attr('data-id');
    var uri = jQuery(this).attr('data-uri');
  var APP_URL = {!! json_encode(url('/')) !!}
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this data!",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    }, function(isConfirm) {
      if (isConfirm) {
        swal("Deleted!", "Your data has been deleted.", "success");
        window.location.href=APP_URL+"/admin/"+uri+"/"+id;
      } else {
        swal("Cancelled", "Your data is safe :)", "error");
      }
    });
  });
  
</script>

<script>

  $(function() {

    $('.toggle-class').change(function() {

        var status = $(this).prop('checked') == true ? 1 : 0; 

        var user_id = $(this).data('id'); 

        $.ajax({

            type: "GET",

            dataType: "json",

            url: "{{route('admin-changeuserStatus')}}",

            data: {'status': status, 'user_id': user_id},

            success: function(data){

              console.log(data.success)

            }

        });

    })

  })


</script>
@endsection
    