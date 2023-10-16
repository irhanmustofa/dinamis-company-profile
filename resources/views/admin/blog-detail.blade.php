@extends('admin.layouts.main-admin')
@section('title', 'Add Content')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Blog Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                            <li class="breadcrumb-item active">Blog Details</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pt-3">
                            <div class="row justify-content-center">
                                <div class="col-xl-8">
                                    <div>
                                        <div class="text-center">
                                            <div class="mb-4">
                                                <a href="javascript: void(0);" class="badge bg-light font-size-12">
                                                    <i class="bx bx-user align-middle text-muted me-1"></i> {{ $blog->user->name }}
                                                </a>
                                            </div>
                                            <h4>{{ $blog->title }}</h4>
                                            <p class="text-muted mb-4"><i class="mdi mdi-calendar me-1"></i> {{  date('j \\ F, Y', strtotime($blog->created_at)) }}</p>
                                        </div>

                                        <hr>
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mt-4 mt-sm-0">
                                                        <p class="text-muted mb-2">Date</p>
                                                        <h5 class="font-size-15">{{  date('j \\ F, Y', strtotime($blog->created_at)) }}</h5>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mt-4 mt-sm-0">
                                                        <p class="text-muted mb-2">Post by</p>
                                                        <h5 class="font-size-15">{{ $blog->user->name }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="my-2">
                                            <img src="{{ asset('img-blog/'.$blog->image) }}" alt="" class="img-thumbnail mx-auto d-block w-50">
                                        </div>

                                        <hr>

                                        <div class="mt-2">
                                            <div class="text-muted font-size-14">
                                                <p>{!! $blog->description !!}</p>
                                        
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="/blog-edit/{{ $blog->id }}" class="btn btn-primary">Edit</a>
                                            <a href="/blog-delete/{{ $blog->id }}" class="btn btn-danger show_confirm">Delete</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection