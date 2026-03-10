<!DOCTYPE html>
<html lang="es">
@php
    $content = $content ?? config('institutional');
    $holding = $content['holding'] ?? [];
    $hero = $content['hero'] ?? [];
    $seo = $content['seo'] ?? [];
    $slider = $content['slider'] ?? ['enabled' => false, 'items' => [], 'autoplay_ms' => 5000];
    $companies = $content['companies'] ?? [];
    $sectors = $content['sectors'] ?? [];
    $statistics = $content['statistics'] ?? [];
    $footerStatistics = $content['footer_statistics'] ?? $statistics;
    $values = $content['values'] ?? [];
    $contact = $content['contact'] ?? [];
    $social = $content['social'] ?? [];
    $gaId = $content['integrations']['google_analytics_id'] ?? null;
    $siteLogoPath = \App\Models\SiteSetting::getValue('site_logo');
    $siteLogoUrl = $siteLogoPath ? \Illuminate\Support\Facades\Storage::url($siteLogoPath) : null;
@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $seo['description'] ?? '' }}">
    <meta name="keywords" content="{{ $seo['keywords'] ?? '' }}">
    <title>{{ $seo['title'] ?? ($holding['name'] ?? 'Tucu Group') }}</title>
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    
    <style>
        .gradient-primary {
            background: linear-gradient(135deg, #14532d 0%, #1f7a45 100%);
        }
        
        .gradient-dark {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(20, 83, 45, 0.18);
        }
        
        .sector-card {
            position: relative;
            overflow: hidden;
        }
        
        .sector-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(20, 83, 45, 0.12) 0%, rgba(31, 122, 69, 0.06) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .sector-card:hover::before {
            opacity: 1;
        }
        
        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .stats-counter {
            font-size: 3rem;
            font-weight: 700;
            background: linear-gradient(135deg, #14532d, #1f7a45);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .navbar-scroll {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .dark .navbar-scroll {
            box-shadow: 0 4px 12px rgba(31, 122, 69, 0.16);
        }

        .footer-panel {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: linear-gradient(145deg, rgba(21, 34, 24, 0.96), rgba(10, 15, 11, 0.96));
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.24);
        }

        .footer-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(74, 222, 128, 0.18), transparent 42%);
            pointer-events: none;
        }

        .footer-link {
            transition: all 0.25s ease;
        }

        .footer-link:hover {
            transform: translateX(6px);
        }

        .logo-shell {
            box-shadow: 0 12px 35px rgba(20, 83, 45, 0.24);
        }
    </style>
