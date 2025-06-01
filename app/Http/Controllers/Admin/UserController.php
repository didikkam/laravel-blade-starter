<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\ResponseException;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with('roles');

            // Apply custom search
            if ($request->has('search') && $request->search['value']) {
                $search = $request->search['value'];
                $query = $query->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%");
                });
                $request->merge(['search' => ['value' => '']]);
            }

            if (empty($request->order)) {
                $query = $query->orderBy('created_at', 'desc');
            }

            return DataTables::of($query)
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->format('d M Y H:i');
                })
                ->addColumn('roles', function ($user) {
                    return $user->roles->pluck('name')->implode(', ');
                })
                ->make(true);
        }

        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|exists:roles,name',
            ]);

            $validated['password'] = Hash::make($validated['password']);

            $user = User::create($validated);
            $user->assignRole($request->role);

            return $this->getSuccessResponse(
                'User created successfully',
                null,
                route('admin.users.index')
            );
        } catch (\Exception $e) {
            return $this->getExceptionResponse($e, 'User Creation Error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $roles = $user->roles;
        return view('admin.users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $userRole = $user->roles->first();
        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:8|confirmed',
                'role' => 'required|exists:roles,name',
            ]);

            if (isset($validated['password'])) {
                $validated['password'] = Hash::make($validated['password']);
            } else {
                unset($validated['password']);
            }

            $user->update($validated);
            $user->syncRoles([$request->role]);

            return $this->getSuccessResponse(
                'User updated successfully',
                null,
                route('admin.users.index')
            );
        } catch (\Exception $e) {
            return $this->getExceptionResponse($e, 'User Update Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            if ($user->getKey() === Auth::id()) {
                throw new ResponseException(
                    'You cannot delete your own account',
                    ResponseException::HTTP_FORBIDDEN
                );
            }

            if ($user->hasRole('Super Admin')) {
                throw new ResponseException(
                    'Cannot delete Super Admin user',
                    ResponseException::HTTP_FORBIDDEN
                );
            }
            
            $user->delete();

            return $this->getSuccessResponse(
                'User deleted successfully'
            );
        } catch (\Exception $e) {
            return $this->getExceptionResponse($e, 'User Deletion Error');
        }
    }
} 