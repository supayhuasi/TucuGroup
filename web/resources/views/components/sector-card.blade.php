<!-- Componente: Tarjeta de Sector -->
<div class="sector-card bg-white dark:bg-[#1a1a1a] rounded-2xl p-8 card-hover border border-gray-200 dark:border-gray-700">
    <div class="flex items-start justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold mb-2">{{ $title }}</h3>
            <p class="text-gray-600 dark:text-gray-400">{{ $subtitle }}</p>
        </div>
        <div class="icon-box {{ $iconBgColor }} {{ $iconColor }}">
            {!! $icon !!}
        </div>
    </div>
    <div class="space-y-4">
        @foreach ($features as $feature)
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 bg-[#F53003] rounded-full"></div>
                <span>{{ $feature }}</span>
            </div>
        @endforeach
    </div>
</div>
