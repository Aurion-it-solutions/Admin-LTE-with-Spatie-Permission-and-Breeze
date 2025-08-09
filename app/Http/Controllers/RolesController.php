<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view ('admin.roles.index',compact('roles'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.roles.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'guard_name' => 'required|string|in:web,api',
        ]);

        Role::create($validated);

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
        public function show($id)
        {
            // Fetch role with its permissions
            $role = Role::with('permissions')->findOrFail($id);

            return view('admin.roles.show', compact('role'));
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Fetch the role
        $role = Role::findOrFail($id);

        // Get all permissions to display in multi-select
        $permissions = Permission::all();

        // Get permission IDs already assigned to the role
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name'        => 'required|string|max:255',
        'guard_name'  => 'required|string',
        'permissions' => 'nullable|array',
        'permissions.*' => 'exists:permissions,id',
    ]);

    $role = Role::findOrFail($id);

    // Update basic role fields
    $role->update([
        'name'       => $validated['name'],
        'guard_name' => $validated['guard_name'],
    ]);

    // Convert IDs to Permission models
    $permissions = Permission::whereIn('id', $validated['permissions'] ?? [])->get();

    // Sync permissions with the role
    $role->syncPermissions($permissions);

    return redirect()
        ->route('roles.index')
        ->with('success', 'Role updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);

        // Remove all permissions first (optional but keeps DB clean)
        $role->permissions()->detach();

        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with('success', 'Role deleted successfully.');
    }

}
