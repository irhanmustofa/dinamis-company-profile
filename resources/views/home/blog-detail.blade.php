@extends('home.layouts.main-home')
@section('title', 'Blog Detail')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <h2>Blog Detail</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img">
                            <img src="{{ asset('img-blog/'.$blog->image) }}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="blog-single.html">Dolorum optio tempore voluptas dignissimos cumque fuga qui
                                quibusdam quia</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-calendar"></i> <a
                                        href="blog-single.html">{{ date('j \\ F, Y', strtotime($blog->created_at)) }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                        href="blog-single.html">12 Comments</a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {!! $blog->description !!}
                            </p>
                        </div>

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            <form action="">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">

                            @foreach ($bloglist as $item)
                                
                            <div class="post-item clearfix">
                              <img src="{{ asset('img-blog/'.$item->image) }}" alt="">
                              <h4><a href="blog-single.html">{{ $item->title }}</a></h4>
                              <time datetime="">{{ date('j \\ F, Y', strtotime($item->created_at)) }}</time>
                            </div>
                            @endforeach
            
                            
            
                          </div><!-- End sidebar recent posts-->

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->


</main><!-- End #main -->

@endsection