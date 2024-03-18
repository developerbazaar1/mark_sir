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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  </head>
  <body>
    <!---slider--->
    <!----slideer---->
    <section>
      <div class="row mx-0 px-0 w-100">
        <div class="col-lg-12 col-xs-12 text-center fixed-top mx-0 px-0">
          <img class="w-100" src="{{ URL::asset('assets/preview/assets/images/insta/insta-mob-top.png') }}" alt="">
        </div>
        <div class="col-lg-12 col-xs-12 text-center mt-4 pt-4 mx-0 px-0">
          <img class="w-100" src="{{ URL::asset('assets/preview/assets/images/insta/insta-mob-top2.png') }}" alt="">
        </div>
        <div class="col-lg-12 col-xs-12 text-center mx-0 px-0">
          <!---slider--->

            @if($site_data_images)
                @if(count($site_data_images)>1)
                <div class="owl-carousel owl-theme" id="owl-carousel-insta-mob"> 
                    @foreach($site_data_images as $site_img) 
                    <div>
                        <img src="{{ URL::asset('public/'.$site_img->file) }}" height="">
                    </div> 
                    @endforeach 
                </div>
                @else
                <div class="" id=""> 
                    @foreach($site_data_images as $site_img) 
                    <div>
                        <img src="{{ URL::asset('public/'.$site_img->file) }}" height="">
                    </div> 
                    @endforeach 
                </div>
                @endif
            @endif
          


          <!----slideer---->
        </div>
        <div class="col-lg-12 learn-more col-xs-12 mx-0  pt-2 pb-2 pl-2 pr-0">
          <a href="#" class="pl-4 pt-3 pb-3">Learn More</a>
        </div>
        <div class="col-lg-12 col-xs-12 text-center">
          <img class="w-100 pb-4" src="{{ URL::asset('assets/preview/assets/images/insta/insta-mob-bottom.png') }}" alt="">
        </div>
        <div class="row mb-3 pb-3">
          <div class="col-lg-4 col-xs-12">
            <nav id="" class="navbar pt-0 justify-content-center">
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
          <div class="col-lg-8 col-xs-12 pb-3">
            <p class="ml-4 font-12">© 2024 - All Rights Reserved <span style="color: red;">The sellers friend </span> | Designed &amp; Developed By <a class="text-decoration-none" href="https://www.developerbazaar.com">
                <span style="color: red;"> Developer </span>
                <span style="color: limegreen;"> Bazaar</span>
                <span style="color: red;"> Technologies</span>
              </a>
            </p>
          </div>
        </div>
        <div class="col-lg-12 col-xs-12 px-0 mx-0 text-center fixed-bottom mt-5 ">
          <img class="w-100" src="{{ URL::asset('assets/preview/assets/images/insta/insta-mob-bottom2.png') }}" alt="">
        </div>
      </div>
    </section>
    <script src="{{ URL::asset('assets/preview/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function($) {
        $('#owl-carousel-insta-mob').owlCarousel({
          items: 1,
          merge: true,
          loop: false,
          margin: 0,
          video: true,
          lazyLoad: true,
          center: true,
          responsive: {
            480: {
              items: 1
            },
            600: {
              items: 1
            }
          }
        });
      });
    </script>
    </script>
  </body>
</html>