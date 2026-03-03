# 🎛️ Guía de Configuración Avanzada - Dashboard

## Nuevas Funcionalidades Agregadas

Tu panel de configuración ahora incluye 8 secciones completas para personalizar tu sitio web.

---

## 📋 1. Información de la Empresa

Configure los datos básicos de su empresa que aparecerán en todo el sitio.

**Campos disponibles:**
- Nombre de la empresa
- Descripción (hasta 1000 caracteres)
- Teléfono
- Email
- Dirección
- País
- Sitio web (opcional)

**Dónde se usa:**
- Página institucional
- Footer del sitio
- Contacto general

---

## 📊 2. Google Analytics

Integra Google Analytics o Google Tag Manager en tu sitio.

**Configuración:**
- **ID de Google Analytics**: Ingresa tu GA ID (ej: `G-XXXXXXXXXX`) o GTM ID (ej: `GTM-XXXXXXX`)
- **Habilitar**: Checkbox para activar/desactivar el seguimiento

**Cómo obtener tu ID:**
1. Ve a [Google Analytics](https://analytics.google.com)
2. Ve a Administración → Fuentes de datos → Web
3. Copia tu ID (empieza con "G-")

**O para Google Tag Manager:**
1. Ve a [Google Tag Manager](https://tagmanager.google.com)
2. Ve a Admin → Copiar el ID del contenedor (empieza con "GTM-")

---

## 📧 3. Configuración SMTP

Configura el servidor de correo electrónico para enviar emails desde tu aplicación.

**Campos requeridos:**
- **Host SMTP**: Servidor de correo (ej: `smtp.gmail.com`)
- **Puerto**: Puerto SMTP (587 para TLS, 465 para SSL)
- **Usuario**: Tu email completo
- **Contraseña**: Contraseña de la cuenta (déjalo en blanco para no cambiar)
- **Encriptación**: TLS o SSL
- **Dirección De**: Email que aparecerá como remitente
- **Nombre De**: Nombre que aparecerá como remitente

**Ejemplos:**

### Gmail:
```
Host: smtp.gmail.com
Puerto: 587
Usuario: tu-email@gmail.com
Contraseña: tu-contraseña
Encriptación: TLS
```

**Nota:** Para Gmail, debes:
1. Habilitar [Acceso a aplicaciones menos seguras](https://myaccount.google.com/lesssecureapps)
2. O usar [Contraseña de aplicación](https://myaccount.google.com/apppasswords)

### Otros servidores:
- **Outlook**: smtp.office365.com (Puerto 587, TLS)
- **SendGrid**: smtp.sendgrid.net (Puerto 587, TLS)
- **Mailgun**: smtp.mailgun.org (Puerto 587, TLS)

---

## 🖼️ 4. Logo e Imágenes del Sitio

Sube y gestiona el logo y las imágenes principales de tu sitio.

**Elementos disponibles:**

### Logo del Sitio
- Aparece en la navegación y header
- Formatos: JPG, PNG, GIF, WebP
- Tamaño máximo: 5MB

### Imagen Hero (Portada)
- Banner principal de la página institucional
- Formatos: JPG, PNG, GIF, WebP
- Tamaño máximo: 10MB

### Imagen Banner
- Banner general del sitio
- Formatos: JPG, PNG, GIF, WebP
- Tamaño máximo: 10MB

### Imagen Footer
- Imagen que aparece en el footer
- Formatos: JPG, PNG, GIF, WebP
- Tamaño máximo: 10MB

**Características:**
- Previsualización de imagen actual
- Botón para eliminar imagen
- Las imágenes se guardan automáticamente en `storage/app/public/images/`

---

## 💬 5. Configuración WhatsApp

Agrega un botón flotante de WhatsApp en tu sitio para facilitar la comunicación.

**Configuración:**

- **Número de WhatsApp**: Número con código de país (ej: `+54911234567`)
- **Mensaje por Defecto**: Mensaje que se enviará al hacer clic (ej: "Hola, quisiera más información")
- **Habilitar**: Checkbox para mostrar/ocultar el botón

**Cómo funciona:**
1. El botón aparecerá en la esquina inferior derecha del sitio
2. Al hacer clic, abre WhatsApp Web con el número configurado
3. El mensaje predeterminado se envía automáticamente
4. El usuario puede modificar el mensaje antes de enviar

**Dónde aparece:**
- Página institucional (esquina inferior derecha)
- Flotante (visible sin scroll)
- Con animación de hover

**Formato del número:**
- Debe incluir el código de país
- Sin espacios en blanco
- Ej: `+549112345678` o `+541133334444`

---

## 🔗 6. Configuración Footer

Personaliza el footer de tu sitio con información, enlaces y redes sociales.

**Campos disponibles:**

### Sección "Acerca de"
- Descripción breve de la empresa (hasta 500 caracteres)
- Aparece en el footer

### Enlaces
- Lista de enlaces separados por comas
- Ej: `Inicio, Empresas, Contacto, Privacidad`

### Redes Sociales
- **Facebook**: URL de tu página de Facebook
- **Instagram**: URL de tu perfil de Instagram
- **LinkedIn**: URL de tu perfil de LinkedIn
- **Twitter**: URL de tu cuenta de Twitter
- Se muestran como iconos en el footer

### Texto Copyright
- Texto legal que aparece al final
- Ej: `© 2026 Tucu Group. Todos los derechos reservados.`

---

## 🏢 7. Gestión de Empresas

Administra las empresas que forman parte del holding.

**Formato JSON requerido:**

```json
[
  {
    "id": 1,
    "name": "Tucu Roller",
    "description": "Líder en soluciones de rodillos industriales",
    "website": "https://tucuroller.com.ar",
    "icon": "roller",
    "color": "gradient-primary",
    "status": "active"
  },
  {
    "id": 2,
    "name": "Sector B",
    "description": "Soluciones de tecnología e innovación",
    "website": "https://ejemplo.com",
    "icon": "tech",
    "color": "blue",
    "status": "coming_soon"
  }
]
```

**Campos:**
- **id**: Identificador único (número)
- **name**: Nombre de la empresa
- **description**: Descripción breve
- **website**: URL de la empresa
- **icon**: Tipo de icono (roller, tech, sustainability, etc.)
- **color**: Color del card (gradient-primary, blue, green, etc.)
- **status**: Estado (active o coming_soon) - opcional

**Colores disponibles:**
- `gradient-primary` - Naranja/Rojo (principal)
- `blue` - Azul
- `green` - Verde
- `purple` - Púrpura

---

## 🏭 8. Gestión de Sectores

Administra los sectores de operación del holding.

**Formato JSON requerido:**

```json
[
  {
    "id": 1,
    "title": "Sector Industrial",
    "subtitle": "Componentes de precisión y soluciones manufactureras",
    "icon": "factory",
    "color": "orange",
    "features": [
      "Rodillos y rodamientos de precisión",
      "Componentes para maquinaria pesada",
      "Soluciones de ingeniería personalizada"
    ]
  },
  {
    "id": 2,
    "title": "Transformación Digital",
    "subtitle": "Tecnología e innovación para el futuro",
    "icon": "code",
    "color": "blue",
    "features": [
      "Consultoría tecnológica empresarial",
      "Automatización de procesos",
      "Desarrollo de soluciones IT customizadas"
    ]
  }
]
```

**Campos:**
- **id**: Identificador único (número)
- **title**: Título del sector
- **subtitle**: Subtítulo o descripción corta
- **icon**: Tipo de icono (factory, code, leaf, globe, etc.)
- **color**: Color del card (orange, blue, green, indigo, etc.)
- **features**: Array con características/beneficios del sector

**Iconos disponibles:**
- `factory` - Industria
- `code` - Programación/Tech
- `leaf` - Sostenibilidad
- `globe` - Global/Internacional

---

## 🎯 Acceso al Panel

### URL:
```
http://127.0.0.1:8000/configuration
```

### Requisitos:
- Debes estar autenticado
- Puedes acceder desde el Dashboard

### Navegación:
1. Inicia sesión en `/login`
2. Ve al Dashboard
3. Haz clic en "Ir a Configuración"
4. O accede directamente a `/configuration`

---

## 💾 Guardado de Datos

**Importante:**
- Todos los datos se guardan en la tabla `site_settings`
- Las imágenes se almacenan en `storage/app/public/`
- Los datos se recuperan automáticamente al cargar el sitio
- No necesitas reiniciar la aplicación para ver los cambios

---

## 🔒 Seguridad

### Contraseña SMTP
- No se muestra en el formulario
- Si dejas el campo vacío, la contraseña anterior se mantiene
- Se almacena de forma segura en la BD

### Validación
- Todos los campos se validan en servidor
- Los emails deben ser válidos
- Las URLs deben ser válidas
- El teléfono de WhatsApp se valida

---

## 📱 Botón Flotante WhatsApp

Una vez configurado, el botón aparecerá automáticamente en la página institucional.

**Características:**
- ✅ Posicionado en esquina inferior derecha
- ✅ Icono animado de WhatsApp
- ✅ Tooltip al pasar el mouse
- ✅ Se abre en WhatsApp Web al hacer clic
- ✅ Mensaje predeterminado configurable
- ✅ Se puede deshabilitar desde panel

**Compatibilidad:**
- Funciona en desktop y mobile
- Se abre en la app de WhatsApp si está instalada en mobile
- Usa links de WhatsApp Web en desktop

---

## 📞 Ejemplo de Configuración Completa

### Empresa:
```
Nombre: Tucu Group
Descripción: Holding empresarial innovador...
Teléfono: +54 9 11 12345678
Email: info@tucugroup.com
Dirección: Calle Principal 123, Buenos Aires
País: Argentina
Sitio: www.tucugroup.com
```

### WhatsApp:
```
Número: +54911234567
Mensaje: Hola Tucu Group, quisiera información sobre sus servicios
Habilitar: ✓
```

### Footer:
```
Acerca: Tucu Group es un holding con más de 25 años de experiencia...
Enlaces: Inicio, Empresas, Sectores, Contacto, Privacidad
Facebook: https://facebook.com/tucugroup
Instagram: https://instagram.com/tucugroup
LinkedIn: https://linkedin.com/company/tucugroup
Twitter: https://twitter.com/tucugroup
```

---

## ❓ Preguntas Frecuentes

### P: ¿Cómo cambio el logo del sitio?
R: Ve a "Logo e Imágenes → Logo del Sitio" y sube una nueva imagen.

### P: ¿Qué pasa si elimino una imagen?
R: La imagen se borra del servidor y no se mostrará en el sitio.

### P: ¿Puedo usar diferentes números de WhatsApp por página?
R: Actualmente hay un número global. Puedes configurarlo según tus necesidades.

### P: ¿Cómo reseteo a la configuración por defecto?
R: Contacta al administrador. Los datos se pueden restaurar desde la BD.

### P: ¿Dónde se guardan las imágenes?
R: En `storage/app/public/images/` y `storage/app/public/logos/`

### P: ¿Puedo cambiar empresas y sectores fácilmente?
R: Sí, desde el panel usando JSON. Copia, modifica y guarda.

---

## 🚀 Próximas Mejoras

- [ ] Editor visual para JSON de empresas/sectores
- [ ] Preview en tiempo real
- [ ] Historial de cambios
- [ ] Restauración de versiones anteriores
- [ ] Múltiples números de WhatsApp por página

---

## 📞 Soporte

Si encuentras problemas o tienes dudas, contacta al equipo de desarrollo.

**Versión:** 1.0
**Última actualización:** Marzo 2026
