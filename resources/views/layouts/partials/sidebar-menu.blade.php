<!-- Dashboard -->
<a href="{{ route('admin.dashboard') }}"
    class="nav-item {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
    <svg class="{{ request()->routeIs('admin.dashboard') ? 'text-blue-500' : 'text-gray-500' }} mr-3 h-5 w-5" fill="none"
        stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 5 4-4 4 4"></path>
    </svg>
    Dashboard
</a>

<!-- Posts Management -->
{{-- @canany(['view posts', 'create posts', 'edit posts', 'delete posts']) --}}
    <div class="space-y-1">
        <button onclick="toggleSubmenu('posts')"
            class="nav-item {{ request()->routeIs('posts.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center w-full px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
            <svg class="{{ request()->routeIs('posts.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 h-5 w-5" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                </path>
            </svg>
            Posts
            <svg id="posts-arrow"
                class="ml-auto h-4 w-4 transform transition-transform text-gray-400 {{ request()->routeIs('posts.*') ? 'rotate-90' : '' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
        <div id="posts-submenu" class="{{ request()->routeIs('posts.*') ? '' : 'hidden' }} ml-8 space-y-1">
            {{-- @can('view posts') --}}
                <a href="{{ route('admin.posts.index') }}"
                    class="nav-item {{ request()->routeIs('posts.index') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm rounded-lg transition-colors">
                    All Posts
                </a>
            {{-- @endcan --}}

            {{-- @can('create posts') --}}
                <a href="{{ route('admin.posts.create') }}"
                    class="nav-item {{ request()->routeIs('posts.create') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm rounded-lg transition-colors">
                    Create Post
                </a>
            {{-- @endcan --}}

            {{-- @can('view posts') --}}
                <a href="{{ route('admin.posts.categories') ?? '#' }}"
                    class="nav-item {{ request()->routeIs('posts.categories') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm rounded-lg transition-colors">
                    Categories
                </a>
            {{-- @endcan --}}
        </div>
    </div>
{{-- @endcanany --}}

<!-- User Management -->
{{-- @canany(['view users', 'create users', 'edit users', 'delete users', 'manage roles']) --}}
    <div class="space-y-1">
        <button onclick="toggleSubmenu('users')"
            class="nav-item {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center w-full px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
            <svg class="{{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 h-5 w-5"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                </path>
            </svg>
            User Management
            <svg id="users-arrow"
                class="ml-auto h-4 w-4 transform transition-transform text-gray-400 {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'rotate-90' : '' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
        <div id="users-submenu"
            class="{{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? '' : 'hidden' }} ml-8 space-y-1">
            {{-- @can('view users') --}}
                <a href="{{ route('admin.users.index') }}"
                    class="nav-item {{ request()->routeIs('users.index') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm rounded-lg transition-colors">
                    All Users
                </a>
            {{-- @endcan --}}

            {{-- @can('manage roles') --}}
                <a href="{{ route('admin.roles.index') ?? '#' }}"
                    class="nav-item {{ request()->routeIs('roles.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm rounded-lg transition-colors">
                    Roles & Permissions
                </a>
            {{-- @endcan --}}
        </div>
    </div>
{{-- @endcanany --}}

<!-- Reports -->
{{-- @can('view reports') --}}
    <div class="space-y-1">
        <button onclick="toggleSubmenu('reports')"
            class="nav-item {{ request()->routeIs('reports.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center w-full px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
            <svg class="{{ request()->routeIs('reports.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 h-5 w-5"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                </path>
            </svg>
            Reports
            <svg id="reports-arrow"
                class="ml-auto h-4 w-4 transform transition-transform text-gray-400 {{ request()->routeIs('reports.*') ? 'rotate-90' : '' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
        <div id="reports-submenu" class="{{ request()->routeIs('reports.*') ? '' : 'hidden' }} ml-8 space-y-1">
            <a href="{{ route('admin.reports.analytics') ?? '#' }}"
                class="nav-item {{ request()->routeIs('reports.analytics') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm rounded-lg transition-colors">
                Analytics
            </a>
            <a href="{{ route('admin.reports.users') ?? '#' }}"
                class="nav-item {{ request()->routeIs('reports.users') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm rounded-lg transition-colors">
                User Reports
            </a>
            <a href="{{ route('admin.reports.activity') ?? '#' }}"
                class="nav-item {{ request()->routeIs('reports.activity') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm rounded-lg transition-colors">
                Activity Logs
            </a>
        </div>
    </div>
{{-- @endcan --}}

<!-- Media Library -->
{{-- @can('manage media') --}}
    <a href="{{ route('admin.media.index') ?? '#' }}"
        class="nav-item {{ request()->routeIs('media.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
        <svg class="{{ request()->routeIs('media.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 h-5 w-5" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
            </path>
        </svg>
        Media Library
    </a>
{{-- @endcan --}}

<!-- Divider -->
<div class="border-t border-gray-200 my-4"></div>

<!-- Settings -->
{{-- @can('manage settings') --}}
    <a href="{{ route('admin.settings.index') ?? '#' }}"
        class="nav-item {{ request()->routeIs('settings.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
        <svg class="{{ request()->routeIs('settings.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 h-5 w-5"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
            </path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
            </path>
        </svg>
        Settings
    </a>
{{-- @endcan --}}

<!-- Help & Support -->
<a href="{{ route('admin.help.index') ?? '#' }}"
    class="nav-item {{ request()->routeIs('help.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
    <svg class="{{ request()->routeIs('help.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 h-5 w-5" fill="none"
        stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
        </path>
    </svg>
    Help & Support
</a>
