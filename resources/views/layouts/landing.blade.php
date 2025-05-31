<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel News - Latest Web Development Updates</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s ease-in-out infinite',
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
                        slideUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(30px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-5px)'
                            },
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 font-sans">

    <!-- Navigation -->
    <nav class="fixed w-full bg-white/95 backdrop-blur-md border-b border-gray-200 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xl font-bold text-gray-900">Laravel News</span>
                        <div class="text-xs text-gray-500">Web Development Updates</div>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#home" class="text-blue-600 font-medium">Home</a>
                    <a href="#latest" class="text-gray-700 hover:text-blue-600 transition-colors">Latest</a>
                    <a href="#tutorials" class="text-gray-700 hover:text-blue-600 transition-colors">Tutorials</a>
                    <a href="#frameworks" class="text-gray-700 hover:text-blue-600 transition-colors">Frameworks</a>
                    <a href="#tools" class="text-gray-700 hover:text-blue-600 transition-colors">Tools</a>
                </div>

                <!-- Search & Actions -->
                <div class="hidden md:flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Search articles..."
                            class="w-64 px-4 py-2 pr-10 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <svg class="absolute right-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Subscribe
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="md:hidden p-2 rounded-md text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-4 pt-2 pb-3 space-y-1">
                <a href="#home" class="block px-3 py-2 text-blue-600 font-medium">Home</a>
                <a href="#latest" class="block px-3 py-2 text-gray-700">Latest</a>
                <a href="#tutorials" class="block px-3 py-2 text-gray-700">Tutorials</a>
                <a href="#frameworks" class="block px-3 py-2 text-gray-700">Frameworks</a>
                <div class="px-3 py-2">
                    <input type="text" placeholder="Search..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                </div>
                <div class="px-3 py-2">
                    <button class="w-full bg-blue-600 text-white py-2 rounded-lg">Subscribe</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-16 bg-gradient-to-br from-blue-50 via-white to-indigo-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Featured Article -->
            <div class="mb-12">
                <div
                    class="relative bg-white rounded-2xl shadow-xl overflow-hidden group hover:shadow-2xl transition-all duration-300">
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        <!-- Content -->
                        <div class="p-8 lg:p-12 flex flex-col justify-center">
                            <div class="flex items-center mb-4">
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full">FEATURED</span>
                                <span class="ml-3 text-gray-500 text-sm">5 hours ago</span>
                            </div>
                            <h1
                                class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors">
                                Laravel 11 Released: Revolutionary Features for Modern Web Development
                            </h1>
                            <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                                Discover the groundbreaking features in Laravel 11, including improved performance,
                                enhanced security, and new developer tools that will transform your workflow.
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://ui-avatars.com/api/?name=Taylor+Otwell&background=3b82f6&color=fff&size=40"
                                        class="w-10 h-10 rounded-full mr-3" alt="Author">
                                    <div>
                                        <div class="font-semibold text-gray-900">Taylor Otwell</div>
                                        <div class="text-sm text-gray-500">Laravel Creator</div>
                                    </div>
                                </div>
                                <button
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                                    Read More
                                </button>
                            </div>
                        </div>
                        <!-- Image -->
                        <div class="relative">
                            <div
                                class="h-64 lg:h-full bg-gradient-to-br from-blue-400 to-purple-600 flex items-center justify-center">
                                <div class="text-center text-white p-8">
                                    <div
                                        class="w-24 h-24 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4 animate-float">
                                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M23.642 5.43a.364.364 0 01.014.1v5.149c0 .135-.073.26-.189.326l-4.323 2.49v4.934a.378.378 0 01-.188.326L9.93 23.949a.316.316 0 01-.066.027c-.008.002-.016.008-.024.01a.348.348 0 01-.192 0c-.011-.002-.02-.008-.03-.012-.02-.008-.042-.014-.062-.025L.533 18.755a.376.376 0 01-.189-.326V2.974c0-.033.005-.066.014-.098.003-.012.01-.02.014-.032a.369.369 0 01.023-.058c.004-.013.015-.022.023-.033l.033-.045c.012-.01.025-.018.037-.027.014-.012.027-.024.041-.034H.53L5.043.05a.375.375 0 01.375 0L9.93 2.24h.002c.015.01.027.021.04.033.012.009.025.017.037.027l.014.018.018.022c.008.011.019.02.023.033.01.019.017.038.023.058.005.012.01.02.014.032.009.032.014.065.014.098v9.652l3.76-2.164V5.527c0-.033.004-.066.013-.098.003-.01.01-.02.013-.032a.487.487 0 01.024-.059c.007-.012.018-.02.025-.033.007-.013.015-.027.024-.04.008-.014.018-.02.03-.032l.04-.027H14L18.516.05a.375.375 0 01.375 0l4.513 2.19c.016.01.027.021.04.033.012.009.025.018.037.027.013.013.02.027.033.045.008.011.02.022.023.033.01.02.017.038.023.058.005.012.01.02.014.032.009.032.014.065.014.098v5.149c0 .135-.073.26-.189.326l-4.323 2.49v4.934a.378.378 0 01-.188.326L9.93 23.949z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-bold mb-2">Laravel 11</h3>
                                    <p class="text-blue-100">Revolutionary Features</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="bg-white rounded-xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                    <div class="text-2xl font-bold text-blue-600 mb-1">500+</div>
                    <div class="text-gray-600 text-sm">Articles Published</div>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                    <div class="text-2xl font-bold text-green-600 mb-1">50K+</div>
                    <div class="text-gray-600 text-sm">Daily Readers</div>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                    <div class="text-2xl font-bold text-purple-600 mb-1">100+</div>
                    <div class="text-gray-600 text-sm">Expert Authors</div>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                    <div class="text-2xl font-bold text-orange-600 mb-1">24/7</div>
                    <div class="text-gray-600 text-sm">Fresh Content</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Articles -->
    <section id="latest" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Latest Articles</h2>
                    <p class="text-gray-600">Stay updated with the newest web development trends</p>
                </div>
                <div class="flex space-x-2">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium">All</button>
                    <button class="px-4 py-2 text-gray-600 hover:text-blue-600 transition-colors">Laravel</button>
                    <button class="px-4 py-2 text-gray-600 hover:text-blue-600 transition-colors">PHP</button>
                    <button class="px-4 py-2 text-gray-600 hover:text-blue-600 transition-colors">JavaScript</button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Article 1 -->
                <article
                    class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 group border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">TUTORIAL</span>
                            <span class="ml-2 text-gray-500 text-sm">2 hours ago</span>
                        </div>
                        <h3
                            class="text-xl font-semibold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                            Building Real-time Applications with Laravel Reverb
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Learn how to implement WebSocket connections and real-time features using Laravel's new
                            Reverb package.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=John+Doe&background=22c55e&color=fff&size=32"
                                    class="w-8 h-8 rounded-full mr-2" alt="Author">
                                <span class="text-sm text-gray-700">John Doe</span>
                            </div>
                            <div class="flex items-center text-gray-500 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                8 min read
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 2 -->
                <article
                    class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 group border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <span
                                class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">NEWS</span>
                            <span class="ml-2 text-gray-500 text-sm">4 hours ago</span>
                        </div>
                        <h3
                            class="text-xl font-semibold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                            PHP 8.4 Alpha Released with New Features
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Explore the latest PHP 8.4 alpha release featuring property hooks, asymmetric visibility,
                            and more.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=8b5cf6&color=fff&size=32"
                                    class="w-8 h-8 rounded-full mr-2" alt="Author">
                                <span class="text-sm text-gray-700">Jane Smith</span>
                            </div>
                            <div class="flex items-center text-gray-500 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                5 min read
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 3 -->
                <article
                    class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 group border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <span
                                class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded">GUIDE</span>
                            <span class="ml-2 text-gray-500 text-sm">6 hours ago</span>
                        </div>
                        <h3
                            class="text-xl font-semibold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                            Advanced Eloquent Relationships Explained
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Master complex database relationships in Laravel with practical examples and best practices.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=f59e0b&color=fff&size=32"
                                    class="w-8 h-8 rounded-full mr-2" alt="Author">
                                <span class="text-sm text-gray-700">Mike Johnson</span>
                            </div>
                            <div class="flex items-center text-gray-500 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                12 min read
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 4 -->
                <article
                    class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 group border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded">TOOLS</span>
                            <span class="ml-2 text-gray-500 text-sm">8 hours ago</span>
                        </div>
                        <h3
                            class="text-xl font-semibold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                            10 Essential VS Code Extensions for Laravel
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Boost your Laravel development productivity with these must-have Visual Studio Code
                            extensions.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Sarah+Wilson&background=ef4444&color=fff&size=32"
                                    class="w-8 h-8 rounded-full mr-2" alt="Author">
                                <span class="text-sm text-gray-700">Sarah Wilson</span>
                            </div>
                            <div class="flex items-center text-gray-500 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                6 min read
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 5 -->
                <article
                    class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 group border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <span
                                class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2 py-1 rounded">SECURITY</span>
                            <span class="ml-2 text-gray-500 text-sm">1 day ago</span>
                        </div>
                        <h3
                            class="text-xl font-semibold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                            Laravel Security Best Practices 2025
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Comprehensive guide to securing your Laravel applications against common vulnerabilities and
                            threats.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=David+Brown&background=6366f1&color=fff&size=32"
                                    class="w-8 h-8 rounded-full mr-2" alt="Author">
                                <span class="text-sm text-gray-700">David Brown</span>
                            </div>
                            <div class="flex items-center text-gray-500 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                15 min read
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 6 -->
                <article
                    class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 group border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <span
                                class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">TIPS</span>
                            <span class="ml-2 text-gray-500 text-sm">1 day ago</span>
                        </div>
                        <h3
                            class="text-xl font-semibold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                            Optimizing Laravel Performance: Advanced Tips
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Learn advanced techniques to dramatically improve your Laravel application's performance and
                            speed.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Emma+Davis&background=eab308&color=fff&size=32"
                                    class="w-8 h-8 rounded-full mr-2" alt="Author">
                                <span class="text-sm text-gray-700">Emma Davis</span>
                            </div>
                            <div class="flex items-center text-gray-500 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                10 min read
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                    Load More Articles
                </button>
            </div>
        </div>
    </section>

    <!-- Sidebar Content -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Trending This Week</h2>

                    <!-- Trending Articles -->
                    <div class="space-y-6">
                        <article
                            class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-bold text-lg">01</span>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center mb-2">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded mr-2">TRENDING</span>
                                        <span class="text-gray-500 text-sm">3.2K views</span>
                                    </div>
                                    <h3
                                        class="text-lg font-semibold text-gray-900 mb-2 hover:text-blue-600 transition-colors cursor-pointer">
                                        Complete Guide to Laravel Queues and Job Processing
                                    </h3>
                                    <p class="text-gray-600 text-sm">Master background job processing in Laravel with
                                        practical examples and best practices.</p>
                                </div>
                            </div>
                        </article>

                        <article
                            class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-16 h-16 bg-gradient-to-br from-green-500 to-blue-600 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-bold text-lg">02</span>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center mb-2">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded mr-2">HOT</span>
                                        <span class="text-gray-500 text-sm">2.8K views</span>
                                    </div>
                                    <h3
                                        class="text-lg font-semibold text-gray-900 mb-2 hover:text-blue-600 transition-colors cursor-pointer">
                                        Building APIs with Laravel Sanctum Authentication
                                    </h3>
                                    <p class="text-gray-600 text-sm">Learn how to secure your Laravel APIs using
                                        Sanctum for SPA and mobile authentication.</p>
                                </div>
                            </div>
                        </article>

                        <article
                            class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-bold text-lg">03</span>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center mb-2">
                                        <span
                                            class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded mr-2">POPULAR</span>
                                        <span class="text-gray-500 text-sm">2.1K views</span>
                                    </div>
                                    <h3
                                        class="text-lg font-semibold text-gray-900 mb-2 hover:text-blue-600 transition-colors cursor-pointer">
                                        Laravel Livewire vs Alpine.js: Which to Choose?
                                    </h3>
                                    <p class="text-gray-600 text-sm">Compare Laravel Livewire and Alpine.js to make the
                                        right choice for your project needs.</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Newsletter Signup -->
                    <div class="bg-gradient-to-br from-blue-600 to-purple-700 rounded-xl p-6 text-white mb-8">
                        <h3 class="text-xl font-bold mb-3">Stay Updated</h3>
                        <p class="text-blue-100 mb-4 text-sm">Get the latest Laravel news and tutorials delivered to
                            your inbox.</p>
                        <div class="space-y-3">
                            <input type="email" placeholder="Your email address"
                                class="w-full px-4 py-2 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white/20">
                            <button
                                class="w-full bg-white text-blue-600 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                                Subscribe Now
                            </button>
                        </div>
                        <p class="text-xs text-blue-200 mt-3">No spam, unsubscribe anytime.</p>
                    </div>

                    <!-- Popular Tags -->
                    <div class="bg-white rounded-xl p-6 shadow-sm mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Popular Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm hover:bg-blue-200 cursor-pointer transition-colors">Laravel</span>
                            <span
                                class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm hover:bg-green-200 cursor-pointer transition-colors">PHP</span>
                            <span
                                class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm hover:bg-purple-200 cursor-pointer transition-colors">Eloquent</span>
                            <span
                                class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm hover:bg-yellow-200 cursor-pointer transition-colors">Blade</span>
                            <span
                                class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm hover:bg-red-200 cursor-pointer transition-colors">API</span>
                            <span
                                class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm hover:bg-indigo-200 cursor-pointer transition-colors">Security</span>
                            <span
                                class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 cursor-pointer transition-colors">Testing</span>
                            <span
                                class="bg-pink-100 text-pink-800 px-3 py-1 rounded-full text-sm hover:bg-pink-200 cursor-pointer transition-colors">Livewire</span>
                        </div>
                    </div>

                    <!-- Recent Comments -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Comments</h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <img src="https://ui-avatars.com/api/?name=Alex+Chen&background=3b82f6&color=fff&size=32"
                                    class="w-8 h-8 rounded-full flex-shrink-0" alt="Commenter">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Alex Chen</div>
                                    <div class="text-xs text-gray-500 mb-1">on Laravel 11 Features</div>
                                    <div class="text-sm text-gray-600">"Great explanation of the new features!"</div>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <img src="https://ui-avatars.com/api/?name=Maria+Garcia&background=10b981&color=fff&size=32"
                                    class="w-8 h-8 rounded-full flex-shrink-0" alt="Commenter">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Maria Garcia</div>
                                    <div class="text-xs text-gray-500 mb-1">on Livewire Tutorial</div>
                                    <div class="text-sm text-gray-600">"This saved me hours of debugging!"</div>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <img src="https://ui-avatars.com/api/?name=James+Wilson&background=8b5cf6&color=fff&size=32"
                                    class="w-8 h-8 rounded-full flex-shrink-0" alt="Commenter">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">James Wilson</div>
                                    <div class="text-xs text-gray-500 mb-1">on Security Guide</div>
                                    <div class="text-sm text-gray-600">"Essential reading for every developer."</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold">Laravel News</span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md">
                        Your go-to source for Laravel tutorials, news, and web development insights.
                        Stay ahead with the latest trends and best practices.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-gray-800 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="bg-gray-800 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                        <a href="#" class="bg-gray-800 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.118.112.221.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.747 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001.012.001z" />
                            </svg>
                        </a>
                        <a href="#" class="bg-gray-800 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.5.75C6.146.75 1 5.896 1 12.25c0 5.089 3.292 9.387 7.863 10.91.575-.105.79-.251.79-.556v-1.923c-3.206.697-3.881-1.544-3.881-1.544-.522-1.327-1.275-1.681-1.275-1.681-1.044-.713.079-.698.079-.698 1.153.081 1.76 1.184 1.76 1.184 1.025 1.757 2.688 1.25 3.344.955.105-.743.401-1.25.73-1.538-2.555-.29-5.24-1.279-5.24-5.692 0-1.257.45-2.285 1.184-3.092-.118-.29-.513-1.463.112-3.048 0 0 .963-.309 3.158 1.179.916-.255 1.899-.382 2.876-.387.977.005 1.96.132 2.876.387 2.195-1.488 3.158-1.179 3.158-1.179.625 1.585.23 2.758.112 3.048.734.807 1.184 1.835 1.184 3.092 0 4.423-2.688 5.398-5.247 5.684.412.354.78 1.055.78 2.126v3.154c0 .308.215.457.795.379A11.252 11.252 0 0 0 24 12.25C24 5.896 18.854.75 12.5.75z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About Us</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Write for
                                Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Advertise</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy
                                Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of
                                Service</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Categories</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Laravel</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">PHP</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">JavaScript</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Vue.js</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">React</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">DevOps</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <div class="text-gray-400 text-sm mb-4 md:mb-0">
                    © 2025 Laravel News. All rights reserved.
                </div>
                <div class="flex items-center space-x-4 text-sm text-gray-400">
                    <span>Made with ❤️ for developers</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Add scroll effect to navigation
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.classList.add('shadow-lg');
            } else {
                nav.classList.remove('shadow-lg');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);

        // Observe all articles
        document.querySelectorAll('article').forEach(article => {
            observer.observe(article);
        });
    </script>

</body>

</html>
