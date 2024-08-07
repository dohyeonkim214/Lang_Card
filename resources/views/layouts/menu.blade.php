<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('userpage.userDashboard')" :active="request()->routeIs('userpage.userDashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('userpage.index')" :active="request()->routeIs('userpage.index')">
                        {{ __('Decks') }}
                    </x-nav-link>

                    <!-- NEED TO CHANGE LINK TO GO TO CREATE PAGE-->
                    <x-nav-link :href="route('userpage.samplecreate')" :active="request()->routeIs('userpage.samplecreate')">
                        {{ __('Create New') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>