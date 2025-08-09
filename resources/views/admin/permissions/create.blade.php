{{-- resources/views/admin/permissions/create.blade.php --}}
@extends('admin.layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add New Permission</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Permission Name</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" placeholder="Enter permission name" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="guard_name">Guard Name</label>
                <select name="guard_name" id="guard_name"
                        class="form-control @error('guard_name') is-invalid @enderror">
                    <option value="web" {{ old('guard_name') == 'web' ? 'selected' : '' }}>Web</option>
                    <option value="api" {{ old('guard_name') == 'api' ? 'selected' : '' }}>API</option>
                </select>
                @error('guard_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Permission
                </button>
                <a href="{{ route('permissions.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
