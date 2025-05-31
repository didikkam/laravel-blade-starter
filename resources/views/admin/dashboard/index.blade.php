<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Laravel App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'slide-down': 'slideDown 0.3s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideDown: {
                            '0%': { opacity: '0', transform: 'translateY(-10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-white shadow-lg flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out fixed lg:relative z-50 h-full">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-center h-16 bg-blue-600 border-b border-blue-700 flex-shrink-0">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold text-white">Laravel App</h1>
                </div>
            </div>

            <!-- Sidebar Navigation -->
            <div class="flex-1 overflow-y-auto">
                <nav class="mt-5 px-3 pb-4">
                    <div class="space-y-2">
                        <!-- Dashboard -->
                        <a href="#" onclick="showContent('dashboard')" class="nav-item bg-blue-50 text-blue-700 border-r-2 border-blue-500 group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg">
                            <svg class="text-blue-500 mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 5 4-4 4 4"></path>
                            </svg>
                            Dashboard
                        </a>

                        <!-- Posts Management -->
                        <div class="space-y-1">
                            <button onclick="toggleSubmenu('posts')" class="nav-item text-gray-700 hover:bg-gray-100 hover:text-gray-900 group flex items-center w-full px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
                                <svg class="text-gray-500 mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                                Posts
                                <svg id="posts-arrow" class="ml-auto h-4 w-4 transform transition-transform text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                            <div id="posts-submenu" class="hidden ml-8 space-y-1">
                                <a href="#" onclick="showContent('posts-list')" class="nav-item text-gray-600 hover:bg-gray-100 hover:text-gray-900 group flex items-center px-3 py-2 text-sm rounded-lg transition-colors">
                                    All Posts
                                </a>
                                <a href="#" onclick="showContent('posts-create')" class="nav-item text-gray-600 hover:bg-gray-100 hover:text-gray-900 group flex items-center px-3 py-2 text-sm rounded-lg transition-colors">
                                    Create Post
                                </a>
                            </div>
                        </div>

                        <!-- User Management -->
                        <div class="space-y-1">
                            <button onclick="toggleSubmenu('users')" class="nav-item text-gray-700 hover:bg-gray-100 hover:text-gray-900 group flex items-center w-full px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
                                <svg class="text-gray-500 mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                User Management
                                <svg id="users-arrow" class="ml-auto h-4 w-4 transform transition-transform text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                            <div id="users-submenu" class="hidden ml-8 space-y-1">
                                <a href="#" onclick="showContent('users-list')" class="nav-item text-gray-600 hover:bg-gray-100 hover:text-gray-900 group flex items-center px-3 py-2 text-sm rounded-lg transition-colors">
                                    All Users
                                </a>
                                <a href="#" onclick="showContent('roles-permissions')" class="nav-item text-gray-600 hover:bg-gray-100 hover:text-gray-900 group flex items-center px-3 py-2 text-sm rounded-lg transition-colors">
                                    Roles & Permissions
                                </a>
                            </div>
                        </div>

                        <!-- Settings -->
                        <a href="#" onclick="showContent('settings')" class="nav-item text-gray-700 hover:bg-gray-100 hover:text-gray-900 group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
                            <svg class="text-gray-500 mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </a>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col lg:ml-0">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex items-center">
                            <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                            <h1 id="page-title" class="ml-3 text-2xl font-semibold text-gray-900">Dashboard</h1>
                        </div>

                        <div class="flex items-center space-x-4">
                            <!-- Notifications -->
                            <button class="p-2 text-gray-400 hover:text-gray-500 rounded-full">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-3-3M15 17l-3-3M15 17v-7a6 6 0 00-6-6v0a6 6 0 00-6 6v7l-3 3h5m9 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                            </button>

                            <!-- User dropdown -->
                            <div class="relative">
                                <button onclick="toggleUserMenu()" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=John+Doe&background=3b82f6&color=fff" alt="User avatar">
                                    <span class="ml-3 text-gray-700 text-sm font-medium hidden md:block">John Doe</span>
                                    <svg class="ml-2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-auto bg-gray-50">
                <div class="p-6">

                    <!-- Dashboard Content -->
                    <div id="dashboard-content" class="content-section">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                            <!-- Stats Cards -->
                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Total Posts</dt>
                                                <dd class="text-lg font-medium text-gray-900">24</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Total Users</dt>
                                                <dd class="text-lg font-medium text-gray-900">156</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Page Views</dt>
                                                <dd class="text-lg font-medium text-gray-900">1,234</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Growth Rate</dt>
                                                <dd class="text-lg font-medium text-gray-900">+12%</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="bg-white shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Recent Activity</h3>
                                <div class="space-y-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm text-gray-900">New post created: "Getting Started with Laravel"</p>
                                            <p class="text-sm text-gray-500">2 hours ago</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm text-gray-900">New user registered: john.doe@example.com</p>
                                            <p class="text-sm text-gray-500">4 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Other content sections here (hidden initially) -->
                    <div id="posts-list-content" class="content-section hidden">
                        <h2 class="text-xl font-semibold mb-4">Posts List</h2>
                        <!-- Posts content here -->
                    </div>

                    <div id="posts-create-content" class="content-section hidden">
                        <h2 class="text-xl font-semibold mb-4">Create Post</h2>
                        <!-- Create post form here -->
                    </div>

                    <div id="users-list-content" class="content-section hidden">
                        <h2 class="text-xl font-semibold mb-4">Users List</h2>
                        <!-- Users content here -->
                    </div>

                    <div id="roles-permissions-content" class="content-section hidden">
                        <h2 class="text-xl font-semibold mb-4">Roles & Permissions</h2>
                        <!-- Roles content here -->
                    </div>

                    <div id="settings-content" class="content-section hidden">
                        <h2 class="text-xl font-semibold mb-4">Settings</h2>
                        <!-- Settings content here -->
                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- Sidebar overlay for mobile -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-gray-600 bg-opacity-75 z-40 lg:hidden hidden"></div>

    <script>
        // Sidebar toggle for mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        // Close sidebar when clicking overlay
        document.getElementById('sidebar-overlay').addEventListener('click', function() {
            toggleSidebar();
        });

        // Submenu toggle
        function toggleSubmenu(menu) {
            const submenu = document.getElementById(menu + '-submenu');
            const arrow = document.getElementById(menu + '-arrow');

            submenu.classList.toggle('hidden');
            arrow.classList.toggle('rotate-90');
        }

        // User menu toggle
        function toggleUserMenu() {
            const userMenu = document.getElementById('user-menu');
            userMenu.classList.toggle('hidden');
        }

        // Close user menu when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('user-menu');
            const userButton = event.target.closest('button');

            if (!userButton || !userButton.onclick || userButton.onclick.toString().indexOf('toggleUserMenu') === -1) {
                userMenu.classList.add('hidden');
            }
        });

        // Content switching
        function showContent(contentId) {
            // Hide all content sections
            const contentSections = document.querySelectorAll('.content-section');
            contentSections.forEach(section => {
                section.classList.add('hidden');
            });

            // Show selected content
            const targetContent = document.getElementById(contentId + '-content');
            if (targetContent) {
                targetContent.classList.remove('hidden');
                targetContent.classList.add('animate-fade-in');
            }

            // Update page title
            const titles = {
                'dashboard': 'Dashboard',
                'posts-list': 'All Posts',
                'posts-create': 'Create Post',
                'users-list': 'User Management',
                'roles-permissions': 'Roles & Permissions',
                'settings': 'Settings'
            };

            document.getElementById('page-title').textContent = titles[contentId] || 'Dashboard';

            // Update active nav item
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.classList.remove('bg-blue-50', 'text-blue-700', 'border-r-2', 'border-blue-500');
                item.classList.add('text-gray-700', 'hover:bg-gray-100', 'hover:text-gray-900');
            });

            // Add active state to current item (simplified for demo)
            if (contentId === 'dashboard') {
                const dashboardLink = document.querySelector('a[onclick="showContent(\'dashboard\')"]');
                if (dashboardLink) {
                    dashboardLink.classList.remove('text-gray-700', 'hover:bg-gray-100', 'hover:text-gray-900');
                    dashboardLink.classList.add('bg-blue-50', 'text-blue-700', 'border-r-2', 'border-blue-500');
                }
            }

            // Close sidebar on mobile after selection
            if (window.innerWidth < 1024) {
                toggleSidebar();
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            showContent('dashboard');
        });
    </script>
</body>
</html>
