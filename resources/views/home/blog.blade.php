@extends('home.layouts.main-home')
@section('title', 'Website Contoh')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Blog</li>
          </ol>
          <h2>Blog</h2>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= Blog Section ======= -->
      <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
  
            <div class="col-lg-8 entries">

              @foreach ($blog as $item)
                  
              
              <article class="entry">
                
                <div class="entry-img">
                  <img src="{{ asset('img-blog/'.$item->image) }}" alt="" class="img-fluid">
                </div>
                
                <h2 class="entry-title">
                  <a href="blog-single.html">{{ $item->title }}</a>
                </h2>
  
                <div class="entry-meta">
                  <ul>
                    {{-- <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li> --}}
                    <li class="d-flex align-items-center"><i class="bi bi-calendar"></i> <a href="blog-single.html">{{ date('j \\ F, Y', strtotime($item->created_at)) }}</a></li>
                    {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> --}}
                  </ul>
                </div>
  
                <div class="entry-content">
                  <p style="display: -webkit-box; -webkit-line-clamp: 5;-webkit-box-orient: vertical;overflow: hidden;">
                    {!! $item->description !!}
                  </p>
                  <div class="read-more">
                    <a href="/blog-detail/{{ $item->id }}">Read More</a>
                  </div>
                </div>
  
              </article><!-- End blog entry -->
              
              @endforeach
              
              
              
              <div class="text-center">
                {{ $blog->links() }}
              </div>
  
            </div><!-- End blog entries list -->
  
            <div class="col-lg-4">
  
              <div class="sidebar">
  
                <h3 class="sidebar-title">Search</h3>
                <div class="sidebar-item search-form">
                  <form action="" method="get">
                    <input type="text" name="title" placeholder="Search Blog Title">
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
      </section><!-- End Blog Section -->

  
</main><!-- End #main -->

@endsection