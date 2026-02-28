<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tucu Group - Holding empresarial innovador con presencia en múltiples sectores">
    <meta name="keywords" content="Tucu Group, holding, empresarial, innovación, Tucu Roller">
    <title>Tucu Group - Holding Empresarial Innovador</title>
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    
    <style>
        .gradient-primary {
            background: linear-gradient(135deg, #F53003 0%, #FF6B35 100%);
        }
        
        .gradient-dark {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(245, 48, 3, 0.15);
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
            background: linear-gradient(135deg, rgba(245, 48, 3, 0.1) 0%, rgba(255, 107, 53, 0.05) 100%);
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
            background: linear-gradient(135deg, #F53003, #FF6B35);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .navbar-scroll {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .dark .navbar-scroll {
            box-shadow: 0 4px 12px rgba(255, 107, 53, 0.1);
        }
    </style>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC]">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white/80 dark:bg-[#161615]/80 backdrop-blur-md z-50 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="#" class="flex items-center gap-2">
                    <div class="text-2xl font-bold gradient-primary bg-clip-text text-transparent">
                        TG
                    </div>
                    <span class="font-bold text-lg hidden sm:inline">Tucu Group</span>
                </a>
                <div class="hidden md:flex items-center gap-8">
                    <a href="#empresas" class="text-sm hover:text-[#F53003] transition">Empresas</a>
                    <a href="#sectores" class="text-sm hover:text-[#F53003] transition">Sectores</a>
                    <a href="#valores" class="text-sm hover:text-[#F53003] transition">Valores</a>
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
                <a href="#empresas" class="block px-4 py-2 hover:text-[#F53003] transition">Empresas</a>
                <a href="#sectores" class="block px-4 py-2 hover:text-[#F53003] transition">Sectores</a>
                <a href="#valores" class="block px-4 py-2 hover:text-[#F53003] transition">Valores</a>
                <a href="#contacto" class="block px-4 py-2 bg-gradient-primary text-white rounded-lg">Contacto</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-white to-gray-50 dark:from-[#161615] dark:to-[#0a0a0a]">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <div class="inline-block mb-4 px-4 py-2 bg-[#fff2f2] dark:bg-[#3E3E3A] rounded-full text-sm font-medium text-[#F53003] dark:text-[#FF4433]">
                    ✨ Holding Empresarial Innovador
                </div>
                <h1 class="text-5xl sm:text-6xl font-bold mb-6 leading-tight">
                    Construyendo el Futuro<br>
                    <span class="gradient-primary bg-clip-text text-transparent">Juntos</span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-8">
                    Tucu Group es un holding empresarial que integra negocios innovadores con impacto en la sociedad y la industria. Más de 25 años de experiencia y excelencia.
                </p>
                <button class="inline-block px-8 py-4 bg-gradient-primary text-white rounded-lg font-semibold hover:shadow-xl transition transform hover:scale-105">
                    Explorar Empresas
                </button>
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
                @component('components.company-card', [
                    'name' => 'Tucu Roller',
                    'description' => 'Líder en soluciones de rodillos industriales de alta precisión. Innovación en rodamientos y componentes para múltiples industrias.',
                    'icon' => '<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8"/><circle cx="10" cy="10" r="5" fill="white"/></svg>',
                    'iconBgColor' => 'gradient-primary',
                    'iconColor' => 'text-white',
                    'url' => 'tucuroller.com.ar',
                    'urlColor' => 'text-[#F53003]'
                ])
                @endcomponent

                @component('components.company-card', [
                    'name' => 'Sector B',
                    'description' => 'Expertise en tecnología y transformación digital. Soluciones integrales para optimización de procesos empresariales.',
                    'icon' => '<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/></svg>',
                    'iconBgColor' => 'bg-blue-100 dark:bg-blue-900',
                    'iconColor' => 'text-blue-600'
                ])
                @endcomponent

                @component('components.company-card', [
                    'name' => 'Sector C',
                    'description' => 'Desarrollo sostenible e impacto social. Iniciativas que generan valor para nuestras comunidades.',
                    'icon' => '<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633z"/></svg>',
                    'iconBgColor' => 'bg-green-100 dark:bg-green-900',
                    'iconColor' => 'text-green-600'
                ])
                @endcomponent
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
                @component('components.sector-card', [
                    'title' => 'Sector Industrial',
                    'subtitle' => 'Componentes de precisión y soluciones manufactureras',
                    'icon' => '<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M6 4a1 1 0 011-1h6a1 1 0 011 1v1H6V4zm0 3h8v8a2 2 0 11-4 0 2 2 0 11-4 0V7zM4 8h1v7a3 3 0 003 3h4a3 3 0 003-3V8h1V4a2 2 0 00-2-2H6a2 2 0 00-2 2v4z"/></svg>',
                    'iconBgColor' => 'bg-orange-100 dark:bg-orange-900',
                    'iconColor' => 'text-orange-600',
                    'features' => [
                        'Rodillos y rodamientos de precisión',
                        'Componentes para maquinaria pesada',
                        'Soluciones de ingeniería personalizada'
                    ]
                ])
                @endcomponent

                @component('components.sector-card', [
                    'title' => 'Transformación Digital',
                    'subtitle' => 'Tecnología e innovación para el futuro',
                    'icon' => '<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 010 .708l-3 3a.5.5 0 01-.708 0l-1.5-1.5a.5.5 0 00-.708.708l1.5 1.5a1.5 1.5 0 002.12 0l3-3a.5.5 0 000-.708.5.5 0 000-.708z"/></svg>',
                    'iconBgColor' => 'bg-blue-100 dark:bg-blue-900',
                    'iconColor' => 'text-blue-600',
                    'features' => [
                        'Consultoría tecnológica empresarial',
                        'Automatización de procesos',
                        'Desarrollo de soluciones IT customizadas'
                    ]
                ])
                @endcomponent

                @component('components.sector-card', [
                    'title' => 'Sostenibilidad',
                    'subtitle' => 'Compromiso con el desarrollo sustentable',
                    'icon' => '<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/></svg>',
                    'iconBgColor' => 'bg-green-100 dark:bg-green-900',
                    'iconColor' => 'text-green-600',
                    'features' => [
                        'Prácticas ecológicas en manufactura',
                        'Responsabilidad social empresarial',
                        'Iniciativas comunitarias'
                    ]
                ])
                @endcomponent

                @component('components.sector-card', [
                    'title' => 'Comercio Global',
                    'subtitle' => 'Presencia internacional con estándares globales',
                    'icon' => '<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/></svg>',
                    'iconBgColor' => 'bg-indigo-100 dark:bg-indigo-900',
                    'iconColor' => 'text-indigo-600',
                    'features' => [
                        'Exportación a mercados internacionales',
                        'Certificaciones y estándares internacionales',
                        'Alianzas comerciales estratégicas'
                    ]
                ])
                @endcomponent
            </div>

            <!-- Stats -->
            <div class="bg-white dark:bg-[#1a1a1a] rounded-2xl p-12 border border-gray-200 dark:border-gray-700">
                <div class="grid md:grid-cols-4 gap-8 text-center">
                    @component('components.stat-card', [
                        'number' => '25+',
                        'label' => 'Años de trayectoria'
                    ])
                    @endcomponent

                    @component('components.stat-card', [
                        'number' => '500+',
                        'label' => 'Clientes satisfechos'
                    ])
                    @endcomponent

                    @component('components.stat-card', [
                        'number' => '50+',
                        'label' => 'Profesionales talentosos'
                    ])
                    @endcomponent

                    @component('components.stat-card', [
                        'number' => '30+',
                        'label' => 'Países alcanzados'
                    ])
                    @endcomponent
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
                @component('components.value-card', [
                    'title' => 'Innovación',
                    'description' => 'Constantemente evolucionamos y buscamos nuevas soluciones',
                    'icon' => '<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 17v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.381z"/></svg>',
                    'bgColor' => 'gradient-primary',
                    'iconColor' => 'text-white'
                ])
                @endcomponent

                @component('components.value-card', [
                    'title' => 'Integridad',
                    'description' => 'Transparencia y ética en todas nuestras operaciones',
                    'icon' => '<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM9 3a6 6 0 11-12 0 6 6 0 0112 0z"/></svg>',
                    'bgColor' => 'bg-blue-100 dark:bg-blue-900',
                    'iconColor' => 'text-blue-600'
                ])
                @endcomponent

                @component('components.value-card', [
                    'title' => 'Calidad',
                    'description' => 'Excelencia en cada producto y servicio',
                    'icon' => '<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h4V3a1 1 0 112 0v1h1a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v1a2 2 0 01-2 2h-1v1a1 1 0 11-2 0v-1H8v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-1H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5H2a1 1 0 010-2h1V2a2 2 0 012-2h1V0a1 1 0 011 0v2zm6 5V5H5v7h8V7z"/></svg>',
                    'bgColor' => 'bg-green-100 dark:bg-green-900',
                    'iconColor' => 'text-green-600'
                ])
                @endcomponent

                @component('components.value-card', [
                    'title' => 'Sostenibilidad',
                    'description' => 'Responsabilidad con el ambiente y comunidad',
                    'icon' => '<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M13 7H7v6h6V7z"/><path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2V2a1 1 0 112 0v1h1a2 2 0 012 2v1h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v1a2 2 0 01-2 2h-1v1a1 1 0 11-2 0v-1h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H6a2 2 0 01-2-2v-1H3a1 1 0 110-2h1V9H3a1 1 0 010-2h1V5H3a1 1 0 010-2h1V2a2 2 0 012-2h1V0a1 1 0 012 0v2zm6 5V5H5v7h8V7z"/></svg>',
                    'bgColor' => 'bg-purple-100 dark:bg-purple-900',
                    'iconColor' => 'text-purple-600'
                ])
                @endcomponent
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
                    'content' => 'info@tucugroup.com.ar',
                    'icon' => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>'
                ])
                @endcomponent

                @component('components.contact-card', [
                    'title' => 'Teléfono',
                    'content' => '+54 (Área) XXXX-XXXX',
                    'icon' => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.793.894c.067.614.1 1.238.1 1.868 0 .63-.033 1.254-.1 1.868l1.793.894a1 1 0 01.54 1.06l-.74 4.435a1 1 0 01-.986.836H3a1 1 0 01-1-1V3z"/></svg>'
                ])
                @endcomponent

                @component('components.contact-card', [
                    'title' => 'Ubicación',
                    'content' => 'Argentina',
                    'icon' => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/></svg>'
                ])
                @endcomponent
            </div>

            <!-- Contact Form -->
            <div class="bg-white dark:bg-[#1a1a1a] rounded-2xl p-8 border border-gray-200 dark:border-gray-700 max-w-2xl mx-auto">
                <form class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <input type="text" placeholder="Nombre completo" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-[#0a0a0a] focus:outline-none focus:ring-2 focus:ring-[#F53003] dark:text-white">
                        <input type="email" placeholder="Email" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-[#0a0a0a] focus:outline-none focus:ring-2 focus:ring-[#F53003] dark:text-white">
                    </div>
                    <input type="text" placeholder="Asunto" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-[#0a0a0a] focus:outline-none focus:ring-2 focus:ring-[#F53003] dark:text-white">
                    <textarea placeholder="Mensaje" rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-[#0a0a0a] focus:outline-none focus:ring-2 focus:ring-[#F53003] dark:text-white"></textarea>
                    <button type="submit" class="w-full px-8 py-4 bg-gradient-primary text-white rounded-lg font-semibold hover:shadow-xl transition transform hover:scale-105">
                        Enviar Mensaje
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#1a1a1a] dark:bg-[#0a0a0a] text-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="text-2xl font-bold mb-4">Tucu Group</div>
                    <p class="text-gray-400 text-sm">Holding empresarial innovador con presencia global y excelencia operativa</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4 text-sm">Empresa</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-[#F53003] transition">Sobre nosotros</a></li>
                        <li><a href="#" class="hover:text-[#F53003] transition">Carreras</a></li>
                        <li><a href="#" class="hover:text-[#F53003] transition">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4 text-sm">Productos</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="https://tucuroller.com.ar" target="_blank" class="hover:text-[#F53003] transition">Tucu Roller</a></li>
                        <li><a href="#" class="hover:text-[#F53003] transition">Soluciones Tech</a></li>
                        <li><a href="#" class="hover:text-[#F53003] transition">Iniciativas Sostenibles</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4 text-sm">Legal</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-[#F53003] transition">Privacidad</a></li>
                        <li><a href="#" class="hover:text-[#F53003] transition">Términos</a></li>
                        <li><a href="#" class="hover:text-[#F53003] transition">Cookies</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2026 Tucu Group. Todos los derechos reservados. | Desarrollado con excelencia</p>
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
    </script>
</body>
</html>

