<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administración - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white dark:bg-gray-800 shadow-lg">
            <div class="p-6 border-b dark:border-gray-700">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    <a href="{{ route('admin.dashboard') }}">Administración</a>
                </h1>
                <p class="text-sm text-gray-500 mt-1">Panel de control</p>
            </div>

            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="block px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition
                           @if(Route::currentRouteName() === 'admin.dashboard') bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 @endif">
                            📊 Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users') }}" 
                           class="block px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition
                           @if(Route::currentRouteName() === 'admin.users' || Route::currentRouteName() === 'admin.users.edit') bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 @endif">
                            👥 Usuarios
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.settings') }}" 
                           class="block px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition
                           @if(Route::currentRouteName() === 'admin.settings') bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 @endif">
                            ⚙️ Configuración
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="absolute bottom-0 left-0 right-0 p-4 border-t dark:border-gray-700 w-64">
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <p class="text-sm font-semibold text-gray-800 dark:text-white">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                        <span class="inline-block bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-2 py-1 rounded">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>
                    </p>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <div class="bg-white dark:bg-gray-800 shadow">
                <div class="px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                        @yield('page-title', 'Administración')
                    </h2>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                            Ir al Dashboard
                        </a>
                        <a href="{{ route('profile.edit') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                            Mi Perfil
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="flex-1 overflow-auto">
                <div class="p-6">
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-200 rounded">
                            <strong>Error:</strong>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-200 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
