<!-- Componente: Tarjeta de Contacto -->
<div class="bg-white dark:bg-[#1a1a1a] rounded-xl p-8 text-center border border-gray-200 dark:border-gray-700">
    <div class="w-12 h-12 rounded-full bg-[#F53003]/10 flex items-center justify-center text-[#F53003] mx-auto mb-4">
        {!! $icon !!}
    </div>
    <h3 class="font-bold mb-2">{{ $title }}</h3>
    <p class="text-gray-600 dark:text-gray-400">{{ $content }}</p>
</div>
