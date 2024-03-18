@extends('user.layouts.header')
@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/selection-page.css') }}">
@endsection
@section('content')

    <section>
        
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="d-flex justify-content-center align-items-center flex-column ">

              <div class="formText text-center mb-auto">    
                  <h2 class="fw-semibold">Your Visual Presence, Your Way</h2>
                  <h6 class="lh-base">See device specific mockups of your product imagery for online retail and <br>your ads on social media and publishers on the open web. <br>Select your site type and choose a specific website to recieve your <br>mockups</h6>
                  <!-- form -->
                   <form  method="POST" action="{{route('store-user-selected-site')}}">
                     @csrf
                    <div class="select-group h-40" style="width: 70%; margin: auto;">
                      <select name="sitetype" id="sitetype" class="form-control @error('sitetype') is-invalid @enderror">
                         <option label="Site Type" ></option>
                          @if(count($sitetypes) > 0)
                             @foreach($sitetypes as $sitetype)
                               @if ($sitetype->name ==  old('sitetype') )
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


                  <div class="select-group h-40 mt-3 mb-5" style="width: 70%; margin: auto;">
                      <select name="site" id="site" class="form-control @error('site') is-invalid @enderror">
                         <option label="Specific Site" ></option>
                          @if(count($sites) > 0)
                             @foreach($sites as $site)
                                @if (old('site') == $site->name)
                                   <option value="{{ $site->name }}" selected>{{ $site->name }}</option>
                                @else
                                   
                                @endif

                             @endforeach
                          @endif
                       </select>
                       @error('site')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                       @enderror
                  </div>

                  


                    <button type="submit" class="btn btn-primary submit-btn fw-semibold">Submit</button>
                  </form>
              </div>
   
          </div>
          </div>
        </div>
      </div>
            
    </section>

 
@endsection
@section('scripts')     
     <script>
        $(document).ready(function(){

            var option = '';
            option += "<option value=''>Select Site Type First</option>";
            $('#sitetype').change(function(){
            var id = $(this).val();
            
                $.ajax({
                    url: "{{url('getsites')}}/"+id,  
                    type: 'get',
                    
                    success: function(response){ 
                    var len = response.length;
                    var option = '';
                        if(len > 0){
                            for(var i=0; i<len; i++){
                                var id = response[i].id;
                                var name = response[i].name;
                                option += "<option value='"+name+"'>"+name+"</option>"; 
                            }
                            $("#site").html(option); 
                           //  $("#city_section").show();
                        }
                    }
                });
            });
        });
      </script>
@endsection