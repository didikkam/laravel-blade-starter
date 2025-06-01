<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;
use App\Exceptions\ResponseException;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Role::with('permissions');

            if ($request->has('search') && $request->search['value']) {
                $search = $request->search['value'];
                $query = $query->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
                $request->merge(['search' => ['value' => '']]);
            }

            return DataTables::of($query)
                ->addColumn('permissions', function ($role) {
                    return $role->permissions->pluck('name')->implode(', ');
                })
                ->make(true);
        }

        return view('admin.roles.index');
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|unique:roles,name',
                'permissions' => 'required|array',
                'permissions.*' => 'exists:permissions,name'
            ]);

            $role = Role::create(['name' => $validated['name']]);
            $role->syncPermissions($validated['permissions']);

            return $this->getSuccessResponse(
                'Role created successfully',
                null,
                route('admin.roles.index')
            );
        } catch (\Exception $e) {
            return $this->getExceptionResponse($e, 'Role Creation Error');
        }
    }

    public function show(Role $role)
    {
        $role->load('permissions');
        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $role->load('permissions');
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|unique:roles,name,' . $role->id,
                'permissions' => 'required|array',
                'permissions.*' => 'exists:permissions,name'
            ]);

            $role->update(['name' => $validated['name']]);
            $role->syncPermissions($validated['permissions']);

            return $this->getSuccessResponse(
                'Role updated successfully',
                null,
                route('admin.roles.index')
            );
        } catch (\Exception $e) {
            return $this->getExceptionResponse($e, 'Role Update Error');
        }
    }

    public function destroy(Role $role)
    {
        try {
            if ($role->name === 'Super Admin') {
                throw new ResponseException(
                    'Cannot delete Super Admin role',
                    ResponseException::HTTP_FORBIDDEN
                );
            }

            $role->delete();

            return $this->getSuccessResponse(
                'Role deleted successfully'
            );
        } catch (\Exception $e) {
            return $this->getExceptionResponse($e, 'Role Deletion Error');
        }
    }
} 