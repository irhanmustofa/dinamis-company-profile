@extends('admin.layouts.main-admin')
@section('title', 'Add Content')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <form action="/blog-edit/{{ $blog->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                <textarea type="text" id="summernote" name="description" class="form-control" required>{{ $blog->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gambar</label>
                <div>
                    <img src="{{ asset('img-blog/'.$blog->image) }}" alt="" class="img-thumbnail w-25">
                </div>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection