# Página Institucional - Tucu Group

## Descripción General

Página institucional moderna y responsive para Tucu Group, un holding empresarial que integra múltiples empresas con presencia en diversos sectores industriales.

## Características

✨ **Diseño Moderno y Responsive**
- Interfaz limpia y profesional
- Totalmente responsive (mobile, tablet, desktop)
- Soporte para modo oscuro/claro

🎨 **Componentes Modulares**
- Componentes Blade reutilizables
- Arquitectura escalable
- Fácil de mantener y extender

📊 **Secciones Principales**
1. **Hero Section** - Presentación principal con CTA
2. **Empresas** - Información de las 3 empresas del holding
3. **Sectores** - Detalles de los sectores de operación
4. **Valores** - Principios corporativos
5. **Contacto** - Formulario y datos de contacto
6. **Footer** - Enlaces y información adicional

## Estructura de Archivos

```
resources/
├── views/
│   ├── institutional.blade.php      # Página principal
│   └── components/
│       ├── company-card.blade.php   # Tarjeta de empresa
│       ├── sector-card.blade.php    # Tarjeta de sector
│       ├── value-card.blade.php     # Tarjeta de valores
│       ├── stat-card.blade.php      # Tarjeta de estadísticas
│       └── contact-card.blade.php   # Tarjeta de contacto
├── css/
│   └── app.css                      # Estilos principales (Tailwind)
└── js/
    └── app.js                       # Scripts principales

routes/
├── web.php                          # Rutas de la aplicación

```

## Instalación y Configuración

### Requisitos Previos
- PHP 8.1+
- Laravel 11+
- Node.js 18+ (para compilar assets)

### Pasos de Instalación

1. **Clonar el proyecto**
   ```bash
   cd /home/rodrigo/TucuGroup/TucuGroup/web
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias de Node**
   ```bash
   npm install
   ```

4. **Compilar assets**
   ```bash
   npm run dev
   ```

5. **Iniciar servidor local**
   ```bash
   php artisan serve
   ```

6. **Acceder a la página**
   - Local: `http://localhost:8000`
   - Producción: `https://tucugroup.com.ar`

## Personalización

### Cambiar Información de Empresas

Editar [institutional.blade.php](institutional.blade.php) en la sección "Empresas Section":

```blade
@component('components.company-card', [
    'name' => 'Tucu Roller',
    'description' => 'Tu descripción aquí',
    'url' => 'tucuroller.com.ar'
])
@endcomponent
```

### Cambiar Datos de Contacto

Buscar la sección "Contacto Section" y actualizar:
- Email: `info@tucugroup.com.ar`
- Teléfono: `+54 (Área) XXXX-XXXX`
- Ubicación: `Argentina`

### Personalizaciones CSS

Los estilos principales están en `<style>` en institutional.blade.php:
- `gradient-primary`: Gradiente principal (naranja/rojo)
- `card-hover`: Efectos hover de tarjetas
- `stats-counter`: Estilo de números de estadísticas

### Colores Principales

- **Primario**: `#F53003` (Naranja/Rojo)
- **Secundario**: `#FF6B35` (Naranja claro)
- **Fondo Claro**: `#FDFDFC`
- **Fondo Oscuro**: `#0a0a0a`
- **Texto Claro**: `#1b1b18`
- **Texto Oscuro**: `#EDEDEC`

## Componentes Reutilizables

### company-card
Muestra información de una empresa del holding.

```blade
@component('components.company-card', [
    'name' => 'Nombre Empresa',
    'description' => 'Descripción',
    'icon' => '<svg>...</svg>',
    'iconBgColor' => 'gradient-primary',
    'iconColor' => 'text-white',
    'url' => 'ejemplo.com.ar'
])
@endcomponent
```

### sector-card
Muestra información detallada de un sector.

```blade
@component('components.sector-card', [
    'title' => 'Nombre Sector',
    'subtitle' => 'Descripción corta',
    'icon' => '<svg>...</svg>',
    'iconBgColor' => 'bg-blue-100 dark:bg-blue-900',
    'iconColor' => 'text-blue-600',
    'features' => ['Feature 1', 'Feature 2', 'Feature 3']
])
@endcomponent
```

### value-card
Muestra un valor corporativo.

```blade
@component('components.value-card', [
    'title' => 'Innovación',
    'description' => 'Descripción del valor',
    'icon' => '<svg>...</svg>',
    'bgColor' => 'gradient-primary',
    'iconColor' => 'text-white'
])
@endcomponent
```

### stat-card
Muestra una estadística.

```blade
@component('components.stat-card', [
    'number' => '25+',
    'label' => 'Años de trayectoria'
])
@endcomponent
```

### contact-card
Muestra información de contacto.

```blade
@component('components.contact-card', [
    'title' => 'Email',
    'content' => 'info@tucugroup.com.ar',
    'icon' => '<svg>...</svg>'
])
@endcomponent
```

## SEO y Metadatos

El archivo [institutional.blade.php](institutional.blade.php) incluye metadatos optimizados:
- Título descriptivo
- Meta descripción
- Keywords relevantes
- Estructura semántica

Para mejorar SEO:
1. Añadir Open Graph meta tags
2. Configurar sitemap.xml
3. Añadir schema.org estructurado
4. Optimizar imágenes

## Navegación y Comportamiento

### Menú Móvil
El menú móvil se activa automáticamente en pantallas menores a 768px.

### Desplazamiento Suave
Los enlaces internos (#empresas, #sectores, etc.) scroll suavemente a cada sección.

### Efecto Navbar
La navbar adquiere sombra cuando hay scroll en la página.

## Compatibilidad

- ✅ Chrome (últimas versiones)
- ✅ Firefox (últimas versiones)
- ✅ Safari (últimas versiones)
- ✅ Edge (últimas versiones)
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

## Rendimiento

- Optimizado con Tailwind CSS
- Sin dependencias JavaScript pesadas
- Imágenes optimizadas
- Carga rápida (< 2 segundos)

## Próximas Mejoras

- [ ] Integrar formulario de contacto con base de datos
- [ ] Agregar sección de blog
- [ ] Implementar newsletter
- [ ] Añadir galería de proyectos
- [ ] Integrar chatbot de soporte
- [ ] Análisis con Google Analytics
- [ ] Certificado SSL/HTTPS
- [ ] CDN para assets estáticos

## Soporte y Contacto

Para reportar problemas o sugerencias:
- Email: dev@tucugroup.com.ar
- Teléfono: +54 (Área) XXXX-XXXX

## Licencia

Todos los derechos reservados © 2026 Tucu Group

---

**Última actualización**: 28 de Febrero de 2026
**Versión**: 1.0.0