</head>
<body id="inicio" class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC]">
    @if(!empty($gaId))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $gaId }}');
        </script>
    @endif

    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white/80 dark:bg-[#161615]/80 backdrop-blur-md z-50 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="#inicio" class="flex items-center gap-3">
                    @if($siteLogoUrl)
                        <div class="logo-shell flex h-12 w-12 items-center justify-center rounded-2xl bg-white ring-1 ring-[#14532d]/10">
                            <img src="{{ $siteLogoUrl }}" alt="Logo {{ $holding['name'] ?? 'Tucu Group' }}" class="h-9 w-auto object-contain">
                        </div>
                    @else
                        <div class="logo-shell flex h-12 w-12 items-center justify-center rounded-2xl gradient-primary text-white text-lg font-bold">
                            TG
                        </div>
                    @endif
                    <div>
                        <span class="block font-bold text-lg leading-tight">{{ $holding['name'] ?? 'Tucu Group' }}</span>
                        <span class="hidden sm:block text-xs text-gray-500 dark:text-gray-400">{{ $holding['tagline'] ?? 'Holding Empresarial Innovador' }}</span>
                    </div>
                </a>
                <div class="hidden md:flex items-center gap-8">
                    <a href="#inicio" class="text-sm hover:text-[#14532d] transition">Inicio</a>
                    <a href="#empresas" class="text-sm hover:text-[#14532d] transition">Empresas</a>
                    <a href="#sectores" class="text-sm hover:text-[#14532d] transition">Sectores</a>
                    <a href="#valores" class="text-sm hover:text-[#14532d] transition">Valores</a>
                    <a href="#contacto" class="text-sm px-6 py-2 bg-gradient-primary text-white rounded-lg hover:shadow-lg transition">Contacto</a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-2">
                <a href="#inicio" class="block px-4 py-2 hover:text-[#14532d] transition">Inicio</a>
                <a href="#empresas" class="block px-4 py-2 hover:text-[#14532d] transition">Empresas</a>
                <a href="#sectores" class="block px-4 py-2 hover:text-[#14532d] transition">Sectores</a>
                <a href="#valores" class="block px-4 py-2 hover:text-[#14532d] transition">Valores</a>
                <a href="#contacto" class="block px-4 py-2 bg-gradient-primary text-white rounded-lg">Contacto</a>
            </div>
        </div>
    </nav>

    @if(($slider['enabled'] ?? false) && !empty($slider['items']))
        <section class="pt-16">
            <div class="relative h-[360px] sm:h-[420px] overflow-hidden" id="hero-slider" data-autoplay="{{ $slider['autoplay_ms'] ?? 5000 }}">
                @foreach($slider['items'] as $index => $slide)
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                        <img src="{{ $slide['image'] ?? '' }}" alt="{{ $slide['title'] ?? 'Slide' }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/40 flex items-center">
                            <div class="max-w-7xl mx-auto px-6">
                                <h2 class="text-white text-3xl sm:text-5xl font-bold mb-3">{{ $slide['title'] ?? '' }}</h2>
                                <p class="text-white/90 text-lg sm:text-xl">{{ $slide['subtitle'] ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-white to-gray-50 dark:from-[#161615] dark:to-[#0a0a0a]">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <div class="inline-block mb-4 px-4 py-2 bg-[#ecfdf3] dark:bg-[#3E3E3A] rounded-full text-sm font-medium text-[#14532d] dark:text-[#4ade80]">
                    {{ $hero['badge'] ?? '' }}
                </div>
                <h1 class="text-5xl sm:text-6xl font-bold mb-6 leading-tight">
                    {{ $hero['title_line_1'] ?? '' }}<br>
                    <span class="gradient-primary bg-clip-text text-transparent">{{ $hero['title_highlight'] ?? '' }}</span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-8">
                    {{ $hero['description'] ?? '' }}
                </p>
                <a href="{{ $hero['cta_link'] ?? '#empresas' }}" class="inline-block px-8 py-4 bg-gradient-primary text-white rounded-lg font-semibold hover:shadow-xl transition transform hover:scale-105">
                    {{ $hero['cta_text'] ?? 'Explorar Empresas' }}
                </a>
            </div>
        </div>
    </section>

    <!-- Empresas Section -->
    <section id="empresas" class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Nuestras Empresas</h2>
                <p class="text-gray-600 dark:text-gray-400 text-lg">Tres pilares que sostienen nuestro crecimiento</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($companies as $company)
                    <div class="bg-white dark:bg-[#1a1a1a] rounded-2xl p-8 border border-gray-200 dark:border-gray-700 card-hover">
                        @if(!empty($company['logo']))
                            <div class="mb-6 h-16 w-28 flex items-center justify-start">
                                <img src="{{ $company['logo'] }}" alt="Logo {{ $company['name'] ?? 'empresa' }}" class="max-h-16 max-w-full object-contain">
                            </div>
                        @else
                            <div class="icon-box gradient-primary text-white">🏢</div>
                        @endif
                        <h3 class="text-2xl font-bold mb-3">{{ $company['name'] ?? '' }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $company['description'] ?? '' }}</p>
                        @if(!empty($company['website']) && $company['website'] !== '#')
                            <a href="{{ $company['website'] }}" target="_blank" class="text-[#14532d] font-semibold hover:underline">{{ $company['website'] }}</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Sectores Section -->
    <section id="sectores" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-[#161615]">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Sectores de Operación</h2>
                <p class="text-gray-600 dark:text-gray-400 text-lg">Diversificación estratégica con presencia consolidada</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-12">
                @foreach($sectors as $sector)
                    <div class="bg-white dark:bg-[#1a1a1a] rounded-2xl p-8 border border-gray-200 dark:border-gray-700 sector-card">
                        <div class="icon-box bg-green-100 dark:bg-green-900 text-green-700">⚙️</div>
                        <h3 class="text-2xl font-bold mb-2">{{ $sector['title'] ?? '' }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $sector['subtitle'] ?? '' }}</p>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                            @foreach(($sector['features'] ?? []) as $feature)
                                <li>• {{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>

            <!-- Stats -->
            <div class="bg-white dark:bg-[#1a1a1a] rounded-2xl p-12 border border-gray-200 dark:border-gray-700">
                <div class="grid md:grid-cols-4 gap-8 text-center">
                    @foreach($statistics as $stat)
                        @component('components.stat-card', [
                            'number' => $stat['number'] ?? '',
                            'label' => $stat['label'] ?? ''
                        ])
                        @endcomponent
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Valores Section -->
    <section id="valores" class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Nuestros Valores</h2>
                <p class="text-gray-600 dark:text-gray-400 text-lg">Principios que guían nuestro camino</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($values as $value)
                    <div class="bg-white dark:bg-[#1a1a1a] rounded-xl p-6 border border-gray-200 dark:border-gray-700 card-hover">
                        <div class="icon-box gradient-primary text-white">⭐</div>
                        <h3 class="text-xl font-bold mb-2">{{ $value['title'] ?? '' }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $value['description'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-[#161615]">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Ponte en Contacto</h2>
                <p class="text-gray-600 dark:text-gray-400 text-lg">Estamos aquí para ayudarte</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-12">
                @component('components.contact-card', [
                    'title' => 'Email',
                    'content' => $contact['email'] ?? '',
                    'icon' => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>'
                ])
                @endcomponent

                @component('components.contact-card', [
                    'title' => 'Teléfono',
                    'content' => $contact['phone'] ?? '',
                    'icon' => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.793.894c.067.614.1 1.238.1 1.868 0 .63-.033 1.254-.1 1.868l1.793.894a1 1 0 01.54 1.06l-.74 4.435a1 1 0 01-.986.836H3a1 1 0 01-1-1V3z"/></svg>'
                ])
                @endcomponent

                @component('components.contact-card', [
                    'title' => 'Ubicación',
                    'content' => $contact['location'] ?? '',
                    'icon' => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/></svg>'
                ])
                @endcomponent
            </div>

            <!-- Contact Form -->
            <div class="bg-white dark:bg-[#1a1a1a] rounded-2xl p-8 border border-gray-200 dark:border-gray-700 max-w-2xl mx-auto">
                <form class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <input type="text" placeholder="Nombre completo" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-[#0a0a0a] focus:outline-none focus:ring-2 focus:ring-[#14532d] dark:text-white">
                        <input type="email" placeholder="Email" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-[#0a0a0a] focus:outline-none focus:ring-2 focus:ring-[#14532d] dark:text-white">
                    </div>
                    <input type="text" placeholder="Asunto" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-[#0a0a0a] focus:outline-none focus:ring-2 focus:ring-[#14532d] dark:text-white">
                    <textarea placeholder="Mensaje" rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-[#0a0a0a] focus:outline-none focus:ring-2 focus:ring-[#14532d] dark:text-white"></textarea>
                    <button type="submit" class="w-full px-8 py-4 bg-gradient-primary text-white rounded-lg font-semibold hover:shadow-xl transition transform hover:scale-105">
                        Enviar Mensaje
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative overflow-hidden bg-[#09110b] text-white py-16 px-4 sm:px-6 lg:px-8">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-20 left-0 h-56 w-56 rounded-full bg-[#14532d]/30 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-64 w-64 rounded-full bg-[#4ade80]/10 blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto">
            @if(!empty($footerStatistics))
                <div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-10">
                    @foreach($footerStatistics as $stat)
                        <div class="footer-panel rounded-2xl p-5 text-center">
                            <div class="text-3xl font-bold text-[#4ade80]">{{ $stat['number'] ?? '' }}</div>
                            <p class="text-gray-300 text-sm mt-1 uppercase tracking-[0.18em]">{{ $stat['label'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="grid xl:grid-cols-[1.35fr_0.8fr_0.85fr] gap-6 mb-8">
                <div class="footer-panel rounded-3xl p-8 lg:p-10">
                    <div class="relative z-10">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-6">
                            @if($siteLogoUrl)
                                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white/95">
                                    <img src="{{ $siteLogoUrl }}" alt="Logo {{ $holding['name'] ?? 'Tucu Group' }}" class="h-12 w-auto object-contain">
                                </div>
                            @else
                                <div class="flex h-16 w-16 items-center justify-center rounded-2xl gradient-primary text-white text-2xl font-bold">
                                    TG
                                </div>
                            @endif
                            <div>
                                <p class="text-sm uppercase tracking-[0.3em] text-[#86efac] mb-2">Tucu Group</p>
                                <h3 class="text-3xl font-bold">{{ $holding['name'] ?? 'Tucu Group' }}</h3>
                                <p class="text-gray-300 mt-1">{{ $holding['tagline'] ?? 'Holding Empresarial Innovador' }}</p>
                            </div>
                        </div>

                        <p class="text-gray-300 leading-7 max-w-2xl mb-8">
                            {{ $holding['description'] ?? 'Conectamos industria, innovación y crecimiento para crear empresas con impacto real y una presencia sólida en cada mercado.' }}
                        </p>

                        <div class="grid sm:grid-cols-3 gap-4 mb-8">
                            @if(!empty($contact['email']))
                                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                    <p class="text-xs uppercase tracking-[0.25em] text-[#86efac] mb-2">Email</p>
                                    <p class="text-sm text-gray-200 break-all">{{ $contact['email'] }}</p>
                                </div>
                            @endif
                            @if(!empty($contact['phone']))
                                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                    <p class="text-xs uppercase tracking-[0.25em] text-[#86efac] mb-2">Teléfono</p>
                                    <p class="text-sm text-gray-200">{{ $contact['phone'] }}</p>
                                </div>
                            @endif
                            @if(!empty($contact['location']))
                                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                    <p class="text-xs uppercase tracking-[0.25em] text-[#86efac] mb-2">Ubicación</p>
                                    <p class="text-sm text-gray-200">{{ $contact['location'] }}</p>
                                </div>
                            @endif
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <a href="#contacto" class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-gradient-to-r from-[#14532d] to-[#1f7a45] text-white font-semibold hover:shadow-xl transition">
                                Hablemos
                            </a>
                            <a href="#empresas" class="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-white/15 bg-white/5 text-gray-100 font-semibold hover:bg-white/10 transition">
                                Ver empresas
                            </a>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="footer-panel rounded-3xl p-6">
                        <div class="relative z-10">
                            <h4 class="font-bold text-lg mb-5">Navegación rápida</h4>
                            <ul class="space-y-3 text-sm text-gray-300">
                                <li><a href="#inicio" class="footer-link flex items-center justify-between rounded-xl border border-white/5 bg-white/5 px-4 py-3 hover:border-[#4ade80]/30 hover:text-[#86efac]">Inicio <span>↗</span></a></li>
                                <li><a href="#empresas" class="footer-link flex items-center justify-between rounded-xl border border-white/5 bg-white/5 px-4 py-3 hover:border-[#4ade80]/30 hover:text-[#86efac]">Empresas <span>↗</span></a></li>
                                <li><a href="#sectores" class="footer-link flex items-center justify-between rounded-xl border border-white/5 bg-white/5 px-4 py-3 hover:border-[#4ade80]/30 hover:text-[#86efac]">Sectores <span>↗</span></a></li>
                                <li><a href="#valores" class="footer-link flex items-center justify-between rounded-xl border border-white/5 bg-white/5 px-4 py-3 hover:border-[#4ade80]/30 hover:text-[#86efac]">Valores <span>↗</span></a></li>
                                <li><a href="#contacto" class="footer-link flex items-center justify-between rounded-xl border border-white/5 bg-white/5 px-4 py-3 hover:border-[#4ade80]/30 hover:text-[#86efac]">Contacto <span>↗</span></a></li>
                            </ul>
                        </div>
                    </div>

                    @if(!empty(array_filter($social)))
                        <div class="footer-panel rounded-3xl p-6">
                            <div class="relative z-10">
                                <h4 class="font-bold text-lg mb-5">Redes</h4>
                                <div class="grid grid-cols-2 gap-3 text-sm">
                                    @foreach($social as $network => $url)
                                        @if(!empty($url))
                                            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-center font-medium text-gray-200 hover:border-[#4ade80]/40 hover:bg-white/10 hover:text-[#86efac] transition">
                                                {{ ucfirst($network) }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="footer-panel rounded-3xl p-6">
                    <div class="relative z-10">
                        <h4 class="font-bold text-lg mb-5">Empresas del grupo</h4>
                        <div class="space-y-4">
                            @foreach($companies as $company)
                                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-semibold text-white">{{ $company['name'] ?? 'Unidad de negocio' }}</p>
                                            <p class="text-sm text-gray-300 mt-1">{{ $company['description'] ?? '' }}</p>
                                        </div>
                                        @if(!empty($company['website']) && $company['website'] !== '#')
                                            <a href="{{ $company['website'] }}" target="_blank" rel="noopener noreferrer" class="shrink-0 inline-flex items-center rounded-xl border border-[#4ade80]/20 px-3 py-2 text-xs font-semibold text-[#86efac] hover:bg-[#4ade80]/10 transition">
                                                Sitio
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-gray-400">
                <p>&copy; {{ now()->year }} {{ $holding['name'] ?? 'Tucu Group' }}. Todos los derechos reservados.</p>
                <p class="text-center md:text-right">Diseño institucional con foco en marca, claridad y conversión.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Close menu when clicking a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('mobile-menu').classList.add('hidden');
            });
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Navbar scroll effect
        const navbar = document.querySelector('nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 0) {
                navbar.classList.add('shadow-md');
            } else {
                navbar.classList.remove('shadow-md');
            }
        });

        // Hero slider
        const slider = document.getElementById('hero-slider');
        if (slider) {
            const items = slider.querySelectorAll('.slider-item');
            const intervalMs = Number(slider.dataset.autoplay || 5000);
            let current = 0;

            setInterval(() => {
                items[current].classList.remove('opacity-100');
                items[current].classList.add('opacity-0');
                current = (current + 1) % items.length;
                items[current].classList.remove('opacity-0');
                items[current].classList.add('opacity-100');
            }, intervalMs);
        }
    </script>

    {{-- Botón Flotante WhatsApp --}}
    <x-whatsapp-button />
</body>
</html>

