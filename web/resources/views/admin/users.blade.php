@extends('admin.layout')

@section('page-title', 'Gestión de Usuarios')

@section('content')
<div class="space-y-6">
    <!-- Header con filtros -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Lista de Usuarios</h3>
            <a href="{{ route('admin.dashboard') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                ← Volver al Dashboard
            </a>
        </div>
    </div>

    <!-- Tabla de usuarios -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Rol</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Fecha de Registro</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y dark:divide-gray-700">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $user->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 font-medium">{{ $user->name }}</td>
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
                            <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                {{ $user->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-sm space-x-2">
                                <a href="{{ route('admin.users.edit', $user) }}" 
                                   class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs font-medium transition">
                                    Editar
                                </a>
                                
                                <form action="{{ route('admin.users.toggle-admin', $user) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" 
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-medium transition">
                                        @if($user->role === 'admin')
                                            Quitar Admin
                                        @else
                                            Hacer Admin
                                        @endif
                                    </button>
                                </form>

                                @if($user->id !== Auth::id())
                                    <form action="{{ route('admin.users.delete', $user) }}" method="POST" 
                                          class="inline-block"
                                          onsubmit="return confirm('¿Está seguro de que desea eliminar este usuario?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-medium transition">
                                            Eliminar
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-xs">(No puedes eliminarte a ti mismo)</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                No hay usuarios registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="px-6 py-4 border-t dark:border-gray-700">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
