<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="">
    <meta property="twitter:site" content="">
    <meta property="twitter:creator" content="">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="The Sellers Friend admin">
    <meta property="og:title" content="The Sellers Friend  admin">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <title>The Sellers Friend admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/css/font.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
     @yield('styles')

  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->

    <header class="app-header"><a class="app-header__logo" href="{{ route('admin-dashboard') }}"><img class="w-50" src="{{ URL::asset('admin-assets/images/logo.png') }}"></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!--<li class="app-search">-->
        <!--  <input class="app-search__input" type="search" placeholder="Search">-->
        <!--  <button class="app-search__button"><i class="bi bi-search"></i></button>-->
        <!--</li>-->
        <!--Notification Menu-->
        <!--<li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Show notifications"><i class="bi bi-bell fs-5"></i></a>-->
        <!--  <ul class="app-notification dropdown-menu dropdown-menu-right">-->
        <!--    <li class="app-notification__title">You have 4 new notifications.</li>-->
        <!--    <div class="app-notification__content">-->
        <!--      <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><i class="bi bi-envelope fs-4 text-primary"></i></span>-->
        <!--          <div>-->
        <!--            <p class="app-notification__message">Lisa sent you a mail</p>-->
        <!--            <p class="app-notification__meta">2 min ago</p>-->
        <!--          </div></a></li>-->
        <!--      <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><i class="bi bi-exclamation-triangle fs-4 text-warning"></i></span>-->
        <!--          <div>-->
        <!--            <p class="app-notification__message">Mail server not working</p>-->
        <!--            <p class="app-notification__meta">5 min ago</p>-->
        <!--          </div></a></li>-->
        <!--      <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><i class="bi bi-cash fs-4 text-success"></i></span>-->
        <!--          <div>-->
        <!--            <p class="app-notification__message">Transaction complete</p>-->
        <!--            <p class="app-notification__meta">2 days ago</p>-->
        <!--          </div></a></li>-->
        <!--      <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><i class="bi bi-envelope fs-4 text-primary"></i></span>-->
        <!--          <div>-->
        <!--            <p class="app-notification__message">Lisa sent you a mail</p>-->
        <!--            <p class="app-notification__meta">2 min ago</p>-->
        <!--          </div></a></li>-->
        <!--      <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><i class="bi bi-exclamation-triangle fs-4 text-warning"></i></span>-->
        <!--          <div>-->
        <!--            <p class="app-notification__message">Mail server not working</p>-->
        <!--            <p class="app-notification__meta">5 min ago</p>-->
        <!--          </div></a></li>-->
        <!--      <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><i class="bi bi-cash fs-4 text-success"></i></span>-->
        <!--          <div>-->
        <!--            <p class="app-notification__message">Transaction complete</p>-->
        <!--            <p class="app-notification__meta">2 days ago</p>-->
        <!--          </div></a></li>-->
        <!--    </div>-->
        <!--    <li class="app-notification__footer"><a href="#">See all notifications.</a></li>-->
        <!--  </ul>-->
        <!--</li>-->
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="{{ route('admin-setting') }}"><i class="bi bi-gear me-2 fs-5"></i> Settings</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right me-2 fs-5"></i> Logout</a></li>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>

          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ URL::asset('admin-assets/images/mark-nilski.png') }}" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">@auth {{ Auth::user()->name }} @endauth</p>
          <p class="app-sidebar__user-designation">@auth {{ Auth::user()->userType }} @endauth</p>
        </div>
      </div>
                 <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{ route('admin-dashboard') }}"><i class="app-menu__icon fa-light fa-gauge-low"></i> <span class="app-menu__label"> Dashboard </span></a></li>

         <li><a class="app-menu__item" href="{{ route('admin-users') }}"><i class="app-menu__icon fa-light fa-users"></i>  <span class="app-menu__label">Users Master</span></a></li>

         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-large"></i><span class="app-menu__label">Masters System</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('admin-site-types') }}"><i class="icon fa fa-plus"></i> Add Site Types</a></li>
            <li><a class="treeview-item" href="{{ route('admin-sites') }}"><i class="icon fa fa-plus"></i> Add Sites</a></li>
           
          </ul>
        </li>

          <li><a class="app-menu__item" href="{{ route('admin-error-list') }}"><i class="app-menu__icon fa-sharp fa-light fa-link"></i> <span class="app-menu__label">Validation list</span></a></li>
           <li><a class="app-menu__item" href="{{ route('admin-link-list') }}"><i class="app-menu__icon fa-sharp fa-light fa-link"></i> <span class="app-menu__label">Site link list</span></a></li>
          <li><a class="app-menu__item" href="{{ route('admin-setting') }}"><i class="app-menu__icon fa-light fa-light fa-gear"></i>  <span class="app-menu__label">Settings </span></a></li>
          <li><a class="app-menu__item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();" ><i class="app-menu__icon fa-light fa-arrow-right-from-bracket"></i> <span class="app-menu__label">Logout </span></a></li>
      </ul>
    </aside>


     <!--begin::Content-->
        @yield('content')
        <!--end::Content-->

        <!--begin::Footer-->
        @include('admin.layouts.footer')



      </body>
</html>