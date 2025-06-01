@extends('layouts.auth')

@section('title', 'Register')

@section('heading', 'Create your account')
@section('subheading', 'Join us and start your journey today')

@section('content')
    <!-- Register Form -->
    <form id="registerForm" class="space-y-6">
        @csrf

        <!-- Name Input -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                Full Name
            </label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('name') border-red-300 focus:ring-red-500 @enderror"
                placeholder="Enter your full name">
            <p class="mt-1 text-sm text-red-600 name-error invalid-feedback pl-1"></p>
        </div>

        <!-- Email Input -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                Email address
            </label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('email') border-red-300 focus:ring-red-500 @enderror"
                placeholder="Enter your email address">
            <p class="mt-1 text-sm text-red-600 email-error invalid-feedback pl-1"></p>
        </div>

        <!-- Password Input -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                Password
            </label>
            <div class="relative">
                <input type="password" id="password" name="password" required autocomplete="new-password"
                    class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('password') border-red-300 focus:ring-red-500 @enderror"
                    placeholder="Create a password">
                <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 flex items-center pr-4">
                    <i id="eye-icon"
                        class="fa-regular fa-eye-slash w-5 h-5 text-gray-400 hover:text-gray-600 transition-colors"></i>
                </button>
            </div>
            <p class="mt-1 text-sm text-red-600 password-error invalid-feedback pl-1"></p>
        </div>

        <!-- Confirm Password Input -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                Confirm Password
            </label>
            <div class="relative">
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    autocomplete="new-password"
                    class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    placeholder="Confirm your password">
                <button type="button" onclick="toggleConfirmPassword()" class="absolute inset-y-0 right-0 flex items-center pr-4">
                    <i id="eye-icon-confirm"
                        class="fa-regular fa-eye-slash w-5 h-5 text-gray-400 hover:text-gray-600 transition-colors"></i>
                </button>
            </div>
            <p class="mt-1 text-sm text-red-600 password_confirmation-error invalid-feedback pl-1"></p>
        </div>

        <!-- Terms and Conditions -->
        <div class="flex items-start">
            <input id="terms" name="terms" type="checkbox" required
                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded mt-0.5">
            <label for="terms" class="ml-2 text-sm text-gray-700">
                I agree to the
                <a href="#" class="text-blue-600 hover:text-blue-500 font-medium">Terms of Service</a>
                and
                <a href="#" class="text-blue-600 hover:text-blue-500 font-medium">Privacy Policy</a>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.01] disabled:opacity-50 disabled:cursor-not-allowed">
            <span class="flex items-center justify-center">
                <img src="{{ asset('assets/icons/spinner.svg') }}" class="animate-spin -ml-1 mr-3 h-5 w-5 hidden"
                    id="loading-spinner" alt="Loading">
                <span id="button-text">Create Account</span>
            </span>
        </button>

        <!-- Divider -->
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-gray-50 text-gray-500">Or sign up with</span>
            </div>
        </div>

        <!-- Social Registration -->
        <div class="grid grid-cols-2 gap-3">
            <!-- Google Registration -->
            <button type="button"
                class="w-full inline-flex justify-center items-center py-3 px-4 border border-gray-300 rounded-lg bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                <i class="fab fa-google text-[#EA4335]"></i>
                <span class="ml-2">Google</span>
            </button>

            <!-- Facebook Registration -->
            <button type="button"
                class="w-full inline-flex justify-center items-center py-3 px-4 border border-gray-300 rounded-lg bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                <i class="fab fa-facebook text-[#1877F2]"></i>
                <span class="ml-2">Facebook</span>
            </button>
        </div>
    </form>
@endsection

@section('links')
    <p class="text-sm text-gray-600">
        Already have an account?
        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
            Sign in
        </a>
    </p>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Form submission with AJAX
            $('#registerForm').on('submit', function(e) {
                e.preventDefault();

                const button = $(this).find('button[type="submit"]');
                const spinner = $('#loading-spinner');
                const buttonText = $('#button-text');

                $.ajax({
                    url: '{{ route('register') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        // Show loading state
                        button.prop('disabled', true);
                        spinner.removeClass('hidden');
                        buttonText.text('Creating Account...');
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
                    buttonText.text('Create Account');
                });
            });
        });

        // Password visibility toggle
        function togglePassword() {
            const passwordInput = $('#password');
            const eyeIcon = $('#eye-icon');

            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                passwordInput.attr('type', 'password');
                eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            }
        }

        function toggleConfirmPassword() {
            const passwordInput = $('#password_confirmation');
            const eyeIcon = $('#eye-icon-confirm');

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
