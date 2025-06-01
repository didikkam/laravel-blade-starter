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
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
        @include('layouts.partials.auth-brand')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/ajax-core.js') }}"></script>
    
    <!-- Global Scripts -->
    <script>
        // Add smooth focus effects to all inputs
        $(document).ready(function() {
            $('input:not([type="hidden"]), textarea, select').on('focus', function() {
                $(this).addClass('transform scale-[1.01]');
            }).on('blur', function() {
                $(this).removeClass('transform scale-[1.01]');
            });
        });
    </script>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>

</html>
