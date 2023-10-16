@extends('admin.layouts.main-admin')
@section('title', 'Service-Item')
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


                        </form>
                    </div>
                </div>
                <div class="mb-3">
                    <a href="service-item-add" type="button" class="btn btn-primary">
                        Tambahkan Konten
                    </a>
                </div>
                <div class="row">
                    @if ($items == '')
                    {{"Belum Ada Konten"}}
                    @else
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Service</th>
                                <th scope="col">Item Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Item Img</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <th>{{ $loop->iteration }}.</th>
                                <td>{{ $item->service->name }}</td>
                                <td>{{ $item->item_code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->description }}</td>
                                <td class="text-center">
                                    <img class="img-fluid" src="{{ asset('img-service/'.$item->item_img) }}"
                                        style="width: 20%">
                                </td>
                                <td>
                                    <a href="/service-item-edit/{{ $item->slug }}" type="button" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="/service-item/{{ $item->slug }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <!-- end row -->

            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection