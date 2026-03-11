<?php

/**
 * Configuración Página Institucional - Tucu Group
 * 
 * Este archivo contiene la configuración de la página institucional
 * para facilitar personalizaciones sin tocar el código principal.
 */

return [
    // Información general del holding
    'holding' => [
        'name' => 'Tucu Group',
        'tagline' => 'Holding Empresarial Innovador',
        'description' => 'Tucu Group es un holding empresarial que integra negocios innovadores con impacto en la sociedad y la industria.',
        'years_founded' => 2001,
    ],

    // Hero principal
    'hero' => [
        'badge' => '✨ Holding Empresarial Innovador',
        'title_line_1' => 'Construyendo el Futuro',
        'title_highlight' => 'Juntos',
        'description' => 'Tucu Group es un holding empresarial que integra negocios innovadores con impacto en la sociedad y la industria. Más de 25 años de experiencia y excelencia.',
        'cta_text' => 'Explorar Empresas',
        'cta_link' => '#empresas',
    ],

    // Slider superior
    'slider' => [
        'enabled' => true,
        'autoplay_ms' => 5000,
        'items' => [
            [
                'title' => 'Innovación en movimiento',
                'subtitle' => 'Soluciones industriales y tecnológicas para crecer',
                'image' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=1600&q=80',
            ],
            [
                'title' => 'Calidad con visión global',
                'subtitle' => 'Presencia internacional y compromiso local',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=80',
            ],
            [
                'title' => 'Un holding, múltiples oportunidades',
                'subtitle' => 'Integramos sectores para generar impacto real',
                'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1600&q=80',
            ],
        ],
    ],

    // Empresas del holding
    'companies' => [
        [
            'id' => 1,
            'name' => 'Tucu Roller',
            'description' => 'Líder en soluciones de rodillos industriales de alta precisión. Innovación en rodamientos y componentes para múltiples industrias.',
            'website' => 'https://tucuroller.com.ar',
            'icon' => 'roller',
            'color' => 'gradient-primary',
        ],
        [
            'id' => 2,
            'name' => 'Sector B',
            'description' => 'Expertise en tecnología y transformación digital. Soluciones integrales para optimización de procesos empresariales.',
            'website' => '#',
            'icon' => 'tech',
            'color' => 'blue',
            'status' => 'coming_soon',
        ],
        [
            'id' => 3,
            'name' => 'Sector C',
            'description' => 'Desarrollo sostenible e impacto social. Iniciativas que generan valor para nuestras comunidades.',
            'website' => '#',
            'icon' => 'sustainability',
            'color' => 'green',
            'status' => 'coming_soon',
        ],
    ],

    // Sectores de operación
    'sectors' => [
        [
            'id' => 1,
            'title' => 'Sector Industrial',
            'subtitle' => 'Componentes de precisión y soluciones manufactureras',
            'icon' => 'factory',
            'color' => 'green',
            'features' => [
                'Rodillos y rodamientos de precisión',
                'Componentes para maquinaria pesada',
                'Soluciones de ingeniería personalizada',
            ],
        ],
        [
            'id' => 2,
            'title' => 'Transformación Digital',
            'subtitle' => 'Tecnología e innovación para el futuro',
            'icon' => 'code',
            'color' => 'blue',
            'features' => [
                'Consultoría tecnológica empresarial',
                'Automatización de procesos',
                'Desarrollo de soluciones IT customizadas',
            ],
        ],
        [
            'id' => 3,
            'title' => 'Sostenibilidad',
            'subtitle' => 'Compromiso con el desarrollo sustentable',
            'icon' => 'leaf',
            'color' => 'green',
            'features' => [
                'Prácticas ecológicas en manufactura',
                'Responsabilidad social empresarial',
                'Iniciativas comunitarias',
            ],
        ],
        [
            'id' => 4,
            'title' => 'Comercio Global',
            'subtitle' => 'Presencia internacional con estándares globales',
            'icon' => 'globe',
            'color' => 'indigo',
            'features' => [
                'Exportación a mercados internacionales',
                'Certificaciones y estándares internacionales',
                'Alianzas comerciales estratégicas',
            ],
        ],
    ],

    // Estadísticas
    'statistics' => [
        [
            'number' => '25+',
            'label' => 'Años de trayectoria',
        ],
        [
            'number' => '500+',
            'label' => 'Clientes satisfechos',
        ],
        [
            'number' => '50+',
            'label' => 'Profesionales talentosos',
        ],
        [
            'number' => '30+',
            'label' => 'Países alcanzados',
        ],
    ],

    // Estadísticas destacadas del footer
    'footer_statistics' => [
        [
            'number' => '500+',
            'label' => 'Clientes',
        ],
        [
            'number' => '120+',
            'label' => 'Proyectos',
        ],
        [
            'number' => '25+',
            'label' => 'Años',
        ],
        [
            'number' => '30+',
            'label' => 'Países',
        ],
    ],

    // Valores corporativos
    'values' => [
        [
            'title' => 'Innovación',
            'description' => 'Constantemente evolucionamos y buscamos nuevas soluciones',
            'icon' => 'lightning',
            'color' => 'gradient-primary',
        ],
        [
            'title' => 'Integridad',
            'description' => 'Transparencia y ética en todas nuestras operaciones',
            'icon' => 'shield',
            'color' => 'blue',
        ],
        [
            'title' => 'Calidad',
            'description' => 'Excelencia en cada producto y servicio',
            'icon' => 'check',
            'color' => 'green',
        ],
        [
            'title' => 'Sostenibilidad',
            'description' => 'Responsabilidad con el ambiente y comunidad',
            'icon' => 'earth',
            'color' => 'purple',
        ],
    ],

    // Contacto
    'contact' => [
        'section_title' => 'Ponte en Contacto',
        'section_subtitle' => 'Estamos aquí para ayudarte',
        'email_label' => 'Email',
        'phone_label' => 'Teléfono',
        'location_label' => 'Ubicación',
        'email' => 'info@tucugroup.com.ar',
        'phone' => '+54 (Área) XXXX-XXXX',
        'location' => 'Argentina',
        'address' => 'Argentina',
    ],

    // Redes sociales
    'social' => [
        'linkedin' => 'https://linkedin.com/company/tucu-group',
        'twitter' => 'https://twitter.com/tucugroup',
        'instagram' => 'https://instagram.com/tucugroup',
        'facebook' => 'https://facebook.com/tucugroup',
    ],

    // Colores del tema
    'colors' => [
        'primary' => '#14532d',
        'primary_light' => '#1f7a45',
        'secondary' => '#1a1a1a',
        'text_light' => '#1b1b18',
        'text_dark' => '#EDEDEC',
        'bg_light' => '#FDFDFC',
        'bg_dark' => '#0a0a0a',
    ],

    // Configuración de SEO
    'seo' => [
        'title' => 'Tucu Group - Holding Empresarial Innovador',
        'description' => 'Tucu Group es un holding empresarial que integra negocios innovadores con impacto en la sociedad y la industria.',
        'keywords' => 'Tucu Group, holding, empresarial, innovación, Tucu Roller, Argentina',
        'author' => 'Tucu Group',
        'og_image' => '/images/og-image.jpg',
    ],

    // Integraciones externas
    'integrations' => [
        'google_analytics_id' => '',
    ],
];
