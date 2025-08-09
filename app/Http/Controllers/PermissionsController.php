<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionsController extends Controller
{
    public function index ()
    {
          $permissions = Permission::all(); // Assuming you use Spatie's Permission model
        return view ('admin.permissions.index',compact('permissions'));
    }
    public function create()
    {
        return view ('admin.permissions.create');
    }
    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
            'guard_name' => 'required|string|max:255',
        ]);

        // Create the permission
        Permission::create($validated);

        // Redirect with success message
        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permission created successfully.');
    }
    public function show(Permission $permission)
    {
        return view('admin.permissions.show', compact('permission'));
    }
    public function edit($id)
    {
        // Find permission or throw 404
        $permission = Permission::findOrFail($id);

        // Return the edit view
        return view('admin.permissions.edit', compact('permission'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
            'guard_name' => 'required|string|max:255',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permission updated successfully.');
    }
}
