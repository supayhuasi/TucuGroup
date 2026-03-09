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
        @php
            $companiesFromOld = old('companies_json');
            $companiesData = $content['companies'] ?? [];
            $sectorsFromOld = old('sectors_json');
            $sectorsData = $content['sectors'] ?? [];

            if (is_string($companiesFromOld) && trim($companiesFromOld) !== '') {
                $decodedCompanies = json_decode($companiesFromOld, true);
                if (is_array($decodedCompanies)) {
                    $companiesData = $decodedCompanies;
                }
            }

            if (!is_array($companiesData) || empty($companiesData)) {
                $companiesData = [[
                    'id' => 1,
                    'name' => '',
                    'description' => '',
                    'website' => '',
                    'icon' => '',
                    'color' => '',
                    'status' => '',
                ]];
            }

            if (is_string($sectorsFromOld) && trim($sectorsFromOld) !== '') {
                $decodedSectors = json_decode($sectorsFromOld, true);
                if (is_array($decodedSectors)) {
                    $sectorsData = $decodedSectors;
                }
            }

            if (!is_array($sectorsData) || empty($sectorsData)) {
                $sectorsData = [[
                    'id' => 1,
                    'title' => '',
                    'subtitle' => '',
                    'icon' => '',
                    'color' => '',
                    'features' => [],
                ]];
            }
        @endphp

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
                        <div id="companies-editor" class="space-y-4" data-initial='@json($companiesData)'>
                            <div id="companies-list" class="space-y-4"></div>
                            <div class="flex justify-between items-center">
                                <button type="button" id="add-company-btn" class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg transition">
                                    + Agregar empresa
                                </button>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Edición visual activada, sin JSON manual.</p>
                            </div>
                            <input type="hidden" id="companies_json_hidden" name="companies_json" value='@json($companiesData, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)'>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sectores</label>
                        <div id="sectors-editor" class="space-y-4" data-initial='@json($sectorsData)'>
                            <div id="sectors-list" class="space-y-4"></div>
                            <div class="flex justify-between items-center">
                                <button type="button" id="add-sector-btn" class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg transition">
                                    + Agregar sector
                                </button>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Edición visual activada, sin JSON manual.</p>
                            </div>
                            <input type="hidden" id="sectors_json_hidden" name="sectors_json" value='@json($sectorsData, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)'>
                        </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editor = document.getElementById('companies-editor');
        const list = document.getElementById('companies-list');
        const addButton = document.getElementById('add-company-btn');
        const hiddenInput = document.getElementById('companies_json_hidden');
        const sectorsEditor = document.getElementById('sectors-editor');
        const sectorsList = document.getElementById('sectors-list');
        const addSectorButton = document.getElementById('add-sector-btn');
        const sectorsHiddenInput = document.getElementById('sectors_json_hidden');

        if (!editor || !list || !addButton || !hiddenInput) {
            return;
        }

        let companies = [];

        try {
            const initial = JSON.parse(editor.dataset.initial || '[]');
            companies = Array.isArray(initial) ? initial : [];
        } catch (error) {
            companies = [];
        }

        if (companies.length === 0) {
            companies = [{ id: 1, name: '', description: '', website: '', icon: '', color: '', status: '' }];
        }

        const getCardHtml = (company, index) => {
            const safe = (value) => String(value ?? '').replace(/"/g, '&quot;');

            return `
                <div class="p-4 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <h5 class="font-semibold text-gray-800 dark:text-white">Empresa #${index + 1}</h5>
                        <button type="button" data-remove="${index}" class="text-sm bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Eliminar</button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <input data-field="id" data-index="${index}" type="number" min="1" value="${safe(company.id)}" placeholder="ID" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">
                        <input data-field="name" data-index="${index}" type="text" value="${safe(company.name)}" placeholder="Nombre" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">
                        <textarea data-field="description" data-index="${index}" rows="3" placeholder="Descripción" class="md:col-span-2 w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">${safe(company.description)}</textarea>
                        <input data-field="website" data-index="${index}" type="text" value="${safe(company.website)}" placeholder="Sitio web (https://... o #)" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">
                        <input data-field="icon" data-index="${index}" type="text" value="${safe(company.icon)}" placeholder="Ícono" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">
                        <input data-field="color" data-index="${index}" type="text" value="${safe(company.color)}" placeholder="Color" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">
                        <input data-field="status" data-index="${index}" type="text" value="${safe(company.status)}" placeholder="Estado (opcional)" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">
                    </div>
                </div>
            `;
        };

        const syncHidden = () => {
            hiddenInput.value = JSON.stringify(companies);
        };

        const render = () => {
            list.innerHTML = companies.map((company, index) => getCardHtml(company, index)).join('');
            syncHidden();
        };

        addButton.addEventListener('click', function () {
            const maxId = companies.reduce((carry, company) => {
                const current = Number(company.id) || 0;
                return current > carry ? current : carry;
            }, 0);

            companies.push({ id: maxId + 1, name: '', description: '', website: '', icon: '', color: '', status: '' });
            render();
        });

        list.addEventListener('click', function (event) {
            const button = event.target.closest('[data-remove]');
            if (!button) {
                return;
            }

            const index = Number(button.getAttribute('data-remove'));
            if (companies.length === 1) {
                return;
            }

            companies.splice(index, 1);
            render();
        });

        list.addEventListener('input', function (event) {
            const field = event.target.getAttribute('data-field');
            const index = Number(event.target.getAttribute('data-index'));

            if (!field || Number.isNaN(index) || !companies[index]) {
                return;
            }

            companies[index][field] = event.target.value;
            syncHidden();
        });

        render();

        if (!sectorsEditor || !sectorsList || !addSectorButton || !sectorsHiddenInput) {
            return;
        }

        let sectors = [];

        try {
            const initialSectors = JSON.parse(sectorsEditor.dataset.initial || '[]');
            sectors = Array.isArray(initialSectors) ? initialSectors : [];
        } catch (error) {
            sectors = [];
        }

        if (sectors.length === 0) {
            sectors = [{ id: 1, title: '', subtitle: '', icon: '', color: '', features: [] }];
        }

        const toFeaturesText = (features) => {
            if (!Array.isArray(features)) {
                return '';
            }

            return features.join('\n');
        };

        const parseFeatures = (value) => {
            return String(value || '')
                .split(/\r\n|\r|\n/)
                .map(item => item.trim())
                .filter(item => item !== '');
        };

        const getSectorCardHtml = (sector, index) => {
            const safe = (value) => String(value ?? '').replace(/"/g, '&quot;');

            return `
                <div class="p-4 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <h5 class="font-semibold text-gray-800 dark:text-white">Sector #${index + 1}</h5>
                        <button type="button" data-sector-remove="${index}" class="text-sm bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Eliminar</button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <input data-sector-field="id" data-sector-index="${index}" type="number" min="1" value="${safe(sector.id)}" placeholder="ID" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">
                        <input data-sector-field="title" data-sector-index="${index}" type="text" value="${safe(sector.title)}" placeholder="Título" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">
                        <input data-sector-field="subtitle" data-sector-index="${index}" type="text" value="${safe(sector.subtitle)}" placeholder="Subtítulo" class="md:col-span-2 w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">
                        <input data-sector-field="icon" data-sector-index="${index}" type="text" value="${safe(sector.icon)}" placeholder="Ícono" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">
                        <input data-sector-field="color" data-sector-index="${index}" type="text" value="${safe(sector.color)}" placeholder="Color" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">
                        <textarea data-sector-field="features_text" data-sector-index="${index}" rows="4" placeholder="Características (una por línea)" class="md:col-span-2 w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800">${safe(toFeaturesText(sector.features))}</textarea>
                    </div>
                </div>
            `;
        };

        const syncSectorsHidden = () => {
            sectorsHiddenInput.value = JSON.stringify(sectors);
        };

        const renderSectors = () => {
            sectorsList.innerHTML = sectors.map((sector, index) => getSectorCardHtml(sector, index)).join('');
            syncSectorsHidden();
        };

        addSectorButton.addEventListener('click', function () {
            const maxId = sectors.reduce((carry, sector) => {
                const current = Number(sector.id) || 0;
                return current > carry ? current : carry;
            }, 0);

            sectors.push({ id: maxId + 1, title: '', subtitle: '', icon: '', color: '', features: [] });
            renderSectors();
        });

        sectorsList.addEventListener('click', function (event) {
            const button = event.target.closest('[data-sector-remove]');
            if (!button) {
                return;
            }

            const index = Number(button.getAttribute('data-sector-remove'));
            if (sectors.length === 1) {
                return;
            }

            sectors.splice(index, 1);
            renderSectors();
        });

        sectorsList.addEventListener('input', function (event) {
            const field = event.target.getAttribute('data-sector-field');
            const index = Number(event.target.getAttribute('data-sector-index'));

            if (!field || Number.isNaN(index) || !sectors[index]) {
                return;
            }

            if (field === 'features_text') {
                sectors[index].features = parseFeatures(event.target.value);
            } else {
                sectors[index][field] = event.target.value;
            }

            syncSectorsHidden();
        });

        renderSectors();
    });
</script>
@endsection
