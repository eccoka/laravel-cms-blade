<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="grid grid-flow-row auto-rows-max ">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-side-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-side-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-side-nav-link :href="route('admin.regform')">
                {{ __('UserRegForm') }}
            </x-side-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-side-nav-link :href="route('userdata.edit')">
                {{ __('ChangeUserData') }}
            </x-side-nav-link>
        </div>
    </div>
</nav>
