@extends('admin.layouts.main-admin')
@section('title', 'Service')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <form action="service-item" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Service Category</label>
                <select class="form-select" name="service_id" aria-label="Default select example" required>
                    <option selected>-- Pilih kategori service --</option>
                    @foreach ($services as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Item Code</label>
                <input type="text" name="item_code" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" required>
            </div>
            {{-- <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">tipe</label>
                <input type="text" name="tipe" class="form-control" required>
            </div> --}}
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                <textarea type="text" name="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gambar</label>
                <input type="file" name="item_img" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection