@extends('admin.layouts.app')

@section('title', ucfirst($type) . ' Management')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ ucfirst($type) }} Management</h1>
        <a href="{{ route('posts.create') }}?type={{ $type }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New {{ ucfirst($type) }}
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->judul }}</td>
                            <td>
                                <img src="{{ asset($post->gambar) }}" alt="Thumbnail" style="height: 50px;">
                            </td>
                            <td>{{ $post->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('posts.edit', $post->id) }}?type={{ $type }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection