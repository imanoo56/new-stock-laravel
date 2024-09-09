<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-3 px-3">

    <x-sidebar.link title="{{ __('Dashboard') }}" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <span class="inline-block mx-4">
                <x-icons.dashboard class="w-5 h-5" aria-hidden="true" />
            </span>
        </x-slot>
    </x-sidebar.link>
    @can('product_access')

        <x-sidebar.dropdown title="{{ __('Materiels') }}" :active="request()->routeIs([
            'products.*',
            'product-categories.index',
            'products.barcode-print',
            'brands.index',
            'warehouses.index',
            'adjustments.index',
        ])">

            <x-slot name="icon">
                <span class="inline-block mx-4">
                    <i class="fas fa-boxes w-5 h-5"></i>
                </span>
            </x-slot>

                <x-sidebar.sublink title="{{ __('PC ET ECRAN') }}" href="{{ route('product-categories.index') }}"
                    :active="request()->routeIs('product-categories.index')" />
                <x-sidebar.sublink title="{{ __('IMPRIMANTES') }}" href="{{ route('products.index') }}" :active="request()->routeIs('products.index')" />
                <x-sidebar.sublink title="{{ __('TSP') }}" href="{{ route('products.barcode-print') }}"
                    :active="request()->routeIs('products.barcode-print')" />
                <x-sidebar.sublink title="{{ __('INFRA') }}" href="{{ route('brands.index') }}" :active="request()->routeIs('brands.index')" />
        
        </x-sidebar.dropdown>
    @endcan

   
    

    @can('user_access')
        <x-sidebar.dropdown title="{{ __('People') }}" :active="request()->routeIs('customers.*') ||
            request()->routeIs('customer-group.*') ||
            request()->routeIs('suppliers.*') ||
            request()->routeIs('users.*') ||
            request()->routeIs('roles.*') ||
            request()->routeIs('permissions.*')">
            <x-slot name="icon">
                <span class="inline-block mx-4">
                    <i class="fas fa-users w-5 h-5"></i>
                </span>
            </x-slot>
            <x-sidebar.sublink title="{{ __('Users') }}" href="{{ route('users.index') }}" :active="request()->routeIs('users.index')" />
           
        </x-sidebar.dropdown>
    @endcan
    @can('access_settings')
        <x-sidebar.dropdown title="{{ __('Settings') }}" :active="request()->routeIs([
            'settings.index',
            'logs.index',
            'currencies.index',
            'languages.index',
            'backup.index',
        ])">
            <x-slot name="icon">
                <span class="inline-block mx-4">
                    <i class="fas fa-cog w-5 h-5"></i>
                </span>
            </x-slot>
            <x-sidebar.sublink title="{{ __('Settings') }}" href="{{ route('settings.index') }}" :active="request()->routeIs('settings.index')" />
            @can('log_access')
                <x-sidebar.sublink title="{{ __('Logs') }}" href="{{ route('logs.index') }}" :active="request()->routeIs('logs.index')" />
            @endcan
            @can('currency_access')
                <x-sidebar.sublink title="{{ __('Currencies') }}" href="{{ route('currencies.index') }}" :active="request()->routeIs('currencies.index')" />
            @endcan
            @can('language_access')
                <x-sidebar.sublink title="{{ __('Languages') }}" href="{{ route('languages.index') }}" :active="request()->routeIs('languages.index')" />
            @endcan
            @can('backup_access')
                <x-sidebar.sublink title="{{ __('Backup') }}" href="{{ route('backup.index') }}" :active="request()->routeIs('backup.index')" />
            @endcan

        </x-sidebar.dropdown>
    @endcan

    <x-sidebar.link title="{{ __('Logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logoutform').submit();"
        href="#">
        <x-slot name="icon">
            <span class="inline-block mx-4">
                <i class="fas fa-sign-out-alt w-5 h-5" aria-hidden="true"></i>
            </span>
        </x-slot>
    </x-sidebar.link>

</x-perfect-scrollbar>
