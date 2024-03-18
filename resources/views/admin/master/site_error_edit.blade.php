@extends('admin.layouts.header')
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>   
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
                             @if($message = Session::get('success'))
                                 <div class="alert alert-success alert-dismissible fade show w-100 success_alert" role="alert">
                                   <strong>Success!</strong> {{ $message }}   
                                 </div> 
                             @endif       
                            <form class="Add-page-form w-auto " method="POST" action="{{route('admin-site-error-update')}}">
                              @csrf
                              
                              


                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Site Type </label>
                                      <input class="form-control  @error('site_type') is-invalid @enderror" name="site_type" value="@if(!empty($site->site_type)){{old('site_type', $site->site_type)}}@endif" id="site_type" type="text"  placeholder="Enter Name" readonly>
                                      
                                      @error('site_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Asset Type </label>
                                      <input class="form-control  @error('asset_type') is-invalid @enderror" name="asset_type" value="@if(!empty($site->asset_type)){{old('asset_type', $site->asset_type)}}@endif" id="asset_type" type="text"  placeholder="Enter Name" readonly>
                                      
                                      @error('asset_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                            
                            @if($site->asset_type == 'image')   
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Device Type </label>
                                      <input class="form-control  @error('device_type') is-invalid @enderror" name="device_type" value="@if(!empty($site->device_type)){{old('device_type', $site->device_type)}}@endif" id="device_type" type="text"  placeholder="Enter Name" readonly>
                                      
                                      @error('device_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Maximum Width</label>
                                      <input class="form-control  @error('max_width') is-invalid @enderror" name="max_width" value="@if(!empty($site->max_width)){{old('max_width', $site->max_width)}}@endif" id="max_width" type="number"  placeholder="Enter Name" >
                                      
                                      @error('max_width')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Maximum Height</label>
                                      <input class="form-control  @error('max_height') is-invalid @enderror" name="max_height" value="@if(!empty($site->max_height)){{old('max_height', $site->max_height)}}@endif" id="max_height" type="number"  placeholder="Enter Name" >
                                      
                                      @error('max_height')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Minimum Width</label>
                                      <input class="form-control  @error('width') is-invalid @enderror" name="width" value="@if(!empty($site->width)){{old('width', $site->width)}}@endif" id="width" type="number"  placeholder="Enter Name" >
                                      
                                      @error('width')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Minimum Height</label>
                                      <input class="form-control  @error('height') is-invalid @enderror" name="height" value="@if(!empty($site->height)){{old('height', $site->height)}}@endif" id="height" type="number"  placeholder="Enter Name" >
                                      
                                      @error('height')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                            @endif  
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Dimentions</label>
                                      <input class="form-control  @error('dimentions') is-invalid @enderror" name="dimentions" value="@if(!empty($site->dimentions)){{old('dimentions', $site->dimentions)}}@endif" id="dimentions" type="text"  placeholder="Enter Name" >
                                      
                                      @error('dimentions')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Ratio</label>
                                      <input class="form-control  @error('ratio') is-invalid @enderror" name="ratio" value="@if(!empty($site->ratio)){{old('ratio', $site->ratio)}}@endif" id="ratio" type="text"  placeholder="Enter Name" >
                                      
                                      @error('ratio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div style="margin: 20px auto; background: aliceblue; padding: 10px 20px;">
                                        <h6>KB to Bytes Converter</h6>
                                        <label for="kb">Enter KB:</label>
                                        <input type="number" id="kb" name="kb" oninput="convertToBytes()">
                                        <p id="bytes">Bytes will be shown here.</p>
                                  </div>
                                    
    
                                  <div class="form-group">
                                      <label class="form-head">Maximum Size <strong>(Express size in bytes only, optionally can use converter to convert KB to Bytes)</strong></label>
                                      <input class="form-control  @error('max_size') is-invalid @enderror" name="max_size" value="@if(!empty($site->max_size)){{old('max_size', $site->max_size)}}@endif" id="max_size" type="text"  placeholder="Enter Name" >
                                      
                                      @error('max_size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Maximum number</label>
                                      <input class="form-control  @error('max_no') is-invalid @enderror" name="max_no" value="@if(!empty($site->max_no)){{old('max_no', $site->max_no)}}@endif" id="max_no" type="number"  placeholder="Enter Name" >
                                      
                                      @error('max_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Minimum number</label>
                                      <input class="form-control  @error('min_no') is-invalid @enderror" name="min_no" value="@if(!empty($site->min_no)){{old('min_no', $site->min_no)}}@endif" id="min_no" type="number"  placeholder="Enter Name" >
                                      
                                      @error('min_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">File Format  <strong>(Add format like: JPG JPEG PNG (separate with one space only))</strong></label>
                                      <input class="form-control  @error('file_formate') is-invalid @enderror" name="file_formate" value="@if(!empty($site->file_formate)){{old('file_formate', $site->file_formate)}}@endif" id="file_formate" type="text"  placeholder="Enter Name" >
                                      
                                      @error('file_formate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
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
<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>

<script>
    function convertToBytes() {
        var kb = document.getElementById("kb").value;
        var bytes = kb * 1024;
        document.getElementById("bytes").innerHTML = bytes + " bytes";
    }
</script>

@endsection
    