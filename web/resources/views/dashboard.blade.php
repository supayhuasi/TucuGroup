<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Card Bienvenida --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">Bienvenido</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ __("¡Bienvenido a tu dashboard!") }}</p>
                    </div>
                </div>

                {{-- Card Configuración --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">⚙️ Configurar Sitio</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Personaliza tu sitio web con datos de empresa, Google Analytics, SMTP y más.
                        </p>
                        <a
                            href="{{ route('configuration.dashboard') }}"
                            class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Ir a Configuración
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
