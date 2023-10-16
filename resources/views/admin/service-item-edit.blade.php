@extends('admin.layouts.main-admin')
@section('title', 'Service-Item-Edit')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <form action="/service-item-edit/{{ $item->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Service Category</label>
                <select class="form-select" name="service_id" aria-label="Default select example" required>
                    @foreach ($services as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $item->service_id)
                        selected
                        @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Item Code</label>
                <input type="text" name="item_code" class="form-control" value="{{ $item->item_code }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $item->name }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" value="{{ $item->price }}">
            </div>
            {{-- <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">tipe</label>
                <input type="text" name="tipe" class="form-control" value="{{ $item-> }}">
            </div> --}}
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                <textarea type="text" name="description" class="form-control">{{ $item->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gambar</label>
                <div>
                    <img src="{{ asset('img-service/'.$item->item_img) }}" width="20%" alt="">
                </div><br>
                <input type="file" name="item_img" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection