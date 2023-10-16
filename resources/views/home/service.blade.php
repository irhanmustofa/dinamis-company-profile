@extends('home.layouts.main-home')
@section('title', 'Website Contoh')
@section('content')

<main id="main">
    <section class="breadcrumbs">
        <div class="container">
            <h2>{{ $service->name }}</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">
                @foreach ($serviceItem as $item)
                
                <div class="col-lg-3 col-md-6">
                    <div class="card count-box" style="border: none">
                        <img src="{{ asset('img-service/'.$item->item_img) }}" class="card-img-top w-50" alt="..." style="">
                        <div class="card pt-4 text-center" style="border: none">
                            <h4 class="card-title">{{ $item->name }}</h4>
                            <h5 class="card-title">{{ $item->price }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                                <a href="#" class="btn btn-primary mt-2">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                @endforeach
        </div>
    </section><!-- End Counts Section -->


</main><!-- End #main -->

@endsection