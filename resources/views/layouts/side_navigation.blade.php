<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800">
    <!-- Primary Navigation Menu -->

    <div class="grid grid-flow-row auto-rows-max ">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            @if(Auth::user()->role === 'admin')
            <x-side-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-side-nav-link>
            @endif
            @if(Auth::user()->role === 'leader')
            <x-side-nav-link :href="route('leader.dashboard')" :active="request()->routeIs('leader.dashboard')">
                {{ __('Dashboard') }}
            </x-side-nav-link>
            @endif
            @if(Auth::user()->role === 'agent')
            <x-side-nav-link :href="route('agent.dashboard')" :active="request()->routeIs('agent.dashboard')">
                {{ __('Dashboard') }}
            </x-side-nav-link>
            @endif

        </div>
        @if( Auth::user()->role == 'admin')
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-side-nav-link :href="route('admin.regform')" :active="request()->routeIs('admin.regform')">
                {{ __('UserRegForm') }}
            </x-side-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-side-nav-link :href="route('userdata.edit')" :active="request()->routeIs('userdata.edit')">
                {{ __('ChangeUserData') }}
            </x-side-nav-link>
        </div>
        @endif
    </div>
</nav>
