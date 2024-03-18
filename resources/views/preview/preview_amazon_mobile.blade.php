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
    <style type="text/css">
      video.video-item {
        background: #fff;
      }
    </style>
  </head>
  <body>
    <section class="img-header pb-5">
      <div class="col-lg-12 col-xs-12 text-center fixed-top">
        <img class="w-100" src="{{ URL::asset('assets/preview/assets/images/amazon/mobile-header1.png') }}" alt="">
      </div>
    </section>
    <section class="">
      <div class="row mx-0 px-0 w-100">
        <div class="col-12 col-xs-12 px-0 mx-0">
          <!---slider--->
          <div class="owl-carousel owl-theme" id="owl-carousel-video">
            @foreach($site_data_images as $key => $site_img) 
                <div class="item">
                  <img src="{{ URL::asset('public/'.$site_img->file) }}">
                </div>
            @endforeach 
            
            <div class="item">
              <video class="video-item" height="400px" width="100%" autoplay loop controls>
                <source src="{{ URL::asset('public/'.$site_data_video->file) }}" type="video/mp4">
              </video>
            </div>
          </div>
          <!----slideer---->
    </section>
    <section class="">
      <img class="w-100" src="{{ URL::asset('assets/preview/assets/images/amazon/mobile-footer1.png') }}">
    </section>
    <section class="">
      <div class="container-fluid mb-5">
        <div class="row px-0 mx-0 pl-4">
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
          <div class="col-lg-8 col-xs-12">
            <p class="ml-4 font-12">© 2024 - All Rights Reserved <span style="color: red;">The sellers friend </span> | Designed &amp; Developed By <a class="text-decoration-none" href="https://www.developerbazaar.com">
                <span style="color: red;"> Developer </span>
                <span style="color: limegreen;"> Bazaar</span>
                <span style="color: red;"> Technologies</span>
              </a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="fixed-bottom mt-5">
      <img class="w-100" src="{{ URL::asset('assets/preview/assets/images/amazon/mobile-footer2.png') }}">
    </section>
    <script src="{{ URL::asset('assets/preview/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript">
      var videoSlider = $('#owl-carousel-video');
      videoSlider.owlCarousel({
        loop: true,
        margin: 0,
        items: 1
      });
      videoSlider.on('translate.owl.carousel', function(e) {
        $('.owl-item .item video').each(function() {
          // pause playing video - after sliding
          $(this).get(0).pause();
        });
      });
      videoSlider.on('translated.owl.carousel', function(e) {
        // check: does the slide have a video?
        if ($('.owl-item.active').find('video').length !== 0) {
          // play video in active slide
          $('.owl-item.active .item video').get(0).play();
        }
      });
    </script>
  </body>
</html>