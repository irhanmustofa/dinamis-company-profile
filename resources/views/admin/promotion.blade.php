@extends('admin.layouts.main-admin')
@section('title', 'Service-Item')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">promotion</h4>

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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-team">
                        Tambahkan Promotions
                    </button>
                    <div class="modal fade" id="add-team" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="/promotion" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Code</label>
                                            <input type="text" name="code" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Description</label>
                                            <input type="text" name="description" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Gambar</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($promotions->isEmpty())
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Data Kosong!</h4>
                                    <p>Silahkan tambahkan data terlebih dahulu</p>
                                    <hr>
                                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things
                                        nice and tidy.</p>
                                </div>

                                @else

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Action</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Keterangan</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($promotions as $promotion)
                                            
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-promotion{{ $promotion->id }}">
                                                    Edit
                                                </button>
                                                <div class="modal fade" id="edit-promotion{{ $promotion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="/promotion/{{ $promotion->id }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                                                        <input type="text" name="code" class="form-control" value="{{ $promotion->code }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputPassword1" class="form-label">Position</label>
                                                                        <input type="text" name="name" class="form-control" value="{{ $promotion->name }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                                                                        <input type="text" name="description" class="form-control" value="{{ $promotion->description }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputPassword1" class="form-label">Gambar</label>
                                                                        <div>
                                                                            <img src="{{ asset('img-promotion/'.$promotion->image) }}" width="20%" alt="">
                                                                        </div><br>  
                                                                        <input type="file" name="image" class="form-control">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="/promotion/{{ $promotion->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                                                </form>
                                            </td>
                                            <td>{{ $promotion->code }}</td>
                                            <td>{{ $promotion->name }}</td>
                                            <td>{{ $promotion->description }}</td>
                                            <td>
                                                <img src="{{ asset('img-promotion/'.$promotion->image) }}" alt="">
                                            </td>
                                            

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection