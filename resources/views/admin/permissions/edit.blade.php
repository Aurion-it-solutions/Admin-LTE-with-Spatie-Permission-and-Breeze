@extends('admin.layouts.main')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center">
        <h3 class="card-title flex-grow-1 mb-0">Edit Permission</h3>
        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card-body">
        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="name">Permission Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name', $permission->name) }}" 
                    required
                >
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="guard_name">Guard Name</label>
                <input 
                    type="text" 
                    name="guard_name" 
                    id="guard_name" 
                    class="form-control @error('guard_name') is-invalid @enderror" 
                    value="{{ old('guard_name', $permission->guard_name) }}" 
                    required
                >
                @error('guard_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Permission</button>
        </form>
    </div>
</div>
@endsection
