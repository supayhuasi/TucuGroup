@extends('admin.layout')

@section('page-title', 'Configuración del Sistema')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Configuración del Sistema</h3>
            <a href="{{ route('admin.dashboard') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                ← Volver al Dashboard
            </a>
        </div>
    </div>

    <!-- Configuración General -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-6">Configuración General</h4>
        
        <form action="{{ route('admin.settings.save') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Nombre de la aplicación -->
            <div>
                <label for="app_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Nombre de la Aplicación
                </label>
                <input type="text" id="app_name" name="app_name" value="{{ config('app.name') }}" 
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                       focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Nombre que aparecerá en la aplicación</p>
            </div>

            <!-- URL de la aplicación -->
            <div>
                <label for="app_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    URL de la Aplicación
                </label>
                <input type="url" id="app_url" name="app_url" value="{{ config('app.url') }}" 
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                       focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">URL base de la aplicación</p>
            </div>

            <!-- Ambiente -->
            <div>
                <label for="app_env" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Ambiente
                </label>
                <div class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg 
                            bg-gray-100 dark:bg-gray-600 text-gray-800 dark:text-gray-300">
                    {{ config('app.env') }}
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Ambiente de la aplicación (no se puede cambiar desde aquí)</p>
            </div>

            <!-- Debug -->
            <div class="flex items-center">
                <input type="checkbox" id="app_debug" name="app_debug" 
                       @checked(config('app.debug'))
                       class="h-4 w-4 rounded border-gray-300 text-blue-600">
                <label for="app_debug" class="ml-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Modo de Debug
                </label>
            </div>

            <div class="bg-yellow-50 dark:bg-yellow-900 border border-yellow-200 dark:border-yellow-700 rounded-lg p-4">
                <p class="text-sm text-yellow-800 dark:text-yellow-200">
                    <strong>⚠️ Advertencia:</strong> El modo de debug no debe estar activado en producción.
                </p>
            </div>

            <!-- Botones -->
            <div class="flex gap-4 pt-4">
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition">
                    Guardar Configuración
                </button>
                <a href="{{ route('admin.dashboard') }}" 
                   class="bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-800 dark:text-white font-semibold py-2 px-6 rounded-lg transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>

    <!-- Información del Sistema -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-6">Información del Sistema</h4>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- PHP Version -->
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4">
                <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Versión de PHP</p>
                <p class="text-xl font-bold text-gray-800 dark:text-white mt-1">{{ phpversion() }}</p>
            </div>

            <!-- Laravel Version -->
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4">
                <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Versión de Laravel</p>
                <p class="text-xl font-bold text-gray-800 dark:text-white mt-1">{{ app()->version() }}</p>
            </div>

            <!-- Database -->
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4">
                <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Base de Datos</p>
                <p class="text-xl font-bold text-gray-800 dark:text-white mt-1">{{ config('database.default') }}</p>
            </div>

            <!-- App Key -->
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4">
                <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Estado de APP_KEY</p>
                <p class="text-xl font-bold text-green-600 dark:text-green-400 mt-1">✓ Configurada</p>
            </div>
        </div>
    </div>

    <!-- Acciones del Sistema -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-6">Acciones del Sistema</h4>
        
        <div class="space-y-4">
            <div class="bg-blue-50 dark:bg-blue-900 border border-blue-200 dark:border-blue-700 rounded-lg p-4 flex justify-between items-center">
                <div>
                    <p class="font-semibold text-blue-900 dark:text-blue-100">Limpiar Cache</p>
                    <p class="text-sm text-blue-700 dark:text-blue-300">Limpia todos los cachés de la aplicación</p>
                </div>
                <form action="#" method="POST" class="inline">
                    @csrf
                    <button type="button" disabled
                            class="bg-blue-500 text-white px-4 py-2 rounded font-medium cursor-not-allowed opacity-50">
                        Ejecutar
                    </button>
                </form>
            </div>

            <div class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 rounded-lg p-4 flex justify-between items-center">
                <div>
                    <p class="font-semibold text-green-900 dark:text-green-100">Optimizar Aplicación</p>
                    <p class="text-sm text-green-700 dark:text-green-300">Optimiza la aplicación para producción</p>
                </div>
                <form action="#" method="POST" class="inline">
                    @csrf
                    <button type="button" disabled
                            class="bg-green-500 text-white px-4 py-2 rounded font-medium cursor-not-allowed opacity-50">
                        Ejecutar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
