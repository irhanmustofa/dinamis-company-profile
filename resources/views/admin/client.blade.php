@extends('admin.layouts.main-admin')
@section('title', 'Service-Item')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">CLient</h4>

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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-porto">
                        Tambahkan Client
                    </button>
                    <div class="modal fade" id="add-porto" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="/client" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">logo</label>
                                            <input type="file" name="logo" class="form-control" required>
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
                                @if ($clients->isEmpty())
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Data Kosong!</h4>
                                    <p>Silahkan tambahkan data terlebih dahulu</p>
                                    <hr>
                                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things
                                        nice and tidy.</p>
                                </div>

                                @else

                                <table id="datatable" class="table table-bordered no-wrap w-100 dt-responsive">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Logo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($clients as $porto)
                                            
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $porto->name }}</td>
                                            <td>
                                                <div>
                                                    <img src="{{ asset('img-client/'.$porto->logo) }}" width="30%" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-porto{{ $porto->id }}">
                                                    Edit
                                                </button>
                                                <div class="modal fade" id="edit-porto{{ $porto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="client/{{ $porto->id }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                                                                        <input type="text" name="name" class="form-control" value="{{ $porto->name }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputPassword1" class="form-label">Gambar</label>
                                                                        <div>
                                                                            <img src="{{ asset('img-client/'.$porto->logo) }}" width="20%" alt="">
                                                                        </div><br>  
                                                                        <input type="file" name="logo" class="form-control">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="client/{{ $porto->id }}" method="post" class="d-inline">
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