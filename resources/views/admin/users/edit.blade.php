@extends('admin.layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit User</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text"
                       name="name"
                       id="name"
                       value="{{ old('name', $user->name) }}"
                       class="form-control @error('name') is-invalid @enderror"
                       required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email"
                       name="email"
                       id="email"
                       value="{{ old('email', $user->email) }}"
                       class="form-control @error('email') is-invalid @enderror"
                       required>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Roles --}}
            <div class="form-group mt-3">
                <label for="roles">Assign Roles</label>
                <select name="roles[]" id="roles"
                        class="form-control select2bs4 @error('roles') is-invalid @enderror"
                        multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}"
                            {{ in_array($role->name, $user->roles->pluck('name')->toArray()) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('roles')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update User
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
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
