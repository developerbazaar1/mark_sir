<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/forget-pass.css') }}">
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="d-flex justify-content-center align-items-center flex-column min-vh-100">

                        <div class="logo"><img src="{{ URL::asset('assets/images/logo-rq.png') }}" alt=""></div>
        
                        <!-- 3d-image -->
                        <img src="{{ URL::asset('assets/images/login-page-img.png') }}"  class="d-img position-absolute top-0 end-0" alt="3d image">
                        <img src="{{ URL::asset('assets/images/photo.png') }}" class="d-img position-absolute start-0 bottom-0" alt="">
        
                        <div class="formText my-auto text-center">
        
                            <!-- back button -->
                            <div class="back-btn text-start mb-3"><a href="{{ route('login') }}" class="text-decoration-none text-black"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M16.6665 9.375C16.8323 9.375 16.9912 9.44085 17.1084 9.55806C17.2257 9.67527 17.2915 9.83424 17.2915 10C17.2915 10.1658 17.2257 10.3247 17.1084 10.4419C16.9912 10.5592 16.8323 10.625 16.6665 10.625H8.95817V15C8.95806 15.1235 8.92135 15.2443 8.85266 15.3469C8.78398 15.4496 8.68641 15.5296 8.57227 15.5769C8.45814 15.6242 8.33256 15.6365 8.21139 15.6125C8.09022 15.5884 7.97891 15.529 7.8915 15.4417L2.8915 10.4417C2.77446 10.3245 2.70872 10.1656 2.70872 10C2.70872 9.83437 2.77446 9.67552 2.8915 9.55833L7.8915 4.55833C7.97891 4.47104 8.09022 4.4116 8.21139 4.38753C8.33256 4.36346 8.45814 4.37583 8.57227 4.42309C8.68641 4.47035 8.78398 4.55038 8.85266 4.65306C8.92135 4.75574 8.95806 4.87647 8.95817 5V9.375H16.6665Z" fill="black"/>
                            </svg>Back</a></div>
                            <h2 class="fw-semibold">Forgot Your Password?</h2>
                            <h6 class="lh-base">No worries – it happens to the best of us. Enter your email address <br>below, and we'll send you a link to reset your password.</h6>
        
                            <!-- form -->
                            <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                                <div class="form-group text-end inp-element">
                                    @error('email')
                                        <small id="passwordHelp" class="form-text validation">{{ $message }}</small>
                                    @enderror
                                    
                                    <input id="access-mail" type="email" class="form-control @error('email') is-invalid @enderror px-0" name="email" value="{{ old('email') }}" placeholder="Email Address" required >

                                    

                                </div>
                                
                                <!-- Button trigger modal -->
                                <button type="submit" class="btn btn-primary submit-btn fw-semibold">Submit</button>
            
            
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content modal-cont border-0">
                                                <div class="modal-header border-bottom-0 p-0 justify-content-center">
                                                    <h4 class="modal-title m-0 fw-semibold" id="exampleModalLabel">Password Reset Request Sent</h4>
                                                </div>
                                                <div class="modal-body p-0 align-self-stretch">Password reset instructions will be sent to your email shortly. Check your inbox, and if not found, please check your spam folder. Thank you!</div>
                                                <div class="modal-footer justify-content-center border-top-0 p-0">
                                                    <button type="button"  class="btn btn-secondary okay-btn m-0 fw-semibold" data-bs-dismiss="modal" >Okay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <!-- login page footer -->
        <div class="foot fw-semibold text-center text-spacing-5 fixed-bottom">
            Report Error &nbsp;|&nbsp; Feedback &nbsp;|&nbsp; © Copyright 2024, All Rights Reserved &nbsp;|&nbsp; Build Version: 1.0.0
        </div>
    </footer>


    <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/script.js') }}"></script>
    <script>
        // JavaScript to show the modal
        window.onload = function() {
            // Check if the session has the success message
            @if(session()->has('status'))
                // Show the modal
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();
            @endif
        }
    </script>
</body>
</html>

