@extends('home.layouts.main-home')
@section('title', 'Website Contoh')
@section('content')

<main id="main">
    <section class="breadcrumbs">
        <div class="container">
          <h2>About</h2>
        </div>
      </section><!-- End Breadcrumbs -->
  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <div class="container" data-aos="fade-up">
      <header class="section-header">
        <p>Tentang Kami</p>
      </header>

      <div class="row gx-0">

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="content">
            <h3>Who We Are</h3>
            <h2>{{ $about->company_name }}</h2>
            <p>
              {{ $about->description }}
            </p>
            <div class="text-center text-lg-start">
              <a href="#"
                class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Read More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('img-about/'.$about->company_image) }}" class="img-fluid" alt="">
        </div>

      </div>
    </div>

  </section><!-- End About Section -->

  <section id="about" class="about">

    <div class="container" data-aos="fade-up">
      <header class="section-header">
        <p>Visi & Misi</p>
      </header>

      <div class="row gx-0 text-center">

        <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="content">
            <h2>Visi</h2>
            @foreach ($visi as $item)
            <p>
              {{ $item->vission }}
            </p>
            @endforeach
          </div>
        </div>

        <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="content">
            <h2>Misi</h2>
            @foreach ($misi as $key=>$item)
            <p>
              {{ $key+1 }} . {{ $item->mission }}
            </p>
            @endforeach
          </div>
        </div>

      </div>
    </div>

  </section><!-- End About Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </header>

      <div class="row gy-4">

        <div class="col-lg-12">

          <div class="row gy-4">
            <div class="col-md-4">
              <div class="info-box">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>{{ $about->company_address }}</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info-box">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>{{ $about->company_phone }}</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info-box">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>{{ $about->company_email }}</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-12">
          <div class="ratio ratio-16x9">
            <iframe src="{{ $about->company_map }}" width="720" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>

      </div>

    </div>

  </section><!-- End Contact Section -->

  
</main><!-- End #main -->

@endsection