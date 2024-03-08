<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Sellers Friend</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/preview/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/preview/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/preview/assets/css/amazondesktop.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style type="text/css">
      .imgs ul li {
        margin: 10px;
      }

      .imgs ul {
        display: flex;
        flex-wrap: wrap;
      }

      .imgs li {
        height: 40vh;
        flex-grow: 1;
      }

      .imgs .imgs li:last-child {
        flex-grow: 10;
      }

      .imgs img {
        max-height: 100%;
        min-width: 100%;
        object-fit: contain;
        vertical-align: bottom;
      }

      @media (max-aspect-ratio: 1) {
        .imgs li {
          height: 30vh;
        }
      }

      @media (max-height: 480px) {
        .imgs li {
          height: 80vh;
        }
      }

      @media (max-aspect-ratio: 1) and (max-width: 480px) {
        .imgs ul {
          flex-direction: row;
        }

        .imgs li {
          height: auto;
          width: 100%;
        }

        .imgs img {
          width: 100%;
          max-height: 75vh;
          min-width: 0;
        }

        .imgs ul li {
          margin: 5px;
        }
      }
    </style>
  </head>
  <body>
    <section>
      <!--       <img class="w-100" src="assets/images/article/header.png"> -->
      <header class="header fixed-top">
        <div class="header-main navbar-expand-xl">
          <div class="container-fluid">
            <div class="header-main">
              <!-- logo -->
              <div class="site-branding">
                <a class="dark-logo" href="#">
                  <img class="" src="{{ URL::asset('assets/preview/assets/images/article/logo.png') }}" alt="">
                </a>
                <a class="light-logo" href="index.html">
                  <img src="{{ URL::asset('assets/preview/assets/img/logo/logo-white.png') }}" alt="">
                </a>
              </div>
              <!--/-->
              <div class="main-menu header-navbar">
                <nav class="navbar">
                  <!--navbar-collapse-->
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                      <!--Homes -->
                      <li class="nav-item">
                        <a class="nav-link active" href="#"> Home </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#"> About </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#"> Services </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#"> Blogs </a>
                      <li class="nav-item">
                        <a class="nav-link" href="#"> contact </a>
                      </li>
                    </ul>
                  </div>
                  <!--/-->
                </nav>
              </div>
              <!-- header actions -->
              <div class="header-action-items">
                <!--header-social-->
                <ul class="header-social list-inline">
                  <li>
                    <a href="#">
                      <i class="fa fa-facebook"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-instagram"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-twitter"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-youtube"></i>
                    </a>
                  </li>
                </ul>
                <!--search-icon-->
                <!--navbar-toggler-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </header>
    </section>
    <section class="article">
      <div class="container">
        <div class="row">
          <div class="row mt-4 pb-3">
            <div class="col-lg-12 imgs">
              <ul> 
             
                @foreach($site_data_images as $site_img)
                <li>
                  <img src="{{ URL::asset('public/'.$site_img->file) }}" alt="" loading="lazy">
                </li> 
                @endforeach 
        
                </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pt-3 border-top">
      <div class="container">
        <div class="row px-0 mx-0 pl-4">
          <div class="col-lg-8 col-xs-6">
            <p class="ml-4">© 2024 - All Rights Reserved <span style="color: red;">The sellers friend </span> | Designed &amp; Developed By <a class="text-decoration-none" href="https://www.developerbazaar.com">
                <span style="color: red;"> Developer </span>
                <span style="color: limegreen;"> Bazaar</span>
                <span style="color: red;"> Technologies</span>
              </a>
            </p>
          </div>
          <div class="col-lg-4 col-xs-6">
            <nav id="" class="navbar justify-content-end pt-0">
              <ul class="nav">
                <li class="nav-item border-end">
                  <a class="nav-link text-dark" href="#">Report Error</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="#">Feedback</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>