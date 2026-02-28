@extends('admin.layout')

@section('page-title', 'Editar Usuario: ' . $user->name)

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Editar Usuario</h3>
            <a href="{{ route('admin.users') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                ← Volver a Usuarios
            </a>
        </div>
    </div>

    <!-- Formulario de edición -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')

            <!-- Nombre -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Nombre
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                       focus:ring-2 focus:ring-blue-500 focus:border-transparent
                       @error('name') border-red-500 @enderror"
                       required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Email
                </label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                       focus:ring-2 focus:ring-blue-500 focus:border-transparent
                       @error('email') border-red-500 @enderror"
                       required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Rol -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Rol
                </label>
                <select id="role" name="role" 
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg 
                        bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                        focus:ring-2 focus:ring-blue-500 focus:border-transparent
                        @error('role') border-red-500 @enderror"
                        required>
                    <option value="user" @selected(old('role', $user->role) === 'user')>Usuario Regular</option>
                    <option value="admin" @selected(old('role', $user->role) === 'admin')>Administrador</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Información adicional -->
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 space-y-2">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    <span class="font-semibold">ID:</span> {{ $user->id }}
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    <span class="font-semibold">Registrado:</span> {{ $user->created_at->format('d/m/Y H:i:s') }}
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    <span class="font-semibold">Última actualización:</span> {{ $user->updated_at->format('d/m/Y H:i:s') }}
                </p>
            </div>

            <!-- Botones -->
            <div class="flex gap-4">
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition">
                    Guardar Cambios
                </button>
                <a href="{{ route('admin.users') }}" 
                   class="bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-800 dark:text-white font-semibold py-2 px-6 rounded-lg transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
