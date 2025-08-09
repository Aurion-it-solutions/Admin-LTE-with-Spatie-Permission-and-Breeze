@extends('admin.layouts.main')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center">
        <h3 class="card-title flex-grow-1 mb-0">Permission Details</h3>
        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $permission->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $permission->name }}</td>
            </tr>
            <tr>
                <th>Guard Name</th>
                <td>{{ $permission->guard_name }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $permission->created_at?->format('d M Y, H:i') ?? '-' }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $permission->updated_at?->format('d M Y, H:i') ?? '-' }}</td>
            </tr>
        </table>

        <div class="mt-3 d-flex justify-content-end gap-2">
            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary mr-3">Edit</a>

            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" 
                  onsubmit="return confirm('Are you sure you want to delete this permission?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
