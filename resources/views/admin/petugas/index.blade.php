@extends('admin.layouts.app')

@section('title', 'Staff Management')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Staff Management</h1>
        <a href="{{ route('petugas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Staff
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($petugas as $staff)
                        <tr>
                            <td>{{ $staff->nama }}</td>
                            <td>{{ $staff->username }}</td>
                            <td>{{ $staff->email }}</td>
                            <td>{{ ucfirst($staff->role) }}</td>
                            <td>
                                <a href="{{ route('petugas.edit', $staff->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('petugas.destroy', $staff->id) }}" method="POST" class="d-inline">
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