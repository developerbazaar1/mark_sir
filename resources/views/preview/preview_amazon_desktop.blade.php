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
  </head>
  <body>
    <section class="img -header">
      <img class="w-100" src="{{ URL::asset('assets/preview/assets/images/amazon/amazon-header-img.png') }}">
    </section>
    <section>
      <div class="container">
        <div class="row mx-0 pt-4 px-0 w-100">
          <!---slider--->
          <div class="col-6 col-xs-12">
            <div id='lens'></div>
            <div id='slideshow-items-container'>
              <div class="thumb"> 
               
                @foreach($site_data_images as $key => $site_img) 
                <img class='slideshow-thumbnails {{ $key == 0 ? "active" : "" }}' src="{{ URL::asset('public/'.$site_img->file) }}"> 
               
                @endforeach 

                <img class='slideshow-thumbnails carousel-control-prev-icon' src="{{ URL::asset('assets/preview/assets/images/amazon/product-5.jpg') }}" data-bs-toggle="modal" data-bs-target="#myModal">
                
              </div>
              <div class="img-priv"> 
               
                @foreach($site_data_images as $key => $site_img) 
                <span>
                  <img class='slideshow-items w-100 {{ $key == 0 ? "active" : "" }}' src="{{ URL::asset('public/'.$site_img->file) }}">
                </span> 
              
                @endforeach 
                <span>
                  <img class='slideshow-items w-100' src="{{ URL::asset('assets/preview/assets/images/amazon/product-5.jpg') }}" data-bs-toggle="modal" data-bs-target="#myModal">
                </span>
                
              </div>
            </div>
            <div id='result'></div>
          </div>
          <!----slideer---->
          <div class="col-6 col-xs-12">
            <img class="w-100" src="{{ URL::asset('assets/preview/assets/images/amazon/slider-right-img.png') }}" alt="">
          </div>
        </div>
      </div>
    </section>
    <section>
      <img class="w-100" src="{{ URL::asset('assets/preview/assets/images/amazon/footer-page-img.png') }}">
    </section>
    <section class="pt-3 border-top">
      <div class="container-fluid">
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
    <!-- The Modal -->
    <div class="modal lg w-100" id="myModal">
      <div class="modal-dialog modal-lg w-100">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div id="video-popup-iframe-container">
              <iframe class="embed-responsive-item" width="100%" height="350" src="{{ URL::asset('public/'.$site_data_video->file) }}"  id="video" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- The Modal -->
    <!------Script------->
     <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.slideshow-thumbnails').hover(function() { changeSlide($(this)); });
            $(document).mousemove(function(e) {
                var x = e.clientX; var y = e.clientY;
                var x = e.clientX; var y = e.clientY;
                var imgx1 = $('.slideshow-items.active').offset().left;
                var imgx2 = $('.slideshow-items.active').outerWidth() + imgx1;
                var imgy1 = $('.slideshow-items.active').offset().top;
                var imgy2 = $('.slideshow-items.active').outerHeight() + imgy1;
                if ( x > imgx1 && x < imgx2 && y > imgy1 && y < imgy2 ) {
                    $('#lens').show(); $('#result').show();
                    imageZoom( $('.slideshow-items.active'), $('#result'), $('#lens') );
                } else {
                    $('#lens').hide(); $('#result').hide();
                }
            });
        });

        function imageZoom( img, result, lens ) {
            result.width( img.innerWidth() ); result.height( img.innerHeight() );
            lens.width( img.innerWidth() / 2 ); lens.height( img.innerHeight() / 2 );
            result.offset({ top: img.offset().top, left: img.offset().left + img.outerWidth() + 10 });
            var cx = img.innerWidth() / lens.innerWidth(); var cy = img.innerHeight() / lens.innerHeight();
            result.css('backgroundImage', 'url(' + img.attr('src') + ')');
            result.css('backgroundSize', img.width() * cx + 'px ' + img.height() * cy + 'px');
            lens.mousemove(function(e) { moveLens(e); });
            img.mousemove(function(e) { moveLens(e); });
            lens.on('touchmove', function() { moveLens(); })
            img.on('touchmove', function() { moveLens(); })
            function moveLens(e) {
                var x = e.clientX - lens.outerWidth() / 2;
                var y = e.clientY - lens.outerHeight() / 2;
                if ( x > img.outerWidth() + img.offset().left - lens.outerWidth() ) { x = img.outerWidth() + img.offset().left - lens.outerWidth(); }
                if ( x < img.offset().left ) { x = img.offset().left; }
                if ( y > img.outerHeight() + img.offset().top - lens.outerHeight() ) { y = img.outerHeight() + img.offset().top - lens.outerHeight(); }
                if ( y < img.offset().top ) { y = img.offset().top; }
                lens.offset({ top: y, left: x });
                result.css('backgroundPosition', '-' + ( x - img.offset().left ) * cx  + 'px -' + ( y - img.offset().top ) * cy + 'px');
            }
        }

        function changeSlide(elm) {
            $('.slideshow-items').removeClass('active');
            $('.slideshow-items').eq( elm.index() ).addClass('active');
            $('.slideshow-thumbnails').removeClass('active');
            $('.slideshow-thumbnails').eq( elm.index() ).addClass('active');
        }
    </script>
  </body>
</html>
