
@if (Route::has('login'))
   
        @auth

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Selection Page</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css') }}">
                <link rel="stylesheet" href="{{ URL::asset('assets/css/selection-page.css') }}">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            </body>
            </head>
            <body>

                <header>
                  <!-- navbar -->
                  <nav class="navbar w-100 bg-white fixed-top">
                    <div class="container nav-content">
                      <a class="navbar-brand flex-grow-1 logo-img" href="#">
                        <img src="{{ URL::asset('assets/images/logo-rq.png') }}" alt="Logo" class="d-inline-block align-text-top">
                      </a>
                      <h5 class="nav-text fw-semibold text-end m-0 lh-1">
                        Hi, @auth {{ Auth::user()->name }} @endauth<br><span class="h6"><strong>Billing Period:</strong> 10 Days Remain</span>
                      </h5>
                      <div class="dropstart">
                        <a class="navbar-brand m-0 user-img"  data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{ URL::asset('assets/images/user-logo.png') }}" alt="Logo" class="d-inline-block align-text-top" width="50" height="50">
                          <ul class="dropdown-menu nav-drop p-0">
                            <li><a class="dropdown-item itm-2 fw-semibold" href="{{ route('user-setting') }}">Account Setting<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M21.718 9.12695L18.918 8.00695L19.348 5.01995L14.372 2.14795L12.001 4.01395L9.62898 2.14795L4.65298 5.01995L5.08298 8.00695L2.28198 9.12695V14.8729L5.08398 15.9939L4.65398 18.9789L9.62998 21.8519L12.001 19.9869L14.371 21.8519L19.347 18.9789L18.917 15.9929L21.718 14.8729V9.12695Z" fill="#001F3F"/>
                              <path d="M8.06274 12C8.06274 14.171 9.82874 15.937 11.9997 15.937C14.1707 15.937 15.9377 14.171 15.9377 12C15.9377 9.82901 14.1707 8.06201 11.9997 8.06201C9.82874 8.06201 8.06274 9.82901 8.06274 12Z" fill="#001F3F"/>
                            </svg></a></li>
                            <li>
                              <a class="dropdown-item itm-2 fw-semibold text-end" href="{{ route('logout') }}" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">Logout
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                  <path opacity="0.4" d="M2 6.447C2 3.996 4.03024 2 6.52453 2H11.4856C13.9748 2 16 3.99 16 6.437V17.553C16 20.005 13.9698 22 11.4744 22H6.51537C4.02515 22 2 20.01 2 17.563V16.623V6.447Z" fill="#001F3F"/>
                                  <path d="M21.7789 11.4548L18.9331 8.5458C18.639 8.2458 18.1657 8.2458 17.8725 8.5478C17.5803 8.8498 17.5813 9.3368 17.8745 9.6368L19.4337 11.2298H17.9387H9.54844C9.13452 11.2298 8.79852 11.5748 8.79852 11.9998C8.79852 12.4258 9.13452 12.7698 9.54844 12.7698H19.4337L17.8745 14.3628C17.5813 14.6628 17.5803 15.1498 17.8725 15.4518C18.0196 15.6028 18.2114 15.6788 18.4043 15.6788C18.5952 15.6788 18.787 15.6028 18.9331 15.4538L21.7789 12.5458C21.9201 12.4008 22 12.2048 22 11.9998C22 11.7958 21.9201 11.5998 21.7789 11.4548Z" fill="#001F3F"/>
                                </svg>
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                            </li>
                          </ul>
                        </a>
                      </div>
                    </div>
                  </nav>
                </header>

                    <section>
                        
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="d-flex justify-content-center align-items-center flex-column ">

                              <div class="formText text-center mb-auto">    
                                  <h2 class="fw-semibold">Your Visual Presence, Your Way</h2>
                                  <h6 class="lh-base">See device specific mockups of your product imagery for online retail and <br>your ads on social media and publishers on the open web. <br>Select your site type and choose a specific website to recieve your <br>mockups</h6>
                                  <!-- form -->
                                  <form>
                                    <div class="dropdown d-flex justify-content-center">
                                      <button class="drop-btn btn d-flex justify-content-between" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                        <span id="txt-change">Site Type</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 16.5001C8.7339 16.5001 4.8789 10.2601 4.1399 9.00912C3.8579 8.53412 4.0159 7.92112 4.4909 7.64012C4.9669 7.35712 5.5799 7.51712 5.8599 7.99112C7.4149 10.6161 10.4399 14.5001 11.9999 14.5001C13.5619 14.5001 16.5869 10.6161 18.1399 7.99112C18.4209 7.51712 19.0359 7.35712 19.5089 7.64012C19.9839 7.92012 20.1419 8.53312 19.8599 9.00912C19.1209 10.2601 15.2659 16.5001 11.9999 16.5001Z" fill="#9D9D9D"/>
                                        </svg>
                                      </button>
                                      <ul class=" dropdown-menu drop-menu">
                                        <li><a class="drop-btn dropdown-item itm" href="#" id="social">Social Media</a></li>
                                        <li><a class="drop-btn dropdown-item itm" href="#" id="retailer">Retailer</a></li>
                                        <li><a class="drop-btn dropdown-item itm" href="#" id="publisher">Publisher</a></li>
                                      </ul>
                                    </div>
                              
                                    <div class="dropdown d-flex justify-content-center">
                                      <button class="drop-btn btn bn2 d-flex justify-content-between" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span id="txt-change-2">Specific Site</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 16.5001C8.7339 16.5001 4.8789 10.2601 4.1399 9.00912C3.8579 8.53412 4.0159 7.92112 4.4909 7.64012C4.9669 7.35712 5.5799 7.51712 5.8599 7.99112C7.4149 10.6161 10.4399 14.5001 11.9999 14.5001C13.5619 14.5001 16.5869 10.6161 18.1399 7.99112C18.4209 7.51712 19.0359 7.35712 19.5089 7.64012C19.9839 7.92012 20.1419 8.53312 19.8599 9.00912C19.1209 10.2601 15.2659 16.5001 11.9999 16.5001Z" fill="#9D9D9D"/>
                                        </svg>
                                      </button>
                                      <ul class=" dropdown-menu drop-menu menu-1" >
                                        <!-- social media list -->
                                        <li><a class="drop-btn dropdown-item itm all-itm" href="#" id="social-1">Instagram</a></li>
                                        <li><a class="drop-btn dropdown-item itm all-itm" href="#" id="social-2">Facebook</a></li>

                                        <!-- retailer list -->
                                        <li><a class="drop-btn dropdown-item itm all-itm" href="#" id="retail-1">Retailer 1</a></li>
                                        <li><a class="drop-btn dropdown-item itm all-itm" href="#" id="retail-2">Retailer 2</a></li>
                                        <li><a class="drop-btn dropdown-item itm all-itm" href="#" id="retail-3">Retailer 3</a></li>

                                        <!-- publisher list -->
                                        <li><a class="drop-btn dropdown-item itm all-itm" href="#" id="publisher-1">Publisher 1</a></li>
                                        <li><a class="drop-btn dropdown-item itm all-itm" href="#" id="publisher-2">Publisher 2</a></li>
                                        <li><a class="drop-btn dropdown-item itm all-itm" href="#" id="publisher-3">Publisher 3</a></li>
                                      </ul>
                                    </div> 

                                    <button type="button" class="btn btn-primary submit-btn fw-semibold" onclick="navigateTo('upload-image.html')">Submit</button>
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


                    <script>
                      $(document).ready(function() {
                      $(".all-itm").hide();
                      $("#social").click(function () { $("#social-1").show(); $("#social-2").show(); $("#retail-1").hide(); $("#retail-2").hide(); $("#retail-3").hide(); $("#publisher-1").hide(); $("#publisher-2").hide(); $("#publisher-3").hide(); $("#txt-change").text("Social Media"); $("#txt-change-2").text("Specific Site");});
                      $("#retailer").click(function () {  $("#social-1").hide(); $("#social-2").hide(); $("#retail-1").show(); $("#retail-2").show(); $("#retail-3").show(); $("#publisher-1").hide(); $("#publisher-2").hide(); $("#publisher-3").hide(); $("#txt-change").text("Retailer"); $("#txt-change-2").text("Specific Site");});
                      $("#publisher").click(function () {  $("#social-1").hide(); $("#social-2").hide(); $("#retail-1").hide(); $("#retail-2").hide(); $("#retail-3").hide(); $("#publisher-1").show(); $("#publisher-2").show(); $("#publisher-3").show(); $("#txt-change").text("Publisher"); $("#txt-change-2").text("Specific Site");});

                      // second dropdown
                      $("#social-1").click(function () { $("#txt-change-2").text("Instagram");})
                      $("#social-2").click(function () { $("#txt-change-2").text("Facebook");})

                      $("#retail-1").click(function () { $("#txt-change-2").text("Retailer 1");})
                      $("#retail-2").click(function () { $("#txt-change-2").text("Retailer 2");})
                      $("#retail-3").click(function () { $("#txt-change-2").text("Retailer 3");})

                      $("#publisher-1").click(function () { $("#txt-change-2").text("Publisher 1");})
                      $("#publisher-2").click(function () { $("#txt-change-2").text("Publisher 2");})
                      $("#publisher-3").click(function () { $("#txt-change-2").text("Publisher 3");})
                      });
                    </script>
                    <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
                    <script src="{{ URL::asset('assets/js/script.js') }}"></script>
                 
                 </body>
            </html>

        @else

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

        @endauth

@endif

            
