@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('heading', 'Forgot your password?')
@section('subheading', 'Enter your email and we\'ll send you a link to reset your password')

@section('brand')
    <div class="mb-8">
        <div class="w-24 h-24 mx-auto bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6">
            <i class="far fa-envelope w-12 h-12 text-white"></i>
        </div>
        <h1 class="text-4xl font-bold mb-4">
            Password Recovery
        </h1>
        <p class="text-xl text-blue-100 leading-relaxed max-w-md mx-auto">
            Don't worry, we'll help you get back into your account securely.
        </p>
    </div>

    <!-- Features -->
    <div class="space-y-4 max-w-sm mx-auto">
        <div class="flex items-center space-x-3 text-blue-100">
            <i class="fas fa-check-circle w-5 h-5 text-green-300"></i>
            <span>Secure reset process</span>
        </div>
        <div class="flex items-center space-x-3 text-blue-100">
            <i class="fas fa-shield-alt w-5 h-5 text-green-300"></i>
            <span>Email verification</span>
        </div>
        <div class="flex items-center space-x-3 text-blue-100">
            <i class="fas fa-bolt w-5 h-5 text-green-300"></i>
            <span>Quick & reliable</span>
        </div>
    </div>
@endsection

@section('content')
    <!-- Forgot Password Form -->
    <form id="forgotPasswordForm" class="space-y-6">
        @csrf

        <!-- Instructions -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle h-5 w-5 text-blue-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        We'll send a password reset link to your email address. The link will expire in 60 minutes for
                        security reasons.
                    </p>
                </div>
            </div>
        </div>

        <!-- Email Input -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                Email address
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="far fa-at h-5 w-5 text-gray-400"></i>
                </div>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    autocomplete="email" autofocus
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('email') border-red-300 focus:ring-red-500 @enderror"
                    placeholder="Enter your email address">
            </div>
            <p class="mt-1 text-sm text-red-600 email-error invalid-feedback pl-1"></p>
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.01] disabled:opacity-50 disabled:cursor-not-allowed">
            <span class="flex items-center justify-center">
                <img src="{{ asset('assets/icons/spinner.svg') }}" class="animate-spin -ml-1 mr-3 h-5 w-5 hidden"
                    id="loading-spinner" alt="Loading">
                <span id="button-text">Send Reset Link</span>
            </span>
        </button>

        <!-- Alternative Actions -->
        <div class="space-y-3">
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Remember your password?
                    <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                        Back to Sign In
                    </a>
                </p>
            </div>

            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Need an account?
                    <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                        Sign up
                    </a>
                </p>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Form submission with AJAX
            $('#forgotPasswordForm').on('submit', function(e) {
                e.preventDefault();

                const button = $(this).find('button[type="submit"]');
                const spinner = $('#loading-spinner');
                const buttonText = $('#button-text');

                $.ajax({
                    url: '{{ route('password.request') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        // Show loading state
                        button.prop('disabled', true);
                        spinner.removeClass('hidden');
                        buttonText.text('Sending...');
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
                    buttonText.text('Send Reset Link');
                });
            });
        });
    </script>
@endpush
