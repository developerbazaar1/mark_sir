@extends('user.layouts.header')
@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/preview.css') }}">
    
@endsection
@section('content')
    
    <section>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="d-flex justify-content-start align-items-center flex-column min-vh-100"> 

                <div class="headText text-center w-100 d-flex align-items-center"> 
                    <!-- back button -->
                    <div class="back-btn text-start mb-3"><a href="{{ route('home')}}" class="text-decoration-none text-black"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M16.6665 9.375C16.8323 9.375 16.9912 9.44085 17.1084 9.55806C17.2257 9.67527 17.2915 9.83424 17.2915 10C17.2915 10.1658 17.2257 10.3247 17.1084 10.4419C16.9912 10.5592 16.8323 10.625 16.6665 10.625H8.95817V15C8.95806 15.1235 8.92135 15.2443 8.85266 15.3469C8.78398 15.4496 8.68641 15.5296 8.57227 15.5769C8.45814 15.6242 8.33256 15.6365 8.21139 15.6125C8.09022 15.5884 7.97891 15.529 7.8915 15.4417L2.8915 10.4417C2.77446 10.3245 2.70872 10.1656 2.70872 10C2.70872 9.83437 2.77446 9.67552 2.8915 9.55833L7.8915 4.55833C7.97891 4.47104 8.09022 4.4116 8.21139 4.38753C8.33256 4.36346 8.45814 4.37583 8.57227 4.42309C8.68641 4.47035 8.78398 4.55038 8.85266 4.65306C8.92135 4.75574 8.95806 4.87647 8.95817 5V9.375H16.6665Z" fill="black"/>
                      </svg><span class="back-btn-text">Back</span></a>
                    </div>   
                    <h2 class="fw-semibold mx-auto mb-0 pe-5">Preview Sent to Your Inbox</h2>
                </div>
                <div class="sub-heading d-flex flex-column  align-items-center">
                    <!-- <h6 class="lh-base">Where should we send your stunning mockup preview?</h6> -->
                    
  
                    <form action="{{ route('email-to-sent-link') }}" method="POST">
                        @csrf
                        <h6 class="lh-base text-center">Where should we send your stunning mockup preview?</h6>
                        <div class="checkbox-group">
                          <label class="custom-checkbox">
                              <input type="radio" name="showHide" value="hide" id="hideRadio">
                              <span class="checkmark"></span>   
                          </label>
                          <div>{{ Auth::user()->email}}</div>
                          <input type="hidden" name="email" value="{{ Auth::user()->email}}" >
                        </div>
                        <div class="checkbox-group">
                          <label class="custom-checkbox">
                            <input type="radio" name="showHide" value="show" id="showRadio">
                            <span class="checkmark"></span>
                          </label>
                          <div>Other Email Address</div>
                        </div>

                        @error('showHide')
                            <small id="nameHelp" class="form-text validation">{{ $message }}</small>
                        @enderror
                        @error('email')
                            <small id="nameHelp" class="form-text validation">{{ $message }}</small>
                        @enderror
                        @error('other_email')
                            <small id="nameHelp" class="form-text validation">{{ $message }}</small>
                        @enderror

                        <div class="form-group text-end inp-element formText">
                            <!-- <small id="emailHelp" class="form-text validation">Incorrect Name. Please try again.</small> -->
                            <input type="email" name="other_email" class="form-control px-0" id="access-email-check" aria-describedby="emailHelp" placeholder="Email Address">
                        </div>
                        <input type="hidden" name="auth_uniq_id" value="{{ $id }}" >
                        <button type="submit" class="btn btn-primary submit-btn fw-semibold">Submit</button>

                    </form>
                </div>
  
                
      
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered text-center">
                        <div class="modal-content modal-cont border-0">
                            <div class="modal-header border-bottom-0 p-0 justify-content-center">
                                <h4 class="modal-title m-0 fw-semibold" id="exampleModalLabel">Preview on the Way!</h4>
                            </div>
                            <div class="modal-body p-0 align-self-stretch">Mockup preview sent to [user's email]. Check your inbox or spam. Enjoy!</div>
                            <div class="modal-footer justify-content-center border-top-0 p-0">
                                <button type="button" class="btn btn-secondary okay-btn m-0 fw-semibold" data-bs-dismiss="modal" onclick="navigateTo('selection-page.html')">Back To Home</button>
                            </div>
                        </div>
                    </div>
                </div>  
              </div>
            </div>
          </div>
      </div>
    </section>
    

 
@endsection
@section('scripts')   
<script>
  $(document).ready(function() {
    // Initially hide the paragraph since the 'Hide' radio button is checked
    $('#access-email-check').hide();

    // Event listener for radio buttons
    $('input[name="showHide"]').change(function() {
      if ($(this).val() === 'show') {
        // Show the paragraph if 'Show' radio button is selected
        $('#access-email-check').show();
      } else {
        // Hide the paragraph if 'Hide' radio button is selected
        $('#access-email-check').hide();
      }
    });
  });
</script>
@endsection