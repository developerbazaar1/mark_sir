@extends('user.layouts.header')
@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/manage-acc.css') }}">
@endsection
@section('content')

    <section>
      <div class="container">
        <div class="d-flex justify-content-start align-items-center flex-column">

            <div class="row w-100">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="headText text-center w-100 d-flex align-items-center"> 
                  <!-- back button -->
                  <div class="back-btn text-start mb-3"><a href="{{ route('user-dashboard') }}" class="text-decoration-none text-black"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                      <path d="M16.6665 9.375C16.8323 9.375 16.9912 9.44085 17.1084 9.55806C17.2257 9.67527 17.2915 9.83424 17.2915 10C17.2915 10.1658 17.2257 10.3247 17.1084 10.4419C16.9912 10.5592 16.8323 10.625 16.6665 10.625H8.95817V15C8.95806 15.1235 8.92135 15.2443 8.85266 15.3469C8.78398 15.4496 8.68641 15.5296 8.57227 15.5769C8.45814 15.6242 8.33256 15.6365 8.21139 15.6125C8.09022 15.5884 7.97891 15.529 7.8915 15.4417L2.8915 10.4417C2.77446 10.3245 2.70872 10.1656 2.70872 10C2.70872 9.83437 2.77446 9.67552 2.8915 9.55833L7.8915 4.55833C7.97891 4.47104 8.09022 4.4116 8.21139 4.38753C8.33256 4.36346 8.45814 4.37583 8.57227 4.42309C8.68641 4.47035 8.78398 4.55038 8.85266 4.65306C8.92135 4.75574 8.95806 4.87647 8.95817 5V9.375H16.6665Z" fill="black"/>
                    </svg><span class="back-btn-text">Back</span></a>
                  </div>  
                  <h2 class="fw-semibold mx-auto mb-0">Manage Your Account</h2>
              </div>
                <div class="sub-heading text-center">
                  <h6 class="lh-base">Fine-tune your experience. Personalize your account settings, update <br>information, and ensure your preferences match your creative needs. <br>Your account, your way.</h6>
                </div>
              </div>
            </div>

              
            
       

          <form action="{{ route('user-update-profile') }}" method="POST" class="w-100 p-3">

                @if($message = Session::get('success'))
                   <div class="alert alert-success alert-dismissible fade show w-100 success_alert" role="alert">
                     <strong>Success!</strong> {{ $message }}
                     
                   </div>
               @endif

               @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                     <strong>Error!</strong> {{ $message }}
                     
                   </div>
               @endif

                @csrf
                <div class="row">
                    <!-- Personal Info Section -->
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="formText my-auto px-5">
                            <span class="h6 fw-semibold">Personal Info:</span>
                            <div class="form-group text-end inp-element">
                                
                                @error('name')
                                    <small id="nameHelp" class="form-text validation">{{ $message }}</small>
                                @enderror
                                <input type="text" name="name" class="form-control px-0 @error('name') is-invalid @enderror" id="access-name" value="{{ old('name') ?? $user->name ?? '' }}" placeholder="Name">
                            </div>
                            <div class="form-group text-end inp-element">
                                
                                @error('email')
                                    <small id="emailHelp" class="form-text validation">{{ $message }}</small>
                                @enderror
                                <input type="email" name="email" class="form-control px-0 @error('email') is-invalid @enderror" id="access-mail"  value="{{ old('email') ?? $user->email ?? '' }}" placeholder="Email Address" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- Change Password Section -->
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="formText my-auto px-5">
                            <span class="h6 fw-semibold">Change Password:</span>
                            <div class="form-group text-end inp-element">
                                @error('current_password')
                                    <small id="passwordHelp" class="form-text validation">{{ $message }}</small>
                                @enderror
                                <input type="password" name="current_password" class="form-control px-0 @error('current_password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Current Password">
                                
                            </div>
                            <div class="form-group text-end inp-element">
                                @error('new_password')
                                    <small id="newPasswordHelp" class="form-text validation">{{ $message }}</small>
                                @enderror
                                <input type="password" name="new_password" class="form-control px-0 @error('new_password') is-invalid @enderror" id="exampleInputPassword11" placeholder="New Password">
                                
                            </div>
                            <div class="form-group text-end inp-element">
                                @error('confirm_password')
                                    <small id="confirmPasswordHelp" class="form-text validation">{{ $message }}</small>
                                @enderror
                                <input type="password" name="confirm_password" class="form-control px-0 @error('confirm_password') is-invalid @enderror" id="exampleInputPassword111" placeholder="Confirm New Password">
                                
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                        <button type="submit" class="btn btn-primary submit-btn fw-semibold mx-auto">Save Changes</button>
                    </div>
                </div>
            </form>


             <!-- Modal -->
             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-dialog-centered text-center">
                     <div class="modal-content modal-cont border-0">
                         <div class="modal-header border-bottom-0 p-0 justify-content-center">
                             <h4 class="modal-title m-0 fw-semibold" id="exampleModalLabel">Changes Saved Successfully</h4>
                         </div>
                         <div class="modal-body p-0 align-self-stretch">Your profile settings have been updated successfully. Enjoy your personalized experience! If you have any further adjustments, feel free to modify them anytime.</div>
                         <div class="modal-footer justify-content-center border-top-0 p-0">
                             <button type="button" class="btn btn-secondary okay-btn m-0 fw-semibold" data-bs-dismiss="modal" onclick="navigateTo('selection-page.html')">Continue</button>
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