<!-- Dashboard -->
<a href="{{ route('admin.dashboard') }}"
    class="nav-item {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
    <svg class="{{ request()->routeIs('admin.dashboard') ? 'text-blue-500' : 'text-gray-500' }} mr-3 h-5 w-5"
        fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 5 4-4 4 4"></path>
    </svg>
    Dashboard
</a>

<!-- Content Management Section -->
<div class="mb-4">
    <h3 class="px-3 mb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
        CONTENT MANAGEMENT
    </h3>
    
    <!-- Posts Menu -->
    <a href="{{ route('admin.posts.index') }}"
        class="nav-item {{ request()->routeIs('admin.posts.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
        <i class="fas fa-newspaper {{ request()->routeIs('admin.posts.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 text-lg leading-none"></i>
        Posts
    </a>
</div>

<!-- User Management Section -->
<div class="mb-4">
    <h3 class="px-3 mb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
        USER MANAGEMENT
    </h3>
    
    <!-- Users Menu -->
    <a href="{{ route('admin.users.index') }}"
        class="nav-item {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
        <i class="fas fa-users {{ request()->routeIs('admin.users.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 text-lg leading-none"></i>
        Users
    </a>

    <!-- Roles Menu -->
    <a href="{{ route('admin.roles.index') }}"
        class="nav-item {{ request()->routeIs('admin.roles.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
        <i class="fas fa-user-shield {{ request()->routeIs('admin.roles.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 text-lg leading-none"></i>
        Roles & Permissions
    </a>
</div>

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


<!-- Divider -->
<div class="border-t border-gray-200 my-4"></div>

<!-- Settings -->
{{-- @can('manage settings') --}}
<a href="{{ route('admin.dashboard') ?? '#' }}"
    class="nav-item {{ request()->routeIs('settings.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
    <i class="fas fa-cog {{ request()->routeIs('settings.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 text-lg leading-none"></i>
    Settings
</a>
{{-- @endcan --}}

<!-- Help & Support -->
<a href="{{ route('admin.dashboard') ?? '#' }}"
    class="nav-item {{ request()->routeIs('help.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
    <i class="fas fa-question-circle {{ request()->routeIs('help.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 text-lg leading-none"></i>
    Help & Support
</a>
