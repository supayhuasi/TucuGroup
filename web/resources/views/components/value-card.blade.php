<!-- Componente: Tarjeta de Valor -->
<div class="text-center">
    <div class="w-16 h-16 rounded-full {{ $bgColor }} flex items-center justify-center {{ $iconColor }} mx-auto mb-4">
        {!! $icon !!}
    </div>
    <h3 class="text-xl font-bold mb-2">{{ $title }}</h3>
    <p class="text-gray-600 dark:text-gray-400">{{ $description }}</p>
</div>
