<nav x-data="{ open: false }" class="custom-navbar">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ Auth::user()->role === 'Administrador' ? route('admin.dashboard') : (Auth::user()->role === 'Secretario' ? route('secretario.dashboard') : route('dashboard')) }}">
                        <div class="shrink-0 flex items-center ">
                            <img src="{{ asset('img/logomx.svg') }}" alt="Logo" style="height: 44px; width: auto;">
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="Auth::user()->role === 'Administrador' ? route('admin.dashboard') : (Auth::user()->role === 'Secretario' ? route('secretario.dashboard') : route('dashboard'))" :active="request()->routeIs('dashboard')" class="text-white">
                        {{ __('Inicio') }}
                    </x-nav-link>

                    <!-- admin links -->
                    @if (Auth::user()->role === 'Administrador')
                        <x-nav-link href="{{ route('admin.registro-pacientes') }}" :active="request()->routeIs('admin.registro-pacientes')" class="text-white">
                            {{ __('Registro Pacientes') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('admin.registro-medicos') }}" :active="request()->routeIs('admin.registro-medicos')" class="text-white">
                            {{ __('Registro Médicos') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('admin.registro-secretarios') }}" :active="request()->routeIs('admin.registro-secretarios')" class="text-white">
                            {{ __('Registro Secretarios') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('admin.registro-servicios') }}" :active="request()->routeIs('admin.registro-servicios')" class="text-white">
                            {{ __('Registro Servicios') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('admin.registro-productos') }}" :active="request()->routeIs('admin.registro-productos')" class="text-white">
                            {{ __('Registro Productos') }}
                        </x-nav-link>
                    @endif

                    <!-- medico links -->
                    @if (Auth::user()->role === 'Médico')
                        <x-nav-link href="/registro-pacientes" :active="request()->routeIs('medico.registro-pacientes')" class="text-white">
                            {{ __('Registro Pacientes') }}
                        </x-nav-link>

                        <x-nav-link href="/crear-cita" :active="request()->routeIs('medico.crear-cita')" class="text-white">
                            {{ __('Crear Cita') }}
                        </x-nav-link>

                    @endif

                    <!-- secretario links -->
                    @if (Auth::user()->role === 'Secretario')
                        <x-nav-link href="{{ route('secretario.registro-pacientes') }}" :active="request()->routeIs('secretario.registro-pacientes')" class="text-white">
                            {{ __('Registro Pacientes') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('secretario.consultas') }}" :active="request()->routeIs('secretario.consultas')" class="text-white">
                            {{ __('Citas Agendadas') }}
                        </x-nav-link>

                        <x-nav-link  href="{{ route('secretario.registro-productos') }}" :active="request()->routeIs('secretario.pagos')" class="text-white">
                            {{ __('Registrar Productos') }}
                        </x-nav-link>
                        
                        <x-nav-link  href="{{ route('secretario.pagos') }}" :active="request()->routeIs('secretario.pagos')" class="text-white">
                            {{ __('Pagos De Consultas') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-colorgob2 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->nombre }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-black">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="text-black"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-black hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out bg-colorgob2">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden ">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-black">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 background-color: #b38e5d">
            <div class="px-4">
                <div class="font-medium text-base text-black">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-black">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1 background-color: #b38e5d">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-black background-color: #b38e5d">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="text-black background-color: #b38e5d"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    .custom-navbar {
        background-color: #13322B;
        border-bottom: 1px solid #13322B;
    }

    .text-black {
        color: black !important;
    }

    .text-white {
        color: white !important;
    }
</style>
