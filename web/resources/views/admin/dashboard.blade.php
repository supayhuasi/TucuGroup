@extends('admin.layout')

@section('page-title', 'Dashboard de Administración')

@section('content')
<div class="space-y-6">
    <!-- Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total de Usuarios -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total de Usuarios</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">{{ $totalUsers }}</p>
                </div>
                <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20a9 9 0 0118 0v2h2v-2a11 11 0 00-22 0v2h2v-2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Administradores -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Administradores</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">{{ $adminUsers }}</p>
                </div>
                <div class="bg-green-100 dark:bg-green-900 p-3 rounded-full">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Usuarios Regulares -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Usuarios Regulares</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">{{ $regularUsers }}</p>
                </div>
                <div class="bg-purple-100 dark:bg-purple-900 p-3 rounded-full">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8.048M7 13H3m14 0h4M9 20h6a2 2 0 002-2v-1a6 6 0 00-12 0v1a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Últimos Usuarios Registrados -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
        <div class="p-6 border-b dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Últimos Usuarios Registrados</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Rol</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y dark:divide-gray-700">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                    @if($user->role === 'admin')
                                        bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200
                                    @else
                                        bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200
                                    @endif">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 dark:text-blue-400 hover:underline">Editar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                No hay usuarios registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t dark:border-gray-700">
            <a href="{{ route('admin.users') }}" class="text-blue-600 dark:text-blue-400 hover:underline font-medium">
                Ver todos los usuarios →
            </a>
        </div>
    </div>
</div>
@endsection
