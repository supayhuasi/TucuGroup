<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Configuración del Sitio') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{
        accordion1: { open: false },
        accordion2: { open: false },
        accordion3: { open: false },
        accordion4: { open: false },
        accordion5: { open: false },
        accordion6: { open: false },
        accordion7: { open: false },
        accordion8: { open: false },
        accordion9: { open: false },
        accordion10: { open: false },
        accordion11: { open: false },
        accordion12: { open: false },
    }">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            {{-- Mensajes de éxito --}}
            @if ($message = session('success'))
                <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
                    <p class="text-green-800 dark:text-green-200">{{ $message }}</p>
                </div>
            @endif

            {{-- Información General --}}
            <x-accordion-item id="1" title="📋 Información de la Empresa">
                <form method="POST" action="{{ route('configuration.company') }}" class="space-y-6">
                    @csrf

                    {{-- Nombre --}}
                    <div>
                        <label for="company_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nombre de la Empresa
                        </label>
                        <input
                            type="text"
                            id="company_name"
                            name="company_name"
                            value="{{ old('company_name', $config['company_name']) }}"
                            required
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        />
                        @error('company_name')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Descripción --}}
                    <div>
                        <label for="company_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Descripción
                        </label>
                        <textarea
                            id="company_description"
                            name="company_description"
                            rows="4"
                            required
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >{{ old('company_description', $config['company_description']) }}</textarea>
                        @error('company_description')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Hero principal (editable) --}}
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6 space-y-6">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Contenido principal de portada</h4>

                        <div>
                            <label for="hero_badge" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Etiqueta superior (badge)
                            </label>
                            <input
                                type="text"
                                id="hero_badge"
                                name="hero_badge"
                                value="{{ old('hero_badge', $config['hero_badge']) }}"
                                placeholder="Holding Empresarial Innovador"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            />
                            @error('hero_badge')
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="hero_title_line_1" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Título línea 1
                                </label>
                                <input
                                    type="text"
                                    id="hero_title_line_1"
                                    name="hero_title_line_1"
                                    value="{{ old('hero_title_line_1', $config['hero_title_line_1']) }}"
                                    required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                />
                                @error('hero_title_line_1')
                                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="hero_title_highlight" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Título resaltado
                                </label>
                                <input
                                    type="text"
                                    id="hero_title_highlight"
                                    name="hero_title_highlight"
                                    value="{{ old('hero_title_highlight', $config['hero_title_highlight']) }}"
                                    required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                />
                                @error('hero_title_highlight')
                                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="hero_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Descripción principal
                            </label>
                            <textarea
                                id="hero_description"
                                name="hero_description"
                                rows="4"
                                required
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >{{ old('hero_description', $config['hero_description']) }}</textarea>
                            @error('hero_description')
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="hero_cta_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Texto del botón
                                </label>
                                <input
                                    type="text"
                                    id="hero_cta_text"
                                    name="hero_cta_text"
                                    value="{{ old('hero_cta_text', $config['hero_cta_text']) }}"
                                    required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                />
                                @error('hero_cta_text')
                                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="hero_cta_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Enlace del botón
                                </label>
                                <input
                                    type="text"
                                    id="hero_cta_link"
                                    name="hero_cta_link"
                                    value="{{ old('hero_cta_link', $config['hero_cta_link']) }}"
                                    placeholder="#empresas"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                />
                                @error('hero_cta_link')
                                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Sección de contacto (editable) --}}
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6 space-y-6">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Sección "Ponte en Contacto"</h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="contact_section_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Título de sección
                                </label>
                                <input
                                    type="text"
                                    id="contact_section_title"
                                    name="contact_section_title"
                                    value="{{ old('contact_section_title', $config['contact_section_title']) }}"
                                    required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                />
                            </div>
                            <div>
                                <label for="contact_section_subtitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Subtítulo de sección
                                </label>
                                <input
                                    type="text"
                                    id="contact_section_subtitle"
                                    name="contact_section_subtitle"
                                    value="{{ old('contact_section_subtitle', $config['contact_section_subtitle']) }}"
                                    required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="contact_label_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Etiqueta Email</label>
                                <input type="text" id="contact_label_email" name="contact_label_email" value="{{ old('contact_label_email', $config['contact_label_email']) }}" required class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                            </div>
                            <div>
                                <label for="contact_label_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Etiqueta Teléfono</label>
                                <input type="text" id="contact_label_phone" name="contact_label_phone" value="{{ old('contact_label_phone', $config['contact_label_phone']) }}" required class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                            </div>
                            <div>
                                <label for="contact_label_location" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Etiqueta Ubicación</label>
                                <input type="text" id="contact_label_location" name="contact_label_location" value="{{ old('contact_label_location', $config['contact_label_location']) }}" required class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                            </div>
                        </div>

                        @error('contact_section_title')<p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
                        @error('contact_section_subtitle')<p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
                        @error('contact_label_email')<p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
                        @error('contact_label_phone')<p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
                        @error('contact_label_location')<p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Teléfono --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="company_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Teléfono
                            </label>
                            <input
                                type="tel"
                                id="company_phone"
                                name="company_phone"
                                value="{{ old('company_phone', $config['company_phone']) }}"
                                required
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            />
                            @error('company_phone')
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="company_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Email
                            </label>
                            <input
                                type="email"
                                id="company_email"
                                name="company_email"
                                value="{{ old('company_email', $config['company_email']) }}"
                                required
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            />
                            @error('company_email')
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Dirección --}}
                    <div>
                        <label for="company_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Dirección
                        </label>
                        <input
                            type="text"
                            id="company_address"
                            name="company_address"
                            value="{{ old('company_address', $config['company_address']) }}"
                            required
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        />
                        @error('company_address')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- País --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="company_country" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                País
                            </label>
                            <input
                                type="text"
                                id="company_country"
                                name="company_country"
                                value="{{ old('company_country', $config['company_country']) }}"
                                required
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            />
                            @error('company_country')
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Sitio Web --}}
                        <div>
                            <label for="company_website" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Sitio Web (opcional)
                            </label>
                            <input
                                type="url"
                                id="company_website"
                                name="company_website"
                                value="{{ old('company_website', $config['company_website']) }}"
                                placeholder="https://ejemplo.com"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            />
                            @error('company_website')
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Botón Guardar --}}
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </x-accordion-item>

            {{-- Google Analytics --}}
            <x-accordion-item id="2" title="📊 Google Analytics">
                <form method="POST" action="{{ route('configuration.analytics') }}" class="space-y-6">
                    @csrf

                    {{-- ID de Google Analytics --}}
                    <div>
                        <label for="google_analytics_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            ID de Google Analytics (GA ID o GTM ID)
                        </label>
                        <input
                            type="text"
                            id="google_analytics_id"
                            name="google_analytics_id"
                            value="{{ old('google_analytics_id', $config['google_analytics_id']) }}"
                            placeholder="G-XXXXXXXXXX o GTM-XXXXXXX"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        />
                        <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">
                            Ingresa tu ID de Google Analytics 4 (G-) o Google Tag Manager (GTM-)
                        </p>
                        @error('google_analytics_id')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Habilitar Analytics --}}
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="google_analytics_enabled"
                            name="google_analytics_enabled"
                            value="1"
                            {{ $config['google_analytics_enabled'] ? 'checked' : '' }}
                            class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500"
                        />
                        <label for="google_analytics_enabled" class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Habilitar Google Analytics en el sitio
                        </label>
                    </div>

                    {{-- Botón Guardar --}}
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </x-accordion-item>

            {{-- SMTP --}}
            <x-accordion-item id="3" title="📧 Configuración SMTP">
                <form method="POST" action="{{ route('configuration.smtp') }}" class="space-y-6">
                    @csrf

                    {{-- Host SMTP --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="smtp_host" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Host SMTP
                            </label>
                            <input
                                type="text"
                                id="smtp_host"
                                name="smtp_host"
                                value="{{ old('smtp_host', $config['smtp_host']) }}"
                                placeholder="smtp.gmail.com"
                                required
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            />
                            @error('smtp_host')
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Puerto SMTP --}}
                        <div>
                            <label for="smtp_port" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Puerto
                            </label>
                            <input
                                type="number"
                                id="smtp_port"
                                name="smtp_port"
                                value="{{ old('smtp_port', $config['smtp_port']) }}"
                                placeholder="587"
                                required
                                min="1"
                                max="65535"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            />
                            @error('smtp_port')
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Usuario SMTP --}}
                    <div>
                        <label for="smtp_username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Usuario (Email)
                        </label>
                        <input
                            type="email"
                            id="smtp_username"
                            name="smtp_username"
                            value="{{ old('smtp_username', $config['smtp_username']) }}"
                            required
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        />
                        @error('smtp_username')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Contraseña SMTP --}}
                    <div>
                        <label for="smtp_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Contraseña
                        </label>
                        <input
                            type="password"
                            id="smtp_password"
                            name="smtp_password"
                            placeholder="Dejar vacío para no cambiar"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        />
                        <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">
                            Dejar en blanco para mantener la contraseña actual
                        </p>
                        @error('smtp_password')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Encriptación --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="smtp_encryption" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Encriptación
                            </label>
                            <select
                                id="smtp_encryption"
                                name="smtp_encryption"
                                required
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                                <option value="tls" {{ $config['smtp_encryption'] === 'tls' ? 'selected' : '' }}>TLS</option>
                                <option value="ssl" {{ $config['smtp_encryption'] === 'ssl' ? 'selected' : '' }}>SSL</option>
                            </select>
                            @error('smtp_encryption')
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Dirección "De" --}}
                        <div>
                            <label for="smtp_from_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Dirección De
                            </label>
                            <input
                                type="email"
                                id="smtp_from_address"
                                name="smtp_from_address"
                                value="{{ old('smtp_from_address', $config['smtp_from_address']) }}"
                                required
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            />
                            @error('smtp_from_address')
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Nombre "De" --}}
                    <div>
                        <label for="smtp_from_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nombre De
                        </label>
                        <input
                            type="text"
                            id="smtp_from_name"
                            name="smtp_from_name"
                            value="{{ old('smtp_from_name', $config['smtp_from_name']) }}"
                            required
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        />
                        @error('smtp_from_name')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Botón Guardar --}}
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </x-accordion-item>

            {{-- Logo e Imágenes --}}
            <x-accordion-item id="4" title="🖼️ Logo e Imágenes del Sitio">
                <div class="space-y-8">
                    {{-- Logo --}}
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Logo del Sitio</h4>
                        <form method="POST" action="{{ route('configuration.logo') }}" enctype="multipart/form-data" class="space-y-4">
                            @csrf

                            @if ($config['site_logo'])
                                <div class="mb-4">
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Logo Actual:</p>
                                    <div class="mb-4 flex h-24 w-full max-w-xs items-center justify-center overflow-hidden rounded-xl border border-gray-200 bg-white p-2 dark:border-gray-700 dark:bg-gray-900">
                                        <img src="{{ Storage::url($config['site_logo']) }}" alt="Logo" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <form method="POST" action="{{ route('configuration.logo.delete') }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium">
                                            Eliminar Logo
                                        </button>
                                    </form>
                                </div>
                            @endif

                            <div>
                                <label for="logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Seleccionar Logo (JPG, PNG, GIF, WebP - máx. 5MB)
                                </label>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">
                                    Tamaño recomendado para menú horizontal: 420x120 px (ideal) o 360x100 px (mínimo), con fondo transparente.
                                </p>
                                <input
                                    type="file"
                                    id="logo"
                                    name="logo"
                                    accept="image/jpeg,image/png,image/gif,image/webp"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                />
                                @error('logo')
                                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button
                                type="submit"
                                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                            >
                                Subir Logo
                            </button>
                        </form>
                    </div>

                    {{-- Imágenes Hero, Banner, Footer --}}
                    @foreach (['hero' => 'Hero (Portada)', 'banner' => 'Banner', 'footer' => 'Footer'] as $type => $label)
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-8 last:border-b-0">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">{{ $label }}</h4>
                            <form method="POST" action="{{ route('configuration.image') }}" enctype="multipart/form-data" class="space-y-4">
                                @csrf

                                @if ($config["site_image_{$type}"])
                                    <div class="mb-4">
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Imagen Actual:</p>
                                        <img src="{{ Storage::url($config["site_image_{$type}"]) }}" alt="{{ $label }}" class="max-h-40 object-cover rounded-lg mb-4">
                                        <form method="POST" action="{{ route('configuration.image.delete', $type) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium">
                                                Eliminar {{ $label }}
                                            </button>
                                        </form>
                                    </div>
                                @endif

                                <input type="hidden" name="image_type" value="{{ $type }}">
                                <div>
                                    <label for="image_{{ $type }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Seleccionar Imagen (JPG, PNG, GIF, WebP - máx. 10MB)
                                    </label>
                                    <input
                                        type="file"
                                        id="image_{{ $type }}"
                                        name="image"
                                        accept="image/jpeg,image/png,image/gif,image/webp"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    />
                                    @error('image')
                                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button
                                    type="submit"
                                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                                >
                                    Subir {{ $label }}
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </x-accordion-item>

            {{-- WhatsApp --}}
            <x-accordion-item id="5" title="💬 Configuración WhatsApp">
                <form method="POST" action="{{ route('configuration.whatsapp') }}" class="space-y-6">
                    @csrf

                    {{-- Número de WhatsApp --}}
                    <div>
                        <label for="whatsapp_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Número de WhatsApp
                        </label>
                        <input
                            type="tel"
                            id="whatsapp_number"
                            name="whatsapp_number"
                            value="{{ old('whatsapp_number', $config['whatsapp_number']) }}"
                            placeholder="+54 9 11 12345678"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        />
                        <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">
                            Ingresa el número con código de país (ej: +54911234567)
                        </p>
                        @error('whatsapp_number')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Mensaje por defecto --}}
                    <div>
                        <label for="whatsapp_message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Mensaje por Defecto
                        </label>
                        <textarea
                            id="whatsapp_message"
                            name="whatsapp_message"
                            rows="3"
                            placeholder="Hola, quisiera más información"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >{{ old('whatsapp_message', $config['whatsapp_message']) }}</textarea>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">
                            Este será el mensaje predefinido al enviar un WhatsApp
                        </p>
                        @error('whatsapp_message')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Habilitar WhatsApp --}}
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="whatsapp_enabled"
                            name="whatsapp_enabled"
                            value="1"
                            {{ $config['whatsapp_enabled'] ? 'checked' : '' }}
                            class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500"
                        />
                        <label for="whatsapp_enabled" class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Mostrar botón flotante de WhatsApp en el sitio
                        </label>
                    </div>

                    {{-- Botón Guardar --}}
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </x-accordion-item>

            {{-- Footer --}}
            <x-accordion-item id="6" title="🔗 Configuración Footer">
                <form method="POST" action="{{ route('configuration.footer') }}" class="space-y-6">
                    @csrf

                    {{-- Acerca de --}}
                    <div>
                        <label for="footer_about" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Acerca de
                        </label>
                        <textarea
                            id="footer_about"
                            name="footer_about"
                            rows="3"
                            placeholder="Descripción breve de la empresa para el footer"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >{{ old('footer_about', $config['footer_about']) }}</textarea>
                        @error('footer_about')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Enlaces del Footer --}}
                    <div>
                        <label for="footer_links" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Enlaces del footer (uno por línea)
                        </label>
                        <textarea
                            id="footer_links"
                            name="footer_links"
                            rows="5"
                            placeholder="Inicio|#inicio&#10;Empresas|#empresas&#10;Contacto|#contacto&#10;LinkedIn|https://linkedin.com/company/tuempresa"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >{{ old('footer_links', $config['footer_links']) }}</textarea>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">
                            Formato recomendado: <strong>Texto|URL</strong>. Ejemplo: <strong>Empresas|#empresas</strong>. Si solo escribes texto, se intentará crear un enlace automático.
                        </p>
                        @error('footer_links')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Redes Sociales --}}
                    <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-4">Redes Sociales</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="footer_social_facebook" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Facebook
                                </label>
                                <input
                                    type="url"
                                    id="footer_social_facebook"
                                    name="footer_social_facebook"
                                    value="{{ old('footer_social_facebook', $config['footer_social_facebook']) }}"
                                    placeholder="https://facebook.com/..."
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                />
                            </div>
                            <div>
                                <label for="footer_social_instagram" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Instagram
                                </label>
                                <input
                                    type="url"
                                    id="footer_social_instagram"
                                    name="footer_social_instagram"
                                    value="{{ old('footer_social_instagram', $config['footer_social_instagram']) }}"
                                    placeholder="https://instagram.com/..."
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                />
                            </div>
                            <div>
                                <label for="footer_social_linkedin" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    LinkedIn
                                </label>
                                <input
                                    type="url"
                                    id="footer_social_linkedin"
                                    name="footer_social_linkedin"
                                    value="{{ old('footer_social_linkedin', $config['footer_social_linkedin']) }}"
                                    placeholder="https://linkedin.com/..."
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                />
                            </div>
                            <div>
                                <label for="footer_social_twitter" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Twitter
                                </label>
                                <input
                                    type="url"
                                    id="footer_social_twitter"
                                    name="footer_social_twitter"
                                    value="{{ old('footer_social_twitter', $config['footer_social_twitter']) }}"
                                    placeholder="https://twitter.com/..."
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                />
                            </div>
                        </div>
                    </div>

                    {{-- Copyright --}}
                    <div>
                        <label for="footer_copyright" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Texto Copyright
                        </label>
                        <input
                            type="text"
                            id="footer_copyright"
                            name="footer_copyright"
                            value="{{ old('footer_copyright', $config['footer_copyright']) }}"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        />
                        @error('footer_copyright')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Botón Guardar --}}
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </x-accordion-item>

            {{-- Empresas --}}
            <x-accordion-item id="7" title="🏢 Gestión de Empresas">
                @php
                    $companiesInitial = old('companies_items', $config['companies']);
                    if (!is_array($companiesInitial) || empty($companiesInitial)) {
                        $companiesInitial = [[
                            'id' => 1,
                            'name' => '',
                            'description' => '',
                            'website' => '',
                            'icon' => '',
                            'color' => '',
                            'logo' => '',
                            'status' => '',
                        ]];
                    }
                @endphp

                <form method="POST" action="{{ route('configuration.companies') }}" enctype="multipart/form-data" class="space-y-6" x-data='{
                    companies: @json($companiesInitial),
                    addCompany() {
                        const lastId = this.companies.length > 0
                            ? Math.max(...this.companies.map(company => Number(company.id) || 0))
                            : 0;

                        this.companies.push({
                            id: lastId + 1,
                            name: "",
                            description: "",
                            website: "",
                            icon: "",
                            color: "",
                            logo: "",
                            status: ""
                        });
                    },
                    removeCompany(index) {
                        this.companies.splice(index, 1);
                    }
                }'>
                    @csrf

                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                        Carga las empresas desde este formulario visual. No necesitas editar JSON.
                    </p>

                    @error('companies_items')
                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <div class="space-y-4">
                        <template x-for="(company, index) in companies" :key="index">
                            <div class="p-4 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-100" x-text="`Empresa #${index + 1}`"></h4>
                                    <button
                                        type="button"
                                        x-show="companies.length > 1"
                                        @click="removeCompany(index)"
                                        class="px-3 py-1 text-sm rounded-lg bg-red-600 hover:bg-red-700 text-white"
                                    >
                                        Eliminar
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">ID</label>
                                        <input type="number" min="1" x-model="company.id" :name="`companies_items[${index}][id]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre</label>
                                        <input type="text" x-model="company.name" :name="`companies_items[${index}][name]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descripción</label>
                                        <textarea rows="3" x-model="company.description" :name="`companies_items[${index}][description]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sitio web</label>
                                        <input type="text" x-model="company.website" :name="`companies_items[${index}][website]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="https://... o #">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ícono</label>
                                        <input type="text" x-model="company.icon" :name="`companies_items[${index}][icon]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="roller, tech, ...">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Color</label>
                                        <input type="text" x-model="company.color" :name="`companies_items[${index}][color]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="gradient-primary, blue, ...">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Logo</label>
                                        <template x-if="company.logo">
                                            <div class="mb-2">
                                                <div class="flex h-16 w-full max-w-[11rem] items-center justify-center overflow-hidden rounded-lg border border-gray-200 bg-white p-2 dark:border-gray-600 dark:bg-gray-900">
                                                    <img :src="company.logo" alt="Logo actual" class="max-h-full max-w-full object-contain">
                                                </div>
                                            </div>
                                        </template>
                                        <input type="hidden" :name="`companies_items[${index}][logo]`" :value="company.logo || ''">
                                        <input type="file" accept="image/*" :name="`companies_items[${index}][logo_file]`" class="w-full text-sm text-gray-700 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Recomendado: logo horizontal 320x120 px o superior, con fondo transparente.</p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estado (opcional)</label>
                                        <input type="text" x-model="company.status" :name="`companies_items[${index}][status]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="coming_soon">
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="flex items-center justify-between">
                        <button
                            type="button"
                            @click="addCompany()"
                            class="px-4 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded-lg transition-colors"
                        >
                            + Agregar Empresa
                        </button>

                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Guardar Empresas
                        </button>
                    </div>
                </form>
            </x-accordion-item>

            {{-- Sectores --}}
            <x-accordion-item id="8" title="🏭 Gestión de Sectores">
                @php
                    $sectorsInitial = old('sectors_items');

                    if (!is_array($sectorsInitial)) {
                        $sectorsInitial = array_map(static function ($sector) {
                            return [
                                'id' => $sector['id'] ?? '',
                                'title' => $sector['title'] ?? '',
                                'subtitle' => $sector['subtitle'] ?? '',
                                'icon' => $sector['icon'] ?? '',
                                'color' => $sector['color'] ?? '',
                                'features_text' => implode("\n", $sector['features'] ?? []),
                            ];
                        }, is_array($config['sectors']) ? $config['sectors'] : []);
                    }

                    if (empty($sectorsInitial)) {
                        $sectorsInitial = [[
                            'id' => 1,
                            'title' => '',
                            'subtitle' => '',
                            'icon' => '',
                            'color' => '',
                            'features_text' => '',
                        ]];
                    }
                @endphp

                <form method="POST" action="{{ route('configuration.sectors') }}" class="space-y-6" x-data='{
                    sectors: @json($sectorsInitial),
                    addSector() {
                        const lastId = this.sectors.length > 0
                            ? Math.max(...this.sectors.map(sector => Number(sector.id) || 0))
                            : 0;

                        this.sectors.push({
                            id: lastId + 1,
                            title: "",
                            subtitle: "",
                            icon: "",
                            color: "",
                            features_text: ""
                        });
                    },
                    removeSector(index) {
                        this.sectors.splice(index, 1);
                    }
                }'>
                    @csrf

                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                        Carga los sectores desde este formulario visual. En características, escribe una por línea.
                    </p>

                    @error('sectors_items')
                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <div class="space-y-4">
                        <template x-for="(sector, index) in sectors" :key="index">
                            <div class="p-4 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-100" x-text="`Sector #${index + 1}`"></h4>
                                    <button
                                        type="button"
                                        x-show="sectors.length > 1"
                                        @click="removeSector(index)"
                                        class="px-3 py-1 text-sm rounded-lg bg-red-600 hover:bg-red-700 text-white"
                                    >
                                        Eliminar
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">ID</label>
                                        <input type="number" min="1" x-model="sector.id" :name="`sectors_items[${index}][id]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Título</label>
                                        <input type="text" x-model="sector.title" :name="`sectors_items[${index}][title]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subtítulo</label>
                                        <input type="text" x-model="sector.subtitle" :name="`sectors_items[${index}][subtitle]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ícono</label>
                                        <input type="text" x-model="sector.icon" :name="`sectors_items[${index}][icon]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="factory, code, ...">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Color</label>
                                        <input type="text" x-model="sector.color" :name="`sectors_items[${index}][color]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="orange, blue, ...">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Características (una por línea)</label>
                                        <textarea rows="4" x-model="sector.features_text" :name="`sectors_items[${index}][features_text]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"></textarea>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="flex items-center justify-between">
                        <button
                            type="button"
                            @click="addSector()"
                            class="px-4 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded-lg transition-colors"
                        >
                            + Agregar Sector
                        </button>

                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Guardar Sectores
                        </button>
                    </div>
                </form>
            </x-accordion-item>

            {{-- Estadísticas --}}
            <x-accordion-item id="9" title="📈 Gestión de Trayectoria y Estadísticas">
                @php
                    $statisticsInitial = old('statistics_items', $config['statistics']);
                    if (!is_array($statisticsInitial) || empty($statisticsInitial)) {
                        $statisticsInitial = [[
                            'number' => '',
                            'label' => '',
                        ]];
                    }
                @endphp

                <form method="POST" action="{{ route('configuration.statistics') }}" class="space-y-6" x-data='{
                    statistics: @json($statisticsInitial),
                    addStatistic() {
                        this.statistics.push({ number: "", label: "" });
                    },
                    removeStatistic(index) {
                        this.statistics.splice(index, 1);
                    }
                }'>
                    @csrf

                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                        Edita la trayectoria y métricas como años, clientes, proyectos y similares.
                    </p>

                    @error('statistics_items')
                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <div class="space-y-4">
                        <template x-for="(stat, index) in statistics" :key="index">
                            <div class="p-4 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-100" x-text="`Estadística #${index + 1}`"></h4>
                                    <button
                                        type="button"
                                        x-show="statistics.length > 1"
                                        @click="removeStatistic(index)"
                                        class="px-3 py-1 text-sm rounded-lg bg-red-600 hover:bg-red-700 text-white"
                                    >
                                        Eliminar
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Número</label>
                                        <input type="text" x-model="stat.number" :name="`statistics_items[${index}][number]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="25+">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Etiqueta</label>
                                        <input type="text" x-model="stat.label" :name="`statistics_items[${index}][label]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="Años de trayectoria">
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="flex items-center justify-between">
                        <button
                            type="button"
                            @click="addStatistic()"
                            class="px-4 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded-lg transition-colors"
                        >
                            + Agregar Estadística
                        </button>

                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Guardar Estadísticas
                        </button>
                    </div>
                </form>
            </x-accordion-item>

            {{-- Valores --}}
            <x-accordion-item id="10" title="⭐ Gestión de Valores">
                @php
                    $valuesInitial = old('values_items', $config['values']);
                    if (!is_array($valuesInitial) || empty($valuesInitial)) {
                        $valuesInitial = [[
                            'title' => '',
                            'description' => '',
                            'icon' => '',
                            'color' => '',
                        ]];
                    }
                @endphp

                <form method="POST" action="{{ route('configuration.values') }}" class="space-y-6" x-data='{
                    values: @json($valuesInitial),
                    addValue() {
                        this.values.push({ title: "", description: "", icon: "", color: "" });
                    },
                    removeValue(index) {
                        this.values.splice(index, 1);
                    }
                }'>
                    @csrf

                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                        Administra los valores institucionales que se muestran en la sección de valores.
                    </p>

                    @error('values_items')
                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <div class="space-y-4">
                        <template x-for="(value, index) in values" :key="index">
                            <div class="p-4 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-100" x-text="`Valor #${index + 1}`"></h4>
                                    <button
                                        type="button"
                                        x-show="values.length > 1"
                                        @click="removeValue(index)"
                                        class="px-3 py-1 text-sm rounded-lg bg-red-600 hover:bg-red-700 text-white"
                                    >
                                        Eliminar
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Título</label>
                                        <input type="text" x-model="value.title" :name="`values_items[${index}][title]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ícono</label>
                                        <input type="text" x-model="value.icon" :name="`values_items[${index}][icon]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="lightning, shield, ...">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Color</label>
                                        <input type="text" x-model="value.color" :name="`values_items[${index}][color]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="green, blue, ...">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descripción</label>
                                        <textarea rows="3" x-model="value.description" :name="`values_items[${index}][description]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"></textarea>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="flex items-center justify-between">
                        <button
                            type="button"
                            @click="addValue()"
                            class="px-4 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded-lg transition-colors"
                        >
                            + Agregar Valor
                        </button>

                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Guardar Valores
                        </button>
                    </div>
                </form>
            </x-accordion-item>

            {{-- Slider --}}
            <x-accordion-item id="11" title="🎞️ Configuración de Slider">
                @php
                    $sliderInitial = old('slider_items', $config['slider']['items'] ?? []);
                    $sliderEnabledInitial = old('slider_enabled', $config['slider']['enabled'] ?? true);
                    $sliderAutoplayInitial = old('slider_autoplay_ms', $config['slider']['autoplay_ms'] ?? 5000);

                    if (!is_array($sliderInitial) || empty($sliderInitial)) {
                        $sliderInitial = [[
                            'title' => '',
                            'subtitle' => '',
                            'image' => '',
                        ]];
                    }
                @endphp

                <form method="POST" action="{{ route('configuration.slider') }}" class="space-y-6" x-data='{
                    sliderItems: @json($sliderInitial),
                    addSlide() {
                        this.sliderItems.push({ title: "", subtitle: "", image: "" });
                    },
                    removeSlide(index) {
                        this.sliderItems.splice(index, 1);
                    }
                }'>
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="slider_enabled" value="1" @checked((bool) $sliderEnabledInitial)>
                            Activar slider en la portada
                        </label>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Autoplay (ms)</label>
                            <input type="number" name="slider_autoplay_ms" min="1500" max="20000" value="{{ $sliderAutoplayInitial }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        </div>
                    </div>

                    @error('slider_items')
                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <div class="space-y-4">
                        <template x-for="(slide, index) in sliderItems" :key="index">
                            <div class="p-4 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-100" x-text="`Slide #${index + 1}`"></h4>
                                    <button
                                        type="button"
                                        x-show="sliderItems.length > 1"
                                        @click="removeSlide(index)"
                                        class="px-3 py-1 text-sm rounded-lg bg-red-600 hover:bg-red-700 text-white"
                                    >
                                        Eliminar
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Título</label>
                                        <input type="text" x-model="slide.title" :name="`slider_items[${index}][title]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subtítulo</label>
                                        <input type="text" x-model="slide.subtitle" :name="`slider_items[${index}][subtitle]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">URL de imagen</label>
                                        <input type="url" x-model="slide.image" :name="`slider_items[${index}][image]`" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="https://...">
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="flex items-center justify-between">
                        <button
                            type="button"
                            @click="addSlide()"
                            class="px-4 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded-lg transition-colors"
                        >
                            + Agregar Slide
                        </button>

                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Guardar Slider
                        </button>
                    </div>
                </form>
            </x-accordion-item>

            {{-- SEO --}}
            <x-accordion-item id="12" title="🔎 Configuración SEO">
                <form method="POST" action="{{ route('configuration.seo') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="seo_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Título SEO</label>
                        <input
                            type="text"
                            id="seo_title"
                            name="seo_title"
                            value="{{ old('seo_title', $config['seo_title']) }}"
                            required
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        />
                        @error('seo_title')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="seo_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Descripción SEO</label>
                        <textarea
                            id="seo_description"
                            name="seo_description"
                            rows="4"
                            required
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >{{ old('seo_description', $config['seo_description']) }}</textarea>
                        @error('seo_description')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="seo_keywords" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Keywords SEO (separadas por coma)</label>
                        <textarea
                            id="seo_keywords"
                            name="seo_keywords"
                            rows="3"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >{{ old('seo_keywords', $config['seo_keywords']) }}</textarea>
                        @error('seo_keywords')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Guardar SEO
                        </button>
                    </div>
                </form>
            </x-accordion-item>
        </div>
    </div>

    {{-- Script Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-app-layout>
