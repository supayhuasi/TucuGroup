@extends('admin.layout')

@section('page-title', 'Contenido Institucional')

@section('content')
<div class="space-y-6">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Editor de Página Institucional</h3>
            <a href="{{ route('admin.dashboard') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                ← Volver al Dashboard
            </a>
        </div>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
            Desde aquí puedes editar contenido, empresas, slider y Google Analytics sin tocar código.
        </p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <form action="{{ route('admin.settings.save') }}" method="POST" class="space-y-8">
            @csrf

            <div>
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Empresa</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre</label>
                        <input type="text" name="holding[name]" value="{{ old('holding.name', $content['holding']['name'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tagline</label>
                        <input type="text" name="holding[tagline]" value="{{ old('holding.tagline', $content['holding']['tagline'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descripción</label>
                        <textarea name="holding[description]" rows="3" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">{{ old('holding.description', $content['holding']['description'] ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Hero principal</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Badge</label>
                        <input type="text" name="hero[badge]" value="{{ old('hero.badge', $content['hero']['badge'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Título principal</label>
                        <input type="text" name="hero[title_line_1]" value="{{ old('hero.title_line_1', $content['hero']['title_line_1'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Texto destacado</label>
                        <input type="text" name="hero[title_highlight]" value="{{ old('hero.title_highlight', $content['hero']['title_highlight'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Texto del botón</label>
                        <input type="text" name="hero[cta_text]" value="{{ old('hero.cta_text', $content['hero']['cta_text'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Link del botón</label>
                        <input type="text" name="hero[cta_link]" value="{{ old('hero.cta_link', $content['hero']['cta_link'] ?? '#empresas') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descripción</label>
                        <textarea name="hero[description]" rows="3" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">{{ old('hero.description', $content['hero']['description'] ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Slider superior</h4>
                <div class="space-y-4">
                    <label class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
                        <input type="checkbox" name="slider[enabled]" value="1" @checked(old('slider.enabled', $content['slider']['enabled'] ?? true))>
                        Activar slider en la parte superior
                    </label>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Autoplay (milisegundos)</label>
                        <input type="number" min="1500" max="20000" name="slider[autoplay_ms]" value="{{ old('slider.autoplay_ms', $content['slider']['autoplay_ms'] ?? 5000) }}" class="w-full md:w-72 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Slides (JSON)</label>
                        <textarea name="slider[items_json]" rows="7" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 font-mono text-sm">{{ old('slider.items_json', json_encode($content['slider']['items'] ?? [], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)) }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Formato: [{"title":"...","subtitle":"...","image":"https://..."}]</p>
                    </div>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">SEO + Analytics</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Título SEO</label>
                        <input type="text" name="seo[title]" value="{{ old('seo.title', $content['seo']['title'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descripción SEO</label>
                        <textarea name="seo[description]" rows="2" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">{{ old('seo.description', $content['seo']['description'] ?? '') }}</textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Keywords SEO</label>
                        <input type="text" name="seo[keywords]" value="{{ old('seo.keywords', $content['seo']['keywords'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Google Analytics ID</label>
                        <input type="text" name="integrations[google_analytics_id]" placeholder="G-XXXXXXXXXX" value="{{ old('integrations.google_analytics_id', $content['integrations']['google_analytics_id'] ?? '') }}" class="w-full md:w-80 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Contacto</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <input type="email" name="contact[email]" value="{{ old('contact.email', $content['contact']['email'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Teléfono</label>
                        <input type="text" name="contact[phone]" value="{{ old('contact.phone', $content['contact']['phone'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ubicación</label>
                        <input type="text" name="contact[location]" value="{{ old('contact.location', $content['contact']['location'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Dirección</label>
                        <input type="text" name="contact[address]" value="{{ old('contact.address', $content['contact']['address'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                    </div>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Contenido editable completo (JSON)</h4>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Empresas</label>
                        <textarea name="companies_json" rows="8" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 font-mono text-sm">{{ old('companies_json', json_encode($content['companies'] ?? [], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sectores</label>
                        <textarea name="sectors_json" rows="8" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 font-mono text-sm">{{ old('sectors_json', json_encode($content['sectors'] ?? [], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estadísticas</label>
                        <textarea name="statistics_json" rows="6" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 font-mono text-sm">{{ old('statistics_json', json_encode($content['statistics'] ?? [], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Valores</label>
                        <textarea name="values_json" rows="6" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 font-mono text-sm">{{ old('values_json', json_encode($content['values'] ?? [], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 pt-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition">
                    Guardar cambios
                </button>
                <a href="{{ route('institutional') }}" target="_blank" class="bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-800 dark:text-white font-semibold py-2 px-6 rounded-lg transition">
                    Ver sitio
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
