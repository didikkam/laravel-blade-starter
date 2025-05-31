<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laravel App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'slide-in': 'slideIn 0.6s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(10px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        },
                        slideIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateX(-20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateX(0)'
                            },
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-gray-50 font-inter">

    <!-- Main Container -->
    <div class="min-h-screen flex">

        <!-- Left Side - Login Form -->
        <div class="flex-1 flex items-center justify-center px-6 py-12 lg:px-8">
            <div class="w-full max-w-sm space-y-8 animate-fade-in">

                <!-- Header -->
                <div class="text-center">
                    <!-- Logo -->
                    <div class="mx-auto w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mb-8">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>

                    <!-- Title -->
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">
                        Welcome back
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Sign in to your account to continue
                    </p>
                </div>

                <!-- Form -->
                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email address
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            autocomplete="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            placeholder="Enter your email">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                autocomplete="current-password"
                                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                placeholder="Enter your password">
                            <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <svg id="eye-icon" class="w-5 h-5 text-gray-400 hover:text-gray-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 text-sm text-gray-700">
                                Remember me
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-blue-600 hover:text-blue-500 font-medium">
                            Forgot password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.01]">
                        Sign in
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
                        <button type="button"
                            class="w-full inline-flex justify-center items-center py-3 px-4 border border-gray-300 rounded-lg bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                            <svg class="w-5 h-5 text-red-500" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                <path fill="currentColor"
                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                <path fill="currentColor"
                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                <path fill="currentColor"
                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                            </svg>
                            <span class="ml-2">Google</span>
                        </button>

                        <button type="button"
                            class="w-full inline-flex justify-center items-center py-3 px-4 border border-gray-300 rounded-lg bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                            <span class="ml-2">Facebook</span>
                        </button>
                    </div>
                </form>

                <!-- Register Link -->
                <p class="text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                        Sign up
                    </a>
                </p>
            </div>
        </div>

        <!-- Right Side - Image/Brand -->
        <div class="hidden lg:flex flex-1 relative bg-gradient-to-br from-blue-600 to-blue-800">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800"></div>

            <!-- Geometric Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 left-10 w-32 h-32 border border-white/20 rounded-lg rotate-12"></div>
                <div class="absolute top-40 right-20 w-24 h-24 border border-white/20 rounded-full"></div>
                <div class="absolute bottom-32 left-16 w-20 h-20 border border-white/20 rounded-lg -rotate-45"></div>
                <div class="absolute bottom-20 right-32 w-16 h-16 border border-white/20 rounded-full"></div>
                <div class="absolute top-1/2 left-1/4 w-12 h-12 border border-white/20 rounded-lg rotate-45"></div>
            </div>

            <!-- Floating Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-20 right-10 w-2 h-2 bg-white/30 rounded-full animate-pulse"></div>
                <div class="absolute top-60 left-20 w-1 h-1 bg-white/40 rounded-full animate-pulse"
                    style="animation-delay: 0.5s;"></div>
                <div class="absolute bottom-40 right-40 w-1.5 h-1.5 bg-white/25 rounded-full animate-pulse"
                    style="animation-delay: 1s;"></div>
                <div class="absolute bottom-60 left-32 w-1 h-1 bg-white/35 rounded-full animate-pulse"
                    style="animation-delay: 1.5s;"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 flex items-center justify-center w-full p-12">
                <div class="text-center text-white animate-slide-in">
                    <div class="mb-8">
                        <div
                            class="w-24 h-24 mx-auto bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h1 class="text-4xl font-bold mb-4">
                            Welcome to Laravel
                        </h1>
                        <p class="text-xl text-blue-100 leading-relaxed max-w-md mx-auto">
                            Build amazing applications with modern tools and clean architecture.
                        </p>
                    </div>

                    <!-- Features -->
                    <div class="space-y-4 max-w-sm mx-auto">
                        <div class="flex items-center space-x-3 text-blue-100">
                            <svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Secure authentication</span>
                        </div>
                        <div class="flex items-center space-x-3 text-blue-100">
                            <svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Modern UI/UX design</span>
                        </div>
                        <div class="flex items-center space-x-3 text-blue-100">
                            <svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Fast & reliable</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }

        // Add smooth focus effects
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');

            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.classList.add('transform', 'scale-[1.01]');
                });

                input.addEventListener('blur', function() {
                    this.classList.remove('transform', 'scale-[1.01]');
                });
            });
        });
    </script>
</body>

</html>
