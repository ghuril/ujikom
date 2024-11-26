@extends('admin.layouts.app')

@section('title', 'Edit Gallery')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Gallery</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('galeri.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="judul">Title</label>
                    <input type="text" name="judul" class="form-control" id="judul" value="{{ $post->judul }}" required>
                </div>

                <div class="form-group">
                    <label for="gambar">Image</label>
                    <input type="file" name="gambar" class="form-control-file" id="gambar">
                    @if($post->gambar)
                        <img src="{{ asset($post->gambar) }}" alt="Current Image" class="img-thumbnail mt-2" style="height: 100px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
