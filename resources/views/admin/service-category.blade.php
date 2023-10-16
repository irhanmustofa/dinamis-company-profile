@extends('admin.layouts.main-admin')
@section('title', 'Service')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-service">
                Tambahkan Kategori
            </button>
            <div class="modal fade" id="add-service" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">

                            <form action="service" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Service Code</label>
                                    <input type="text" name="service_code" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nama Service</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                                    <input type="text" name="description" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Gambar</label>
                                    <input type="file" name="service_img" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if ($services == '')
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
                        <th scope="col">Kode Service</th>
                        <th scope="col">Nama Service</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $item)
                    <tr>
                        <th>{{ $loop->iteration }}.</th>
                        <td>{{ $item->service_code }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td class="text-center">
                            <img class="img-fluid" src="{{ asset('img-service/'.$item->service_img) }}" style="width: 20%">
                        </td>
                        <td>
                            <a href="/service/{{ $item->slug }}" class="btn btn-info">Detail</a>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#edit-service{{ $item->slug }}">
                                Edit
                            </button>
                            <div class="modal fade" id="edit-service{{ $item->slug }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">

                                            <form action="/service/{{ $item->slug }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Service
                                                        Code</label>
                                                    <input type="text" name="service_code" class="form-control"
                                                        value="{{ $item->service_code }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Nama
                                                        Service</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $item->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label">Deskripsi</label>
                                                    <input type="text" name="description" class="form-control"
                                                        value="{{ $item->description }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Gambar</label>
                                                    <input type="file" name="service_img" class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="/service/{{ $item->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection