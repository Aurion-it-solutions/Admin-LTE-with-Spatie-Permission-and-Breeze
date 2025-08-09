@extends('admin.layouts.main')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center">
        <h3 class="card-title flex-grow-1">User Details</h3>
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Roles</th>
                <td>
                    @if($user->roles->count())
                        @foreach($user->roles as $role)
                            <span class="badge bg-info">{{ $role->name }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">No roles assigned</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $user->created_at?->format('d M Y, H:i') ?? '-' }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $user->updated_at?->format('d M Y, H:i') ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="card-footer text-end">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Are you sure you want to delete this user?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </div>
</div>
@endsection
