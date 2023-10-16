<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Website - @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('asset-client/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('asset-client/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('asset-client/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('asset-client/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('asset-client/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('asset-client/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('asset-client/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('asset-client/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('asset-client/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('asset-client/css/service.css') }}" rel="stylesheet">

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('img-logo/'.$logo->image) }}" alt="">
      </a>

      @if (Auth::check('admin'))
      <a href="/admin" class="get-started-btn">Admin</a>
      @endif

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto @if (Request::segment(1) == 'home' && Request::segment(2) == null)
            active
          @endif" href="/home#hero">Home</a></li>
          <li><a class="nav-link scrollto @if (Request::segment(1) == 'about-home' && Request::segment(2) == null)
            active
          @endif" href="/about-home">About</a></li>


          <li class="dropdown megamenu"><a href="#" class="@if (Request::segment(1) == 'service' && Request::segment(2) == null)
            active
          @endif"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @foreach ($services as $item)
              <a href="/homeService/{{ $item->slug }}"><li><img src="{{ asset('img-service/'.$item->service_img) }}" class="img-thumbnail" style="width: 10%" alt="..."> {{ $item->name }}</li></a>
              @endforeach
            </ul>
          </li>

          {{-- <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li> --}}
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto @if (Request::segment(1) == 'blog-home' && Request::segment(2) == null)
            active
          @endif" href="/blog-home">Blog</a></li>

          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="{{ asset('img-logo/'.$logo->image) }}" alt="">
            </a>
            <p>{{ $about->description }}</p>
            <div class="social-links mt-3">
              @foreach ($socialSources as $sosmed)
              <a href="#" class="twitter"><i class="bx {{ $sosmed->mediaSocial->icon }}"></i></i></a>
              @endforeach
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/about">About</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Team</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/blog-home">Blog</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              @foreach ($services as $service)
              <li><i class="bi bi-chevron-right"></i> <a href="#">{{ $service->name }}</a></li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>{{ $about->company_address }}<br><br>
              <strong>Phone:</strong> {{ $about->company_phone }}<br>
              <strong>Email:</strong> {{ $about->company_email }}<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

  <script src="{{ asset('asset-client/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('asset-client/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('asset-client/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('asset-client/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('asset-client/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('asset-client/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('asset-client/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('asset-client/js/main.js') }}"></script>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
  $('.multiple-card-slider .carousel').each(function(){
      var currentCarouselId = '#' + $(this).attr('id');
      const multipleItemCarousel = document.querySelector(currentCarouselId);

      if(window.matchMedia("(min-width:576px)").matches){
          const carousel = new bootstrap.Carousel(multipleItemCarousel, {
              interval: false,
              wrap: false
          })
          var carouselWidth = $(currentCarouselId + ' .carousel-inner')[0].scrollWidth;
          var cardWidth = $(currentCarouselId + ' .carousel-item').width();
          var scrollPosition = 0;    
          $(currentCarouselId + ' .carousel-control-next').on('click', function(){
              if(scrollPosition < (carouselWidth - (cardWidth * 4))){
                  console.log('next');
                  scrollPosition = scrollPosition + cardWidth;
                  $(currentCarouselId + ' .carousel-inner').animate({scrollLeft: scrollPosition},200);
              }
          });
          $(currentCarouselId + ' .carousel-control-prev').on('click', function(){
              if(scrollPosition > 0){
                  console.log('prev');
                  scrollPosition = scrollPosition - cardWidth;
                  $(currentCarouselId + ' .carousel-inner').animate({scrollLeft: scrollPosition},200);
              }
          });
      }else{
          $(multipleItemCarousel).addClass('slide');
      }
  });
</script>

</body>

</html>