@extends('admin.layouts.main-admin')
@section('title', 'Hero-Edit')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <form action="/hero-edit/{{ $hero->tipe }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $hero->judul }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Sub Judul</label>
                <input type="text" name="sub_judul" class="form-control" value="{{ $hero->sub_judul }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Link</label>
                <input type="text" name="link" class="form-control" value="{{ $hero->link }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection