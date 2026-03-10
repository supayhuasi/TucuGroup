<!-- Componente: Tarjeta de Empresa -->
<div class="sector-card bg-white dark:bg-[#1a1a1a] rounded-2xl p-8 card-hover border border-gray-200 dark:border-gray-700">
    <div class="icon-box {{ $iconBgColor }} {{ $iconColor }}">
        {!! $icon !!}
    </div>
    <h3 class="text-2xl font-bold mb-3">{{ $name }}</h3>
    <p class="text-gray-600 dark:text-gray-400 mb-4">
        {{ $description }}
    </p>
    <div class="flex items-center {{ $urlColor ?? 'text-[#14532d]' }} font-semibold">
        <span>{{ $url ?? 'Próximamente' }}</span>
        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </div>
</div>
