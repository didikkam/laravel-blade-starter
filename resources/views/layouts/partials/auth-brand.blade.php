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