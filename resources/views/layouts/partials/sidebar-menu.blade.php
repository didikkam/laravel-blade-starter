<!-- Dashboard -->
<a href="{{ route('admin.dashboard') }}"
    class="nav-item {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
    <i
        class="fas fa-home {{ request()->routeIs('admin.dashboard') ? 'text-blue-500' : 'text-gray-500' }} mr-3 text-lg leading-none"></i>
    Dashboard
</a>

<!-- Content Management Section -->
@can('admin.posts.index')
    <div class="mb-4">
        <h3 class="px-3 mb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
            CONTENT MANAGEMENT
        </h3>

        <!-- Posts Menu -->
        <a href="{{ route('admin.posts.index') }}"
            class="nav-item {{ request()->routeIs('admin.posts.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
            <i
                class="fas fa-newspaper {{ request()->routeIs('admin.posts.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 text-lg leading-none"></i>
            Posts
        </a>
    </div>
@endcan

<!-- User Management Section -->
@canany(['admin.users.index', 'admin.roles.index'])
    <div class="mb-4">
        <h3 class="px-3 mb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
            USER MANAGEMENT
        </h3>

        <!-- Users Menu -->
        @can('admin.users.index')
            <a href="{{ route('admin.users.index') }}"
                class="nav-item {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
                <i
                    class="fas fa-users {{ request()->routeIs('admin.users.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 text-lg leading-none"></i>
                Users
            </a>
        @endcan

        @can('admin.roles.index')
            <a href="{{ route('admin.roles.index') }}"
                class="nav-item {{ request()->routeIs('admin.roles.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
                <i
                    class="fas fa-user-shield {{ request()->routeIs('admin.roles.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 text-lg leading-none"></i>
                Roles & Permissions
            </a>
        @endcan
    </div>
@endcanany

<!-- Divider -->
<div class="border-t border-gray-200 my-4"></div>

<!-- Settings -->
@can('admin.settings.index')
    <a href="{{ route('admin.dashboard') ?? '#' }}"
        class="nav-item {{ request()->routeIs('settings.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
        <i
            class="fas fa-cog {{ request()->routeIs('settings.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 text-lg leading-none"></i>
        Settings
    </a>
@endcan

<!-- Help & Support -->
<a href="{{ route('admin.dashboard') ?? '#' }}"
    class="nav-item {{ request()->routeIs('help.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
    <i
        class="fas fa-question-circle {{ request()->routeIs('help.*') ? 'text-blue-500' : 'text-gray-500' }} mr-3 text-lg leading-none"></i>
    Help & Support
</a>
