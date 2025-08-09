@extends('admin.layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Role</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Role Name --}}
            <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $role->name) }}" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Guard Name --}}
            <div class="form-group mt-3">
                <label for="guard_name">Guard Name</label>
                <select name="guard_name" id="guard_name"
                        class="form-control @error('guard_name') is-invalid @enderror">
                    <option value="web" {{ old('guard_name', $role->guard_name) == 'web' ? 'selected' : '' }}>Web</option>
                    <option value="api" {{ old('guard_name', $role->guard_name) == 'api' ? 'selected' : '' }}>API</option>
                </select>
                @error('guard_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Permissions --}}
            <div class="form-group mt-3">
                <label for="permissions">Assign Permissions</label>
                <select name="permissions[]" id="permissions"
                        class="form-control select2 @error('permissions') is-invalid @enderror"
                        multiple="multiple" data-placeholder="Select permissions">
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}"
                            {{ in_array($permission->id, $rolePermissions) ? 'selected' : '' }}>
                            {{ $permission->name }}
                        </option>
                    @endforeach
                </select>
                @error('permissions')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Role
                </button>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<!-- Select2 -->
<script src="{{asset('lte3/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  $(function () {
    // Initialize Select2 Elements
    $('.select2').select2();

    // Initialize Select2 Elements with Bootstrap4 theme
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });
</script>
@endpush

