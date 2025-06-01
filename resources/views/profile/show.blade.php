@extends('layouts.admin')

@section('title', 'My Profile')

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
            <li aria-current="page">
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-base text-gray-400 mx-2 align-middle"></i>
                    <span class="text-sm font-medium text-gray-500 ml-2">My Profile</span>
                </div>
            </li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4">My Profile</h2>
        <p class="text-gray-600 mb-6">Update your personal information and password</p>

        <form id="profileForm" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Full Name
                </label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    placeholder="Enter your full name">
                <p class="mt-1 text-sm text-red-600 name-error invalid-feedback pl-1"></p>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email Address
                </label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    placeholder="Enter your email address">
                <p class="mt-1 text-sm text-red-600 email-error invalid-feedback pl-1"></p>
            </div>

            <!-- Current Password -->
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                    Current Password
                </label>
                <div class="relative">
                    <input type="password" id="current_password" name="current_password"
                        class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        placeholder="Enter current password">
                    <button type="button" onclick="togglePassword('current_password', 'eye-icon-current')"
                        class="absolute inset-y-0 right-0 flex items-center pr-4">
                        <i id="eye-icon-current"
                            class="fa-regular fa-eye-slash w-5 h-5 text-gray-400 hover:text-gray-600 transition-colors"></i>
                    </button>
                </div>
                <p class="mt-1 text-sm text-red-600 current_password-error invalid-feedback pl-1"></p>
            </div>

            <!-- New Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    New Password
                </label>
                <div class="relative">
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        placeholder="Enter new password">
                    <button type="button" onclick="togglePassword('password', 'eye-icon-new')"
                        class="absolute inset-y-0 right-0 flex items-center pr-4">
                        <i id="eye-icon-new"
                            class="fa-regular fa-eye-slash w-5 h-5 text-gray-400 hover:text-gray-600 transition-colors"></i>
                    </button>
                </div>
                <p class="mt-1 text-sm text-red-600 password-error invalid-feedback pl-1"></p>
            </div>

            <!-- Confirm New Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                    Confirm New Password
                </label>
                <div class="relative">
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        placeholder="Confirm new password">
                    <button type="button" onclick="togglePassword('password_confirmation', 'eye-icon-confirm')"
                        class="absolute inset-y-0 right-0 flex items-center pr-4">
                        <i id="eye-icon-confirm"
                            class="fa-regular fa-eye-slash w-5 h-5 text-gray-400 hover:text-gray-600 transition-colors"></i>
                    </button>
                </div>
                <p class="mt-1 text-sm text-red-600 password_confirmation-error invalid-feedback pl-1"></p>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.01] disabled:opacity-50 disabled:cursor-not-allowed">
                    <span class="flex items-center">
                        <img src="{{ asset('assets/icons/spinner.svg') }}"
                            class="animate-spin -ml-1 mr-3 h-5 w-5 hidden" id="loading-spinner" alt="Loading">
                        <span id="button-text">Update Profile</span>
                    </span>
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Form submission with AJAX
            $('#profileForm').on('submit', function(e) {
                e.preventDefault();

                const button = $(this).find('button[type="submit"]');
                const spinner = $('#loading-spinner');
                const buttonText = $('#button-text');

                $.ajax({
                    url: '{{ route('profile.update') }}',
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
                    buttonText.text('Update Profile');
                });
            });
        });

        // Password visibility toggle
        function togglePassword(inputId, iconId) {
            const passwordInput = $('#' + inputId);
            const eyeIcon = $('#' + iconId);

            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                passwordInput.attr('type', 'password');
                eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            }
        }
    </script>
@endpush 