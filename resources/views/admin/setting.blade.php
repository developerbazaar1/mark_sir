@extends('admin.layouts.header')
@section('styles')
    
@endsection
@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1>
            <i class="fa fa-th-large"></i> Edit Site
          </h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
        
          <li class="breadcrumb-item active"><a href="{{ route('admin-sites') }}">Sites</a></li>
        </ul>
    </div>

    
     @if($message = Session::get('success'))
         <div class="alert alert-success alert-dismissible fade show w-100 success_alert" role="alert">
           <strong>Success!</strong> {{ $message }}
           
         </div>
     @endif

     @if($message = Session::get('error'))
          <div class="alert alert-danger alert-dismissible fade show w-100 success_alert" role="alert">
           <strong>Error!</strong> {{ $message }}
           
         </div>
     @endif
    <section class="Addpageform">
            <div class="tile">
                <div class="tile-body">
                    <div class=" cst-add-new-form row">
                        <!-- field col  start -->
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <img class="w-60" src="{{ URL::asset('assets/images/settings-animation.gif') }}">
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 d-flex">
                            <form class="admin-setting-form" style="margin:auto" method="POST" action="{{route('admin-setting-store')}}">
                                  @csrf
                                <label> <h2>Update Admin Login Detail</h2></label>
                                <div class="form-group">
                                    <label class="form-head" for="exampletext">
                                        PASSWORD
                                    </label>
                                    <input class="form-control  @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}" type="password"  placeholder="Enter password">
                                      
                                      @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-head" for="exampletext">
                                     CONFIRM PASSWORD
                                    </label>
                                    <input class="form-control  @error('confirm_password') is-invalid @enderror" name="password_confirmation" id="password_confirmation" type="password"  placeholder="Enter Confirm password">
                                      
                                      @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                    
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-info w-100" id="demoNotify">Submit chapter</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
    </section>
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
    // Wait for the DOM content to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Get the elements with the class name 'success_alert'
        var success_alerts = document.getElementsByClassName('success_alert');

        // Loop through each element with the class name 'success_alert'
        for (var i = 0; i < success_alerts.length; i++) {
            var success_alert = success_alerts[i];

            // Set a timeout to hide the element after 2 seconds (2000 milliseconds)
            setTimeout(function(alertElement) {
                // Hide the element by setting its display style to 'none'
                alertElement.style.display = 'none';
            }, 20000, success_alert); // 2 seconds in milliseconds
        }
    });
</script>


@endsection
    