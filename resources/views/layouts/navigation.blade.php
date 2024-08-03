<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <style>
                    .cls-1 {
                        font-family: MyriadPro-Regular, 'Myriad Pro';
                        font-size: 10.84px;
                    }

                    .cls-1, .cls-2 {
                        stroke: #2e3192;
                    }

                    .cls-1, .cls-2, .cls-3 {
                        stroke-miterlimit: 10;
                        stroke-width: .5px;
                    }

                    .cls-1, .cls-4 {
                        fill: #2e3192;
                    }

                    .cls-2 {
                        fill: none;
                    }

                    .cls-3 {
                        fill: #92d6e0;
                        stroke: #fff;
                    }
                </style>
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                    <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.62 19.15" width="55" height="50">

                        <rect class="cls-3" x=".25" y="3.43" width="14.9" height="7.92"/>
                        <rect class="cls-3" x="1.64" y="4.72" width="14.9" height="7.92"/>
                        <rect class="cls-3" x="2.92" y="6.05" width="14.9" height="7.92"/>
                        <rect class="cls-3" x="4.16" y="7.38" width="14.9" height="7.92"/>
                        <text class="cls-1" transform="translate(12.03 9.32) scale(1.11 1)"><tspan x="0" y="0">A</tspan></text>
                        <g>
                            <circle class="cls-2" cx="5.18" cy="13.97" r="4.93"/>
                            <ellipse class="cls-2" cx="5.18" cy="13.97" rx="4.93" ry="2.65"/>
                            <ellipse class="cls-2" cx="5.18" cy="13.97" rx="2.65" ry="4.93"/>
                            <line class="cls-2" x1="5.18" y1="9.04" x2="5.18" y2="18.9"/>
                            <line class="cls-2" x1=".25" y1="13.97" x2="10.11" y2="13.97"/>
                        </g>
                        <g>
                            <path class="cls-2" d="M15.9,10.86c0,2.08-1.73,3.77-3.88,3.77"/>
                            <polygon class="cls-4" points="13.36 15.54 12.5 15.23 11.08 14.68 12.44 13.92 13.27 13.46 12.82 14.5 13.36 15.54"/>
                            <polygon class="cls-4" points="14.9 12.1 15.24 11.15 15.83 9.57 16.39 11.17 16.74 12.15 15.86 11.56 14.9 12.1"/>
                        </g>
                    </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
