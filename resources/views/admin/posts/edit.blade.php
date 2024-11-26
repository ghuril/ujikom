@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit {{ $post->kategori_id == 3 ? 'Agenda' : 'Berita' }}</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="kategori_id" value="{{ $post->kategori_id }}">
                
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="judul" class="form-control" value="{{ $post->judul }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="isi" class="form-control" rows="5" required>{{ $post->isi }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    @if($post->gambar)
                        <div class="mb-2">
                            <img src="{{ asset($post->gambar) }}" alt="Current Image" style="max-height: 200px">
                        </div>
                    @endif
                    <input type="file" name="gambar" class="form-control">
                    <small class="text-muted">Leave empty to keep current image</small>
                </div>

                <button type="submit" class="btn btn-primary">Update {{ $post->kategori_id == 3 ? 'Agenda' : 'Berita' }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
