@extends('admin.layouts.main-admin')
@section('title', 'Service-List')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Products</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->



        <div class="row">
            <div class="col-lg-12">

                <div class="row mb-3">
                    <div class="col-xl-4 col-sm-6">
                        <div class="mt-2">
                            <h5>Clothes</h5>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-6">
                        <form class="mt-4 mt-sm-0 float-sm-end d-sm-flex align-items-center">
                            <div class="search-box me-2">
                                <div class="position-relative">
                                    <input type="text" class="form-control border-0" placeholder="Search...">
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                            <ul class="nav nav-pills product-view-nav justify-content-end mt-3 mt-sm-0">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#"><i class="bx bx-grid-alt"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="bx bx-list-ul"></i></a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>

                <div>
                    <a href="/service-item-add" class="btn btn-primary mb-3">Add Service Item</a>
                </div>

                @if ($serviceItem->isEmpty())
                <div class="text-center">
                    <h3>There is no product</h3>
                </div>

                @else
                
                <div class="row">
                    @foreach ($serviceItem as $item)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="product-img position-relative text-center">
                                    <img src="{{ asset('img-service/'.$item->item_img) }}" alt="" height="200vh"
                                        class="">
                                </div>
                                <div class="mt-4 text-center">
                                    <h5 class="mb-3 text-truncate"><a href="javascript: void(0);" class="text-dark">{{
                                            $item->name }} </a></h5>
                                    <h5 class="my-0"><span class="text-muted me-2"><b>Rp {{ number_format($item->price,
                                                2, ',', '.') }}</b>
                                    </h5>
                                </div>
                                <div class="mt-3 text-end">
                                    <a href="/service-item-edit/{{ $item->slug }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="/service-item/{{ $item->slug }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm show_confirm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    @endforeach
                
                </div>
                
                @endif
                <!-- end row -->
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection