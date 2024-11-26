@extends('admin.layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
    </div>

    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $category['nama'] }}</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ $category['posts_count'] }} Posts
                            </div>
                            <p class="mt-2 text-muted">
                                {{ $category['description'] }}
                            </p>
                        </div>
                        <div class="col-auto">
                            @if($category['nama'] === 'Galeri')
                                <i class="fas fa-images fa-2x text-gray-300"></i>
                            @elseif($category['nama'] === 'Berita')
                                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                            @else
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Posts by Category -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Posts by Category</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Total Posts</th>
                                    <th>Last Updated</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <i class="fas fa-folder text-primary mr-2"></i>
                                        {{ $category['nama'] }}
                                    </td>
                                    <td>{{ $category['posts_count'] }}</td>
                                    <td>{{ date('d M Y') }}</td>
                                    <td>
                                        <span class="badge bg-success text-white">Active</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
