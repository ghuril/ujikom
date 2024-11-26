@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create {{ request('type') == 'agenda' ? 'Agenda' : 'Berita' }}</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="kategori_id" value="{{ request('type') == 'agenda' ? 3 : 2 }}">
                
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="isi" class="form-control" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Save {{ request('type') == 'agenda' ? 'Agenda' : 'Berita' }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
