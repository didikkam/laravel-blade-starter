@extends('layouts.admin')

@section('title', 'User Details')

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
                    <a href="{{ route('admin.users.index') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 ml-2">Users</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-base text-gray-400 mx-2 align-middle"></i>
                    <span class="text-sm font-medium text-gray-500 ml-2">Details</span>
                </div>
            </li>
        </ol>
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 hover:text-blue-600">
            <i class="fas fa-arrow-left text-base align-middle mr-2"></i>
            Back
        </a>
    </nav>
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">User Details</h2>
            <div class="flex space-x-3">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <i class="fas fa-edit w-4 h-4 mr-2"></i>
                    Edit User
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Name</h3>
                    <p class="mt-1 text-sm text-gray-900">{{ $user->name }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">Email</h3>
                    <p class="mt-1 text-sm text-gray-900">{{ $user->email }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">Created At</h3>
                    <p class="mt-1 text-sm text-gray-900">{{ $user->created_at->format('d M Y H:i') }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">Last Updated</h3>
                    <p class="mt-1 text-sm text-gray-900">{{ $user->updated_at->format('d M Y H:i') }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">Roles</h3>
                    <div class="mt-2 space-x-2">
                        @forelse($roles as $role)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $role->name }}
                            </span>
                        @empty
                            <span class="text-sm text-gray-500">No roles assigned</span>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <!-- Additional user information can be added here -->
            </div>
        </div>
    </div>
</div>
@endsection 