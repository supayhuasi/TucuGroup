{{-- Botón Flotante WhatsApp --}}
@php
    use App\Models\SiteSetting;
    $whatsappEnabled = SiteSetting::getValue('whatsapp_enabled', false);
    $whatsappNumber = SiteSetting::getValue('whatsapp_number', '');
    $whatsappMessage = SiteSetting::getValue('whatsapp_message', 'Hola, quisiera más información');
@endphp

@if ($whatsappEnabled && $whatsappNumber)
    <div class="fixed bottom-6 right-6 z-50">
        <a
            href="https://wa.me/{{ str_replace([' ', '-', '(', ')'], '', $whatsappNumber) }}?text={{ urlencode($whatsappMessage) }}"
            target="_blank"
            rel="noopener noreferrer"
            class="group flex items-center justify-center w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110"
            title="Enviar mensaje por WhatsApp"
        >
            {{-- Icono WhatsApp SVG --}}
            <svg
                class="w-7 h-7"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-4.255.949c-1.668.667-3.189 1.809-4.357 3.244-1.168 1.435-1.761 3.157-1.761 4.932 0 1.775.593 3.497 1.761 4.932 1.168 1.435 2.689 2.577 4.357 3.244 1.668.667 3.435.949 5.21.949 1.775 0 3.542-.282 5.21-.949 1.668-.667 3.189-1.809 4.357-3.244 1.168-1.435 1.761-3.157 1.761-4.932 0-1.775-.593-3.497-1.761-4.932C19.768 8.133 18.247 6.991 16.579 6.324 14.911 5.657 13.144 5.375 11.369 5.375c-1.775 0-3.542.282-5.21.949-.672.268-1.319.593-1.935.965z"/>
            </svg>

            {{-- Tooltip --}}
            <span class="absolute bottom-full right-0 mb-3 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                Enviar mensaje
            </span>
        </a>
    </div>
@endif
