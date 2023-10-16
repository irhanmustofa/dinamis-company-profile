@extends('admin.layouts.main-admin')
@section('title', 'Blog')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Blog Grid</h4>

                    {{-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                            <li class="breadcrumb-item active">Blog Grid</li>
                        </ol>
                    </div> --}}

                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add-porto">
            Tambahkan Konten
        </button>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card">

                    <!-- Tab panes -->
                    <div class="tab-content p-4">
                        <div class="tab-pane active" id="all-post" role="tabpanel">
                            <div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-12">
                                        <div>
                                            <hr class="mb-4">

                                            <div class="row">
                                                @if ($blogs->isEmpty())
                                                <div class="alert alert-danger" role="alert">
                                                    <h4 class="alert-heading">Data Kosong!</h4>
                                                    <p>Silahkan tambahkan data terlebih dahulu</p>
                                                    <hr>
                                                    <p class="mb-0">Whenever you need to, be sure to use margin
                                                        utilities to keep things
                                                        nice and tidy.</p>
                                                </div>

                                                @else

                                                @foreach ($blogs as $blog)
                                                <div class="col-sm-6">
                                                    <div class="card p-1 border shadow-none">
                                                        <div class="p-3">
                                                            <h5 class="text-dark">{{ $blog->title }}</h5>
                                                            <p class="text-muted mb-0">{{ date('j \\ F, Y',
                                                                strtotime($blog->created_at)) }}</p>
                                                        </div>

                                                        <div class="position-relative text-center">
                                                            <img src="{{ asset('img-blog/'.$blog->image) }}" alt=""
                                                                class="img-thumbnail w-50">
                                                        </div>

                                                        <div class="p-3">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item me-3">
                                                                    <a href="javascript: void(0);" class="text-muted">
                                                                        <i
                                                                            class="bx bx-user align-middle text-muted me-1"></i>
                                                                        {{ $blog->user->name }}
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            {{-- <style>
                                                                .box p {
                                                                    display: -webkit-box;
                                                                    -webkit-line-clamp: 3;
                                                                    -webkit-box-orient: vertical;
                                                                    overflow: hidden;
                                                                }
                                                            </style> --}}
                                                            <div class="box">
                                                                <p style="display: -webkit-box; -webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;">{!! $blog->description !!}</p>
                                                            </div>

                                                            <div class="btn-toolbar justify-content-between mt-4">
                                                                <a href="/blog-show/{{ $blog->id }}"
                                                                    class="btn btn-primary">Read more <i
                                                                        class="mdi mdi-arrow-right"></i></a>
                                                                <a href="/blog-delete/{{ $blog->id }}"
                                                                    class="btn btn-danger">Delete <i
                                                                        class="mdi mdi-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection