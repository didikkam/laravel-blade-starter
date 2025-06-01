<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styles -->
    @stack('styles')
</head>

<body class="h-full font-sans antialiased">
    <div class="min-h-full flex">
        <!-- Sidebar -->
        <div id="sidebar"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 transform -translate-x-full lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center h-16 bg-blue-600 border-b border-blue-700">
                    <a href="{{ route('landing') }}" class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-white">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-4 py-4 space-y-3 overflow-y-auto">
                    @include('layouts.partials.sidebar-menu')
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0">
            @include('layouts.partials.header')

            <!-- Breadcrumb -->
            <div class="bg-white border-b border-gray-200">
                <div class="px-4 py-4 sm:px-6 lg:px-8">
                    @yield('breadcrumb')
                </div>
            </div>

            <!-- Page Content -->
            <main class="flex-1 py-6">
                <div class="mx-auto px-4 sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200">
                <div class="mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="py-4">
                        <p class="text-center text-sm text-gray-500">
                            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/ajax-core.js') }}"></script>

    <script>
        // Toggle sidebar for mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        // Toggle dropdowns
        function toggleNotifications() {
            const menu = document.getElementById('notifications-menu');
            menu.classList.toggle('hidden');
        }

        function toggleUserMenu() {
            const menu = document.getElementById('user-menu');
            menu.classList.toggle('hidden');
        }

        function toggleSubmenu(id) {
            const submenu = document.getElementById(`${id}-submenu`);
            const arrow = document.getElementById(`${id}-arrow`);
            submenu.classList.toggle('hidden');
            arrow.classList.toggle('rotate-90');
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const notificationsButton = event.target.closest('button[onclick="toggleNotifications()"]');
            const notificationsMenu = document.getElementById('notifications-menu');
            const userButton = event.target.closest('button[onclick="toggleUserMenu()"]');
            const userMenu = document.getElementById('user-menu');

            if (!notificationsButton && notificationsMenu && !notificationsMenu.contains(event.target)) {
                notificationsMenu.classList.add('hidden');
            }

            if (!userButton && userMenu && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
    
    <!-- Additional Scripts -->
    @stack('scripts')

</body>

</html>
