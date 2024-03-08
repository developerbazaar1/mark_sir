<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selection Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css') }}">
    
    @yield('styles')
    
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
            Hi, @auth @php echo ucfirst(Auth::user()->name) @endphp @endauth<br><span class="h6"><strong>Billing Period:</strong> 10 Days Remain</span>
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

     <!--begin::Content-->
        @yield('content')
        <!--end::Content-->

        <!--begin::Footer-->
        @include('user.layouts.footer')

    </body>
</html>