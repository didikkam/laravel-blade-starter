@extends('layouts.auth')

@section('title', 'Login')

@section('heading', 'Welcome back')
@section('subheading', 'Sign in to your account to continue')

@section('content')
    <!-- Login Form -->
    <form id="loginForm" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                Email address
            </label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('email') border-red-300 focus:ring-red-500 @enderror"
                placeholder="Enter your email">
            <p class="mt-1 text-sm text-red-600 email-error invalid-feedback pl-1"></p>
        </div>

        <!-- Password Input -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                Password
            </label>
            <div class="relative">
                <input type="password" id="password" name="password" autocomplete="current-password"
                    class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('password') border-red-300 focus:ring-red-500 @enderror"
                    placeholder="Enter your password">
                <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 flex items-center pr-4">
                    <i id="eye-icon"
                        class="fa-regular fa-eye-slash w-5 h-5 text-gray-400 hover:text-gray-600 transition-colors"></i>
                </button>
            </div>
            <p class="mt-1 text-sm text-red-600 password-error invalid-feedback pl-1"></p>
        </div>

        <!-- Remember & Forgot Password -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 text-sm text-gray-700">
                    Remember me
                </label>
            </div>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-500 font-medium">
                    Forgot password?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.01] disabled:opacity-50 disabled:cursor-not-allowed">
            <span class="flex items-center justify-center">
                <img src="{{ asset('assets/icons/spinner.svg') }}" class="animate-spin -ml-1 mr-3 h-5 w-5 hidden"
                    id="loading-spinner" alt="Loading">
                <span id="button-text">Sign in</span>
            </span>
        </button>

        <!-- Divider -->
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-gray-50 text-gray-500">Or continue with</span>
            </div>
        </div>

        <!-- Social Login -->
        <div class="grid grid-cols-2 gap-3">
            <!-- Google Login -->
            <button type="button"
                class="w-full inline-flex justify-center items-center py-3 px-4 border border-gray-300 rounded-lg bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                <i class="fab fa-google text-[#EA4335]"></i>
                <span class="ml-2">Google</span>
            </button>

            <!-- Facebook Login -->
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
        Don't have an account?
        <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
            Sign up
        </a>
    </p>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Form submission with AJAX
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();

                const button = $(this).find('button[type="submit"]');
                const spinner = $('#loading-spinner');
                const buttonText = $('#button-text');

                $.ajax({
                    url: '{{ route('login') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        // Show loading state
                        button.prop('disabled', true);
                        spinner.removeClass('hidden');
                        buttonText.text('Signing in...');
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
                    buttonText.text('Sign in');
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
    </script>
@endpush
