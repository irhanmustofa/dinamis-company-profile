@extends('admin.layouts.main-admin')
@section('title', 'Dashboard')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">About</h4>

                    <div class="page-title-right">
                        <div class="pt-2">
                            <div class="mt-4">
                                <button type="button" class="btn btn-lg btn-primary waves-effect waves-light w-100"
                                    data-bs-toggle="modal" data-bs-target="#edit-about">
                                    Ubah About
                                </button>
                                <div class="modal fade" id="edit-about" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form action="/about/{{ $about->id }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Company
                                                            Name</label>
                                                        <input type="text" name="company_name" class="form-control"
                                                            value="{{ $about->company_name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Description</label>
                                                        <textarea type="text" name="description" class="form-control"
                                                            required>{{ $about->description }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Company
                                                            Address</label>
                                                        <input type="text" name="company_address" class="form-control"
                                                            value="{{ $about->company_address }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Company
                                                            Email</label>
                                                        <input type="text" name="company_email" class="form-control"
                                                            value="{{ $about->company_email }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Company
                                                            Phone</label>
                                                        <input type="text" name="company_phone" class="form-control"
                                                            value="{{ $about->company_phone }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Company
                                                            Map</label>
                                                        <textarea id="" type="text" name="company_map"
                                                            class="form-control">{{ $about->company_map }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Gambar
                                                            Logo</label>
                                                        <div>
                                                            <img src="" width="20%" alt="">
                                                        </div><br>
                                                        <input type="file" name="company_logo" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Gambar</label>
                                                        <div>
                                                            <img src="" width="20%" alt="">
                                                        </div><br>
                                                        <input type="file" name="company_image" class="form-control">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
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
        <!-- end page title -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if ($about->count() == 0)
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Data Kosong!</h4>
            <p>Silahkan tambahkan data terlebih dahulu</p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things
                nice and tidy.</p>
            <div class="mt-4">
                <button href="/about/create" class="btn btn-lg btn-danger" data-bs-toggle="modal"
                    data-bs-target="#add-about">Tambah Data</button>
            </div>
        </div>
        <div class="modal fade" id="add-about" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="/about" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Company Name</label>
                                <input type="text" name="company_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Description</label>
                                <textarea type="text" name="description" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Company Address</label>
                                <input type="text" name="company_address" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Company Email</label>
                                <input type="text" name="company_email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Company Phone</label>
                                <input type="text" name="company_phone" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Company Map</label>
                                <textarea id="editor1" type="text" name="company_map" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Company Logo</label>
                                <input type="file" name="company_logo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Company Image</label>
                                <input type="file" name="company_image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @else
        <div class="row">
            <div class="col-xl-4">

                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h2 class="text-primary">{{ $about->company_name }}</h2>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ asset('img-about/'.$about->company_logo) }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="font-size-15 text-truncate">{{ $about->description }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Company Image</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{ asset('img-about/'.$about->company_image) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Address</p>
                                        <h4 class="mb-0">{{ $about->company_address }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="bx bx-map font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Email</p>
                                        <h4 class="mb-0">{{ $about->company_email }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-envelope font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Phone</p>
                                        <h4 class="mb-0">{{ $about->company_phone }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-phone font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex flex-wrap">
                            <h4 class="card-title mb-4">Maps</h4>
                        </div>
                        <div class="apex-charts">
                            <iframe src="{{ $about->company_map }}" width="480" height="240" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="text-center m-3">
                <h1 class="">Visi & Misi</h1>
            </div>
            <div class="col-xl-6">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-primary p-3">
                                    <h2 class="text-primary">Visi</h2>
                                    <form action="/visi" method="post">
                                    @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" name="vission" class="form-control" placeholder="Add Visi" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-success" type="submit" id="button-addon2">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-3">
                        <div class="row">
                            <div class="col-sm-12">
                                @foreach ($visi as $vision)
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">
                                            <form action="/visi/{{ $vision->id }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="input-group">
                                                    <textarea type="text" class="form-control" name="vission">{{ $vision->vission }}</textarea>
                                                    <button class="btn btn-outline-success" type="submit" name="update" id="button-addon2">Update</button>
                                                </div>
                                            </form>
                                        </th>
                                        <th scope="col">
                                            <form action="/visi/{{ $vision->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger" type="submit" name="delete" id="button-addon2">Delete</button>
                                            </form>
                                        </th>
                                      </tr>
                                    </thead>
                                  </table>
                                
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-primary p-3">
                                    <h2 class="text-primary">Misi</h2>
                                    <form action="/misi" method="post">
                                    @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" name="mission" class="form-control" placeholder="Add Misi" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-success" type="submit" id="button-addon2">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-3">
                        <div class="row">
                            <div class="col-sm-12">
                                @foreach ($misi as $mision)
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">
                                            <form action="/misi/{{ $mision->id }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="input-group">
                                                    <textarea type="text" class="form-control" name="mission">{{ $mision->mission }}</textarea>
                                                    <button class="btn btn-outline-success" type="submit" name="update" id="button-addon2">Update</button>
                                                </div>
                                            </form>
                                        </th>
                                        <th scope="col">
                                            <form action="/misi/{{ $mision->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger" type="submit" name="delete" id="button-addon2">Delete</button>
                                            </form>
                                        </th>
                                      </tr>
                                    </thead>
                                  </table>
                                
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- end row -->
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Social Source</h4>
                        <button type="button" class="btn btn-lg btn-danger waves-effect waves-light mt-3" data-bs-toggle="modal" data-bs-target="#add-sosmed">
                            Tambahkan Social Media
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="add-sosmed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/sosmed-source" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Social Media</label>
                                            <select class="form-select" name="social_id" aria-label="Default select example">
                                                <option selected>--Pilih Social Media--</option>
                                                @foreach ($mediaSocials as $medos)
                                                <option value="{{ $medos->id }}">{{ $medos->name }}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Link</label>
                                            <input type="text" name="link" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        @if ($socialSources->isEmpty())
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">No Data!</h4>
                            <p>Silahkan Input Data Terlebih Dahulu</p>
                        </div>
                        @else
                        <div class="row mt-4">
                            @foreach ($socialSources as $sosmed)
                                
                            <div class="col-4">
                                <div class="social-source text-center mt-3">
                                    <div class="avatar-xs mx-auto mb-3">
                                        <span class="avatar-title rounded-circle bg-primary font-size-16">
                                            <i class="bx {{ $sosmed->mediaSocial->icon }} text-white"></i>
                                        </span>
                                    </div>
                                    <h5 class="font-size-15">{{ $sosmed->name }}</h5>
                                    <p class="text-muted mb-0">{{ $sosmed->link }}</p>
                                    <div class="btn-group text-center" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-sosmed{{ $sosmed->id }}">Edit</button>
                                        <form action="/sosmed-source/{{ $sosmed->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                                        </form>

                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="edit-sosmed{{ $sosmed->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/sosmed-source/{{ $sosmed->id }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Social Media</label>
                                                    <select class="form-select" name="social_id" aria-label="Default select example">
                                                        @foreach ($mediaSocials as $medos)
                                                        <option value="{{ $medos->id }}" 
                                                            @if ($medos->id == $sosmed->social_id)
                                                                selected
                                                            @endif
                                                            >{{ $medos->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $sosmed->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Link</label>
                                                    <input type="text" name="link" class="form-control" value="{{ $sosmed->link }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection