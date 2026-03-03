{{-- Componente Acordeón para Configuraciones --}}
@props([
    'id' => '',
    'title' => '',
    'open' => false,
])

<div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden mb-4">
    <button
        type="button"
        class="w-full px-6 py-4 flex justify-between items-center bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-900"
        @click="accordion{{ $id }}.open = !accordion{{ $id }}.open"
        :aria-expanded="accordion{{ $id }}.open"
    >
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
            {{ $title }}
        </h3>
        <svg
            class="w-6 h-6 text-gray-600 dark:text-gray-400 transition-transform"
            :class="{ 'rotate-180': accordion{{ $id }}.open }"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </button>

    <div
        class="overflow-hidden transition-all duration-300 ease-in-out"
        :style="accordion{{ $id }}.open ? 'max-height: 2000px; opacity: 1;' : 'max-height: 0px; opacity: 0;'"
        x-show="accordion{{ $id }}.open"
    >
        <div class="px-6 py-6 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
            {{ $slot }}
        </div>
    </div>
</div>
