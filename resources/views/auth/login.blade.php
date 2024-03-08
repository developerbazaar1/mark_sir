<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Sellers Friend</title>
        
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    </head>
    <body>
        
        <section>
            <div class="container-fluid min-vh-100">
                <div class="row main-row">
                    
                    <!-- 3d-image -->
                    <img src="{{ URL::asset('assets/images/3D.png') }}" alt="" class="d-img1 img-fluid position-fixed bottom-0">

                    <!-- logo and headings -->
                    <div class="col-md-3 side-heading">
                        <div class="login-heading">
                            <img src="{{ URL::asset('assets/images/logo.png') }}" alt="" class="logo-fix">
                            <h5 class="mt-5 text-white font-weight-normal">Improve Your <br>Product Imagery and Ads <br>with Precision Mockups.</h5>
                        </div>
                    </div>

                    <!-- Login page starts here -->
                    <div class="col-md-9 bg-white rounded-start-5 d-flex justify-content-center align-items-center flex-column min-vh-100 second-col">

                        <!-- 3d-image -->
                        <img src="{{ URL::asset('assets/images/login-page-img.png') }}"  class="d-img2 position-absolute top-0 end-0" alt="3d image">

                        <img src="{{ URL::asset('assets/images/logo.png') }}" alt="" class="mob-logo">
                        <div class="formText my-auto">
                            <h2 class="fw-semibold">Welcome Back!</h2>
                            <h6 class="lh-base">Log In To Your Account To Continue Your Creative Journey. We're <br>Excited To Have You Back!</h6>


                            

                            <!-- form -->
                            <form method="POST" action="{{ route('login') }}">
                            @if($message = Session::get('error'))
                                <small id="login_error" class="form-text validation">{{ $message }}</small>  
                            @endif

                            @csrf
                                <div class="form-group text-end inp-element">
                                  <!-- <small id="emailHelp" class="form-text validation">Incorrect ID. Please try again.</small> -->

                                    @error('email')
                                    <small id="emailHelp" class="form-text validation">{{ $message }}</small>  
                                    @enderror
                                  <input id="exampleInputEmail1" type="email" class="form-control px-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="User ID">

                                 

                                  
                                </div>
                                <div class="form-group text-end inp-element">
                                    <!-- <small id="passwordHelp" class="form-text validation">Incorrect Password. Please try again.</small> -->
                                   @error('password')
                                    <small id="passwordHelp" class="form-text validation">{{ $message }}</small> 
                                    @enderror 
                                  <input id="exampleInputPassword1" type="password" class="form-control px-0 @error('password') is-invalid @enderror" name="password" required placeholder="Password">

                                   
                                </div>
                
                                <button type="submit" class="btn btn-primary login-btn fw-semibold" >Login</button>
                                <div class="forget"><a href="{{ route('password.request') }}" id="ForgetPassword">Forget Password?</a></div>


                                <div class="access-page"><h6>Don’t Have An Account? </h6><a href="{{ route('register') }}">Request For Access</a></div>
                              </form>
                        </div>
                        <!-- login page footer -->
                        <div class="foot fw-semibold text-center text-spacing-5 sticky-md-bottom">
                            Report Error &nbsp;|&nbsp; Feedback &nbsp;|&nbsp; © Copyright 2024, All Rights Reserved &nbsp;|&nbsp; Build Version: 1.0.0
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/script.js') }}"></script>
        <script>
            // Wait for the DOM content to be fully loaded
            document.addEventListener('DOMContentLoaded', function() {
                // Get the element with the id 'login_error'
                var loginError = document.getElementById('login_error');

                // Check if the element exists
                if (loginError) {
                    // Set a timeout to hide the element after 1 minute (60000 milliseconds)
                    setTimeout(function() {
                        // Hide the element by setting its display style to 'none'
                        loginError.style.display = 'none';
                    }, 20000); // 1 minute in milliseconds
                }
            });

        </script>
        
    </body>
</html>


