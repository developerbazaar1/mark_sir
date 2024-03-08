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
                             @if($message = Session::get('success_add'))
                                 <div class="alert alert-success alert-dismissible fade show w-100 success_alert" role="alert">
                                   <strong>Success!</strong> {{ $message }}   
                                 </div> 
                             @endif       
                            <form class="Add-page-form w-auto " method="POST" action="{{route('admin-site-update')}}">
                              @csrf
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Asset Type Number(Example: Image => 1, Image and Video => 2)</label>
                                      <select name="asset_type_no" id="asset_type_no" class="form-control @error('asset_type_no') is-invalid @enderror">
                                           <option label="Select Asset Type No" ></option>
                                           
                                              
                                                 @if ($site->asset_type_no == 1 )
                                                     <option value="1" selected>1</option>
                                                 @else
                                                     <option value="1" >1</option>
                                                 @endif

                                                 @if ($site->asset_type_no == 2 )
                                                     <option value="2" selected>2</option>
                                                 @else
                                                     <option value="2" >2</option>
                                                 @endif

                                                 @if ($site->asset_type_no == 3 )
                                                     <option value="3" selected>3</option>
                                                 @else
                                                     <option value="3" >3</option>
                                                 @endif
                                           
                                           
                                         </select>
                                         @error('asset_type_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror

                                    
                                  </div>
                              </div>



                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Asset Type (Example: Image, Video)</label>
                                      <input class="form-control  @error('asset_type') is-invalid @enderror" name="asset_type" value="@if(!empty($site->asset_type)){{old('asset_type', $site->asset_type)}}@endif" id="asset_type" type="text"  placeholder="Enter Name">
                                      
                                      @error('asset_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>

                              <h6 class="mt-4">Image Validations</h6>
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Image Max size</label>
                                      <input class="form-control  @error('image_max_size') is-invalid @enderror" name="image_max_size" value="@if(!empty($site->image_max_size)){{old('image_max_size', $site->image_max_size)}}@endif" id="image_max_size" type="text"  placeholder="Enter Name">
                                      
                                      @error('image_max_size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Image Min size</label>
                                      <input class="form-control  @error('image_min_size') is-invalid @enderror" name="image_min_size" value="@if(!empty($site->image_min_size)){{old('image_min_size', $site->image_min_size)}}@endif" id="image_min_size" type="text"  placeholder="Enter Name">
                                      
                                      @error('image_min_size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Image Ratio (Example: 1.91 to 1.1)</label>
                                      <input class="form-control  @error('image_ratio') is-invalid @enderror" name="image_ratio" value="@if(!empty($site->image_ratio)){{old('image_ratio', $site->image_ratio)}}@endif" id="image_ratio" type="text"  placeholder="Enter Name">
                                      
                                      @error('image_ratio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Image Dimention width*height (Example: 1080*1080, 750*650)</label>
                                      <input class="form-control  @error('image_dim_width_height') is-invalid @enderror" name="image_dim_width_height" value="@if(!empty($site->image_dim_width_height)){{old('image_dim_width_height', $site->image_dim_width_height)}}@endif" id="image_dim_width_height" type="text"  placeholder="Enter Name">
                                      
                                      @error('image_dim_width_height')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Image File formate (Example: jpg, png)</label>
                                      <input class="form-control  @error('image_file_formate') is-invalid @enderror" name="image_file_formate" value="@if(!empty($site->image_file_formate)){{old('image_file_formate', $site->image_file_formate)}}@endif" id="image_file_formate" type="text"  placeholder="Enter Name">
                                      
                                      @error('image_file_formate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>

                              <h6 class="mt-4">Video Validations</h6>
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Video Max size</label>
                                      <input class="form-control  @error('video_max_size') is-invalid @enderror" name="video_max_size" value="@if(!empty($site->video_max_size)){{old('video_max_size', $site->video_max_size)}}@endif" id="video_max_size" type="text"  placeholder="Enter Name">
                                      
                                      @error('video_max_size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Video Min size</label>
                                      <input class="form-control  @error('video_min_size') is-invalid @enderror" name="video_min_size" value="@if(!empty($site->video_min_size)){{old('video_min_size', $site->video_min_size)}}@endif" id="video_min_size" type="text"  placeholder="Enter Name">
                                      
                                      @error('video_min_size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Video Ratio (Example: 1.91 to 1.1)</label>
                                      <input class="form-control  @error('video_ratio') is-invalid @enderror" name="video_ratio" value="@if(!empty($site->video_ratio)){{old('video_ratio', $site->video_ratio)}}@endif" id="video_ratio" type="text"  placeholder="Enter Name">
                                      
                                      @error('video_ratio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Video Dimention width*height (Example: 1080*1080, 750*650)</label>
                                      <input class="form-control  @error('video_dim_width_height') is-invalid @enderror" name="video_dim_width_height" value="@if(!empty($site->video_dim_width_height)){{old('video_dim_width_height', $site->video_dim_width_height)}}@endif" id="video_dim_width_height" type="text"  placeholder="Enter Name">
                                      
                                      @error('video_dim_width_height')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3">
                                  <div class="form-group">
                                      <label class="form-head">Video File formate (Example: jpg, png)</label>
                                      <input class="form-control  @error('video_file_formate') is-invalid @enderror" name="video_file_formate" value="@if(!empty($site->video_file_formate)){{old('video_file_formate', $site->video_file_formate)}}@endif" id="video_file_formate" type="text"  placeholder="Enter Name">
                                      
                                      @error('video_file_formate')
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



@endsection
    