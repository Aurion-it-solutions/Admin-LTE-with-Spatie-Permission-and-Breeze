@extends('admin.layouts.main')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center">
        <h3 class="card-title flex-grow-1 mb-0">Role Details</h3>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $role->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $role->name }}</td>
            </tr>
            <tr>
                <th>Guard Name</th>
                <td>{{ $role->guard_name }}</td>
            </tr>
            <tr>
                <th>Permissions</th>
                <td>
                    @if($role->permissions->count())
                        @foreach($role->permissions as $permission)
                            <span class="badge bg-primary">{{ $permission->name }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">No permissions assigned</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $role->created_at?->format('d M Y, H:i') ?? '-' }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $role->updated_at?->format('d M Y, H:i') ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="card-footer text-end">
        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>

        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Are you sure you want to delete this role?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </div>
</div>
@endsection
