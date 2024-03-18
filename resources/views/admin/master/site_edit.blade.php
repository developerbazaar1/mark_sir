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

    

    <section class="Addpageform">
            <div class="tile">
                <div class="tile-body">
                    <div class=" cst-add-new-form row">
                        <!-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <img class="w-100" src="{{ URL::asset('assets/images/terms-page.jpg') }}">
                        </div> -->
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                             @if($message = Session::get('success_add'))
                                 <div class="alert alert-success alert-dismissible fade show w-100 success_alert" role="alert">
                                   <strong>Success!</strong> {{ $message }}   
                                 </div>
                             @endif
                            <form class="Add-page-form w-auto " method="POST" action="{{route('admin-site-update')}}">
                              @csrf
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Site Type Name</label>
                                      <input class="form-control  @error('name') is-invalid @enderror" name="name" value="@if(!empty($site->name)){{old('name', $site->name)}}@endif" id="name" type="text"  placeholder="Enter Name">
                                      
                                      @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                        <label class="form-head" for="exampletext">
                                            Site Types
                                        </label>
                                        <div class="select-group h-40">
                                            <select name="sitetype" id="sitetype" class="form-control @error('sitetype') is-invalid @enderror">
                                               <option label="Select Site Type" ></option>
                                                @if(count($sitetypes) > 0)
                                                   @foreach($sitetypes as $sitetype)
                                                     @if ($sitetype->name ==  $site->type )
                                                         <option value="{{ $sitetype->name }}" selected>{{ $sitetype->name }}</option>
                                                     @else
                                                         <option value="{{ $sitetype->name }}" >{{$sitetype->name}}</option>
                                                     @endif
                                                   @endforeach
                                                @endif
                                             </select>
                                             @error('sitetype')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>
                                    </div>
                                </div>

                              <input type="hidden" name="site_id" value="{{$site->id}}">
                              <div class="form-group text-center">
                                <button type="submit" class="btn btn-info mt-2 w-50" id="demoNotify"><i
                                            class="fa-solid fa-paper-plane mx-2"></i>Submit</button>
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



@endsection
    