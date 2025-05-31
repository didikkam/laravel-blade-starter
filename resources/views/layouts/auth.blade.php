<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel')) - {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'slide-in': 'slideIn 0.6s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 2s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        },
                        slideIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateX(-30px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateX(0)'
                            },
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            }
                        },
                        pulseGlow: {
                            '0%': {
                                boxShadow: '0 0 5px rgba(59, 130, 246, 0.5)'
                            },
                            '100%': {
                                boxShadow: '0 0 20px rgba(59, 130, 246, 0.8)'
                            }
                        }
                    }
                }
            }
        }
    </script>

    @stack('styles')
</head>

<body class="min-h-screen bg-gray-50 font-inter">

    <!-- Main Container -->
    <div class="min-h-screen flex">

        <!-- Left Side - Form Content -->
        <div class="flex-1 flex items-center justify-center px-6 py-12 lg:px-8">

            <!-- Background decorative elements for mobile -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none lg:hidden">
                <div class="absolute top-20 left-10 w-32 h-32 bg-blue-500/5 rounded-full blur-xl"></div>
                <div class="absolute bottom-20 right-10 w-40 h-40 bg-purple-500/5 rounded-full blur-xl"></div>
            </div>

            <div class="w-full max-w-sm space-y-8 animate-fade-in relative z-10">

                <!-- Header -->
                <div class="text-center">
                    <!-- Logo -->
                    <div class="mx-auto w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mb-8">
                        @hasSection('logo')
                            @yield('logo')
                        @else
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        @endif
                    </div>

                    <!-- Title & Subtitle -->
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">
                        @yield('heading', 'Welcome back')
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        @yield('subheading', 'Sign in to your account to continue')
                    </p>
                </div>

                <!-- Alert Messages -->
                @if (session('status'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg" role="alert">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Main Content -->
                @yield('content')

                <!-- Additional Links -->
                @hasSection('links')
                    <div class="text-center">
                        @yield('links')
                    </div>
                @endif
            </div>
        </div>

        <!-- Right Side - Brand/Image -->
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

            <!-- Brand Content -->
            <div class="relative z-10 flex items-center justify-center w-full p-12">
                <div class="text-center text-white animate-slide-in">
                    @hasSection('brand')
                        @yield('brand')
                    @else
                        <div class="mb-8">
                            <div class="w-24 h-24 mx-auto bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h1 class="text-4xl font-bold mb-4">
                                Welcome to {{ config('app.name', 'Laravel') }}
                            </h1>
                            <p class="text-xl text-blue-100 leading-relaxed max-w-md mx-auto">
                                Build amazing applications with modern tools and clean architecture.
                            </p>
                        </div>

                        <!-- Default Features -->
                        <div class="space-y-4 max-w-sm mx-auto">
                            <div class="flex items-center space-x-3 text-blue-100">
                                <svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Secure authentication</span>
                            </div>
                            <div class="flex items-center space-x-3 text-blue-100">
                                <svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Modern UI/UX design</span>
                            </div>
                            <div class="flex items-center space-x-3 text-blue-100">
                                <svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Fast & reliable</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')
</body>

</html>
