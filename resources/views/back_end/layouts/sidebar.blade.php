<!-- Brand Logo -->
<a href="/" class="brand-link">
    <x-app.application-logo-mini width="27" />
    <x-app.application-logo-gray width="102" />
    <span class="brand-text font-weight-light">{{ $application->data['app_name'] }}</span>
</a>
<div style="padding:12px">

</div>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <x-user.user-profile-image />
        </div>
        <div class="info">
            <a href="/admin/dashboard" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    @can('Sidebar Search Menu')
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
    @endcan {{-- Sidebar Search Menu --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar nav-compact nav-child-indent flex-column" data-widget="treeview"
            role="menu" data-accordion="false">
            {{-- Dashboard Menu Start --}}
            @can('Dashboard Menu')
                <x-sidebar.sidebar-nav-level head="Dashboard" href="{{ route('back-end.dashboard') }}" menu_open=""
                    active="{{ request()->is('admin/dashboard') ? 'active' : '' }}" menu_icon="fas fa-tachometer-alt"
                    drop_icon="" />
            @endcan {{-- Dashboard Menu End --}}
            {{-- profile Menu Start --}}
            @can('Profile Menu')
                <x-sidebar.sidebar-nav-level head="Profile" href="{{ route('profile.edit') }}" menu_open=""
                    active="{{ request()->is('admin/profile') ? 'active' : '' }}" menu_icon="fa fa-user" drop_icon="" />
            @endcan {{-- profile Menu End --}}
            {{-- @can('Admin Section Menu') --}}
            @canany(['Developer Settings Read'])
                <x-sidebar.sidebar-nav-header head="Developer Section" />

                {{-- Masters Menu Start --}}
                @canany(['Developer Settings Read'])
                    <x-sidebar.sidebar-nav-level head="Developer Settings" href="#"
                        menu_open="{{ request()->is('developer/settings*') ? 'menu-open' : '' }}"
                        active="{{ request()->is('developer/settings/*') ? 'active' : '' }} {{ request()->is('developer/settings/*') ? 'active' : '' }}"
                        menu_icon="fa fa-cogs" drop_icon="fas fa-angle-left">
                        {{-- App Settings Menu Start --}}
                        @can('App Settings Read')
                            <x-sidebar.sidebar-nav-multi-level head="App Settings" href="{{ route('app-settings.index') }}"
                                menu_open="" active="{{ request()->is('developer/settings/app-settings*') ? 'active' : '' }}"
                                menu_icon="fa fa-wrench" drop_icon="" />
                        @endcan {{-- App Settings Menu End --}}
                        {{-- Developer Settings Menu Start --}}
                        @can('Developer Settings Read')
                            <x-sidebar.sidebar-nav-multi-level head="Developer Settings"
                                href="{{ route('developer-settings.index') }}" menu_open=""
                                active="{{ request()->is('developer/settings/developer-settings*') ? 'active' : '' }}"
                                menu_icon="fa fa-wrench" drop_icon="" />
                        @endcan {{-- Blood Menu End --}}
                    </x-sidebar.sidebar-nav-level>
                @endcanany {{-- Masters Menu End --}}

            @endcanany {{-- Masters Menu End --}}
            {{-- @can('Admin Section Menu') --}}
            @canany(['Admin Settings', 'User Settings', 'User Read', 'Price List Read', 'Blood Read', 'Permission Read',
                'Price List Read', 'Activity Logs Read'])
                <x-sidebar.sidebar-nav-header head="Admin Section" />


                {{-- Masters Menu Start --}}
                @canany(['Blood Read'])
                    <x-sidebar.sidebar-nav-level head="Masters" href="#"
                        menu_open="{{ request()->is('admin/masters*') ? 'menu-open' : '' }}"
                        active="{{ request()->is('admin/masters/*') ? 'active' : '' }}" menu_icon="fa fa-folder-open"
                        drop_icon="fas fa-angle-left">
                        {{-- Blood Menu Start --}}
                        @can('Blood Read')
                            <x-sidebar.sidebar-nav-multi-level head="Bloods" href="{{ route('bloods.index') }}" menu_open=""
                                active="{{ request()->is('admin/masters/bloods*') ? 'active' : '' }}" menu_icon="fa fa-tint"
                                drop_icon="" />
                        @endcan {{-- Blood Menu End --}}
                    </x-sidebar.sidebar-nav-level>
                @endcanany {{-- Masters Menu End --}}

                {{-- settings Menu Start --}}
                @canany(['Admin Settings', 'User Settings'])
                    <x-sidebar.sidebar-nav-level head="Settings" href="#"
                        menu_open="{{ request()->is('admin/settings*') ? 'menu-open' : '' }}"
                        active="{{ request()->is('admin/settings/*') ? 'active' : '' }}" menu_icon="fa fa-cogs"
                        drop_icon="fas fa-angle-left">
                        {{-- Blood Menu Start --}}
                        @can('Blood Read')
                            <x-sidebar.sidebar-nav-multi-level head="Admin Settings" href="{{ route('admin-settings.index') }}"
                                menu_open="" active="{{ request()->is('admin/settings/admin-settings*') ? 'active' : '' }}"
                                menu_icon="fa fa-wrench" drop_icon="" />
                        @endcan {{-- Blood Menu End --}}
                    </x-sidebar.sidebar-nav-level>
                @endcanany {{-- settings Menu End --}}

                {{-- price-lists Menu Start --}}
                @canany(['Price List Read'])
                    <x-sidebar.sidebar-nav-level head="Thaya" href="#"
                        menu_open="{{ request()->is('admin/price-lists*') ? 'menu-open' : '' }}"
                        active="{{ request()->is('admin/price-lists*') ? 'active' : '' }}" menu_icon="fa fa-folder-open"
                        drop_icon="fas fa-angle-left">
                        {{-- Blood Menu Start --}}
                        @can('Price List Read')
                            <x-sidebar.sidebar-nav-multi-level head="Price Lists" href="{{ route('price-lists.index') }}"
                                menu_open="" active="{{ request()->is('admin/price-lists*') ? 'active' : '' }}"
                                menu_icon="fa fa-money" drop_icon="" />
                        @endcan {{-- Blood Menu End --}}
                    </x-sidebar.sidebar-nav-level>
                @endcanany {{-- price-lists Menu End --}}


                {{-- Users Management Start --}}
                @canany(['User Read', 'Role Read', 'Permission Read', 'Activity Logs Read'])
                    <x-sidebar.sidebar-nav-level head="Users Management" href="#"
                        menu_open="{{ request()->is('admin/users-management*') ? 'menu-open' : '' }}"
                        active="{{ request()->is('admin/users-management/*') ? 'active' : '' }}" menu_icon="fa fa-folder-open"
                        drop_icon="fas fa-angle-left">
                        {{-- User Menu Start --}}
                        @can('User Read')
                            <x-sidebar.sidebar-nav-multi-level head="Users" href="{{ route('users.index') }}" menu_open=""
                                active="{{ request()->is('admin/users-management/users*') ? 'active' : '' }}"
                                menu_icon="fa fa-users" drop_icon="" />
                        @endcan {{-- User Menu End --}}
                        {{-- Role Menu --}}
                        @can('Role Read')
                            <x-sidebar.sidebar-nav-multi-level head="Roles" href="{{ route('roles.index') }}" menu_open=""
                                active="{{ request()->is('admin/users-management/roles*') ? 'active' : '' }}"
                                menu_icon="fa fa-user-secret" drop_icon="" />
                        @endcan {{-- Role Menu End --}}
                        {{-- Permission Menu --}}
                        @can('Permission Read')
                            <x-sidebar.sidebar-nav-multi-level head="Permission" href="{{ route('permissions.index') }}"
                                menu_open=""
                                active="{{ request()->is('admin/users-management/permissions*') ? 'active' : '' }}"
                                menu_icon="fa fa-lock" drop_icon="" />
                        @endcan {{-- Permission Menu End --}}
                        {{-- Menu Activity Logs --}}
                        @can('Activity Logs Read')
                            <x-sidebar.sidebar-nav-multi-level head="Activity Logs" href="{{ route('activityLogs.index') }}"
                                menu_open=""
                                active="{{ request()->is('admin/users-management/activity-logs*') ? 'active' : '' }}"
                                menu_icon="fa fa-history" drop_icon="" />
                        @endcan {{-- Activity Logs Menu End --}}
                    </x-sidebar.sidebar-nav-level>
                @endcanany {{-- Users Management Menu --}}
            @endcanany {{-- Admin Aection Menu --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
<div class="sidebar-custom">
    <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
    <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a>
</div>
<!-- /.sidebar-custom -->
