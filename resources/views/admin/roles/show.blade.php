@extends('layouts.admin')

@section('title', 'View Role')

@section('breadcrumb')
    <nav class="flex justify-between items-center" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <i class="fas fa-home text-base align-middle"></i>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-base text-gray-400 mx-2 align-middle"></i>
                    <a href="{{ route('admin.roles.index') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 ml-2">Roles</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-base text-gray-400 mx-2 align-middle"></i>
                    <span class="text-sm font-medium text-gray-500 ml-2">View Role</span>
                </div>
            </li>
        </ol>
        <a href="{{ route('admin.roles.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 hover:text-blue-600">
            <i class="fas fa-arrow-left text-base align-middle mr-2"></i>
            Back
        </a>
    </nav>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Role Details Card -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-6 py-5">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-xl font-semibold text-gray-900">Role Details</h3>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.roles.edit', $role) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-edit w-4 h-4 mr-2"></i>
                        Edit Role
                    </a>
                </div>
            </div>

            <!-- Details List -->
            <div class="border-t border-gray-200 mt-6">
                <dl class="divide-y divide-gray-200">
                    <div class="py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="text-sm text-gray-900 col-span-2">{{ $role->name }}</dd>
                    </div>
                    <div class="py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Guard Name</dt>
                        <dd class="text-sm text-gray-900 col-span-2">{{ $role->guard_name }}</dd>
                    </div>
                    <div class="py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Created At</dt>
                        <dd class="text-sm text-gray-900 col-span-2">
                            {{ $role->created_at->format('d M Y H:i') }}
                        </dd>
                    </div>
                    <div class="py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                        <dd class="text-sm text-gray-900 col-span-2">
                            {{ $role->updated_at->format('d M Y H:i') }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Role Permissions Card -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-6 py-5">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Permissions</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @forelse($role->permissions as $permission)
                    <div class="bg-blue-50 px-4 py-2 rounded-md">
                        <span class="text-sm text-blue-700">{{ $permission->name }}</span>
                    </div>
                @empty
                    <div class="col-span-3">
                        <p class="text-sm text-gray-500">No permissions assigned to this role.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection 