@extends('layouts.admin')

@section('title', 'Edit User')

@section('breadcrumb')
    <nav class="flex justify-between items-center" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <i class="fas fa-home text-base align-middle"></i>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-base text-gray-400 mx-2 align-middle"></i>
                    <a href="{{ route('admin.users.index') }}"
                        class="text-sm font-medium text-gray-700 hover:text-blue-600 ml-2">Users</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-base text-gray-400 mx-2 align-middle"></i>
                    <span class="text-sm font-medium text-gray-500 ml-2">Edit</span>
                </div>
            </li>
        </ol>
        <a href="{{ route('admin.users.index') }}"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 hover:text-blue-600">
            <i class="fas fa-arrow-left text-base align-middle mr-2"></i>
            Back
        </a>
    </nav>
@endsection

@section('content')
    <div class="p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4">Edit User</h2>
        <p class="text-gray-600 mb-6">Update the user details below</p>

        <form id="editUserForm" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    placeholder="Enter user name" required>
                <p class="mt-1 text-sm text-red-600 name-error invalid-feedback pl-1"></p>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    placeholder="Enter email address" required>
                <p class="mt-1 text-sm text-red-600 email-error invalid-feedback pl-1"></p>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    placeholder="Enter new password">
                <p class="mt-1 text-sm text-gray-500">Leave blank to keep current password</p>
                <p class="mt-1 text-sm text-red-600 password-error invalid-feedback pl-1"></p>
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    placeholder="Confirm new password">
                <p class="mt-1 text-sm text-red-600 password_confirmation-error invalid-feedback pl-1"></p>
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                <select name="role" id="role"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                    <option value="">Select a role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ $userRole && $userRole->name === $role->name ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                <p class="mt-1 text-sm text-red-600 role-error invalid-feedback pl-1"></p>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.01] disabled:opacity-50 disabled:cursor-not-allowed">
                <span class="flex items-center justify-center">
                    <img src="{{ asset('assets/icons/spinner.svg') }}" class="animate-spin -ml-1 mr-3 h-5 w-5 hidden"
                        id="loading-spinner" alt="Loading">
                    <span id="button-text">Update User</span>
                </span>
            </button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#editUserForm').on('submit', function(e) {
                e.preventDefault();

                const button = $(this).find('button[type="submit"]');
                const spinner = $('#loading-spinner');
                const buttonText = $('#button-text');

                $.ajax({
                    url: '{{ route('admin.users.update', $user->id) }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        // Show loading state
                        button.prop('disabled', true);
                        spinner.removeClass('hidden');
                        buttonText.text('Updating...');
                    },
                    success: function(response) {
                        showResponse.show(response);
                    },
                    error: function(xhr) {
                        // default ajax-core.js
                    }
                }).always(function() {
                    // Reset button state
                    button.prop('disabled', false);
                    spinner.addClass('hidden');
                    buttonText.text('Update User');
                });
            });
        });
    </script>
@endpush
