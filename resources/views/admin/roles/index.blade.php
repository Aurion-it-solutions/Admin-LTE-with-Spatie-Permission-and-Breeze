@extends('admin.layouts.main')

@section('content')



<div class="row mb-3">
    <div class="col-md-4">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-user-shield"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Roles</span>
                <span class="info-box-number">{{ $roles->count() }}</span>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex align-items-center">
        <h3 class="card-title flex-grow-1">All Roles</h3>
        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
            @forelse($roles as $role)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ route('roles.show', $role->id) }}">
                        {{ $role->name }}
                    </a>
                </td>
                <td>
                    @if($role->permissions->count())
                        @foreach($role->permissions as $permission)
                            <span class="badge badge-info badge-sm">{{ $permission->name }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">No permissions assigned</span>
                    @endif
                </td>

                <td>{{ $role->created_at?->format('Y-m-d') ?? '-' }}</td>
                <td>{{ $role->updated_at?->format('Y-m-d') ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No data to display</td>
            </tr>
            @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Guard Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $("#example1").DataTable({
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        pageLength: 10,
        stateSave: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        fixedHeader: true,
        colReorder: true,
        rowReorder: true,
        language: {
            search: "Search:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            infoEmpty: "No entries available",
            infoFiltered: "(filtered from _MAX_ total entries)",
            zeroRecords: "Nothing found",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            },
        }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>


@endpush
