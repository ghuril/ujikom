@extends('admin.layouts.app')

@section('title', 'Photo Management')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Photo Management</h1>
        <a href="{{ route('foto.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Photo
        </a>
    </div>

    <div class="row">
        @foreach($fotos as $foto)
        <div class="col-md-3 mb-4">
            <div class="card shadow">
                <img src="{{ asset('storage/' . $foto->file) }}" 
                     class="card-img-top" 
                     alt="Photo"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <p class="card-text">{{ $foto->galery->post->judul ?? 'No Gallery' }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('foto.edit', $foto->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('foto.destroy', $foto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
