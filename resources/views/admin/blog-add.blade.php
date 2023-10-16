@extends('admin.layouts.main-admin')
@section('title', 'Add Content')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <form action="/blog-post" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                <textarea type="text" id="summernote" name="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gambar</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection