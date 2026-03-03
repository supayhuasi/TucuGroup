# 🚀 INICIO RÁPIDO - Panel de Configuración

## ⚡ 5 Minutos para Configurar Todo

### 1. Accede al Panel (30 segundos)

```
1. Abre http://127.0.0.1:8000/login
2. Inicia sesión
3. Ve al Dashboard
4. Haz clic en "Ir a Configuración"
   o accede directo: http://127.0.0.1:8000/configuration
```

---

## 📋 Configuración Básica (2 minutos)

### Paso 1: Datos de Empresa
1. Abre acordeón "📋 Información de la Empresa"
2. Llena:
   ```
   Nombre: Tucu Group
   Descripción: Holding empresarial innovador...
   Teléfono: +54 9 11 12345678
   Email: info@tucugroup.com
   Dirección: Calle Principal 123
   País: Argentina
   Sitio: www.tucugroup.com
   ```
3. Haz clic en "Guardar Cambios" ✓

### Paso 2: Google Analytics
1. Abre acordeón "📊 Google Analytics"
2. Ingresa ID: `G-XXXXXXXXXX`
3. Marca "Habilitar"
4. Haz clic en "Guardar Cambios" ✓

### Paso 3: WhatsApp
1. Abre acordeón "💬 Configuración WhatsApp"
2. Ingresa:
   ```
   Número: +54911234567
   Mensaje: Hola, quisiera más información
   ✓ Habilitar WhatsApp en el sitio
   ```
3. Haz clic en "Guardar Cambios" ✓
4. **Botón aparece inmediatamente en el sitio**

---

## 🖼️ Agregar Logo (1 minuto)

1. Abre acordeón "🖼️ Logo e Imágenes del Sitio"
2. Haz clic en "Seleccionar Logo"
3. Elige una imagen (JPG, PNG, GIF, WebP)
4. Haz clic en "Subir Logo" ✓
5. **Logo aparece en navbar del sitio**

---

## 🔗 Configurar Footer (1 minuto)

1. Abre acordeón "🔗 Configuración Footer"
2. Llena:
   ```
   Acerca de: Descripción de tu empresa...
   Enlaces: Inicio, Empresas, Contacto, Privacidad
   Facebook: https://facebook.com/tucugroup
   Instagram: https://instagram.com/tucugroup
   LinkedIn: https://linkedin.com/company/tucugroup
   Twitter: https://twitter.com/tucugroup
   ```
3. Haz clic en "Guardar Cambios" ✓

---

## 📧 Configurar SMTP (1 minuto)

### Para Gmail:
```
Host: smtp.gmail.com
Puerto: 587
Usuario: tu-email@gmail.com
Contraseña: tu-contraseña
Encriptación: TLS
Dirección De: tu-email@gmail.com
Nombre De: Tucu Group
```

### Para Outlook:
```
Host: smtp.office365.com
Puerto: 587
Usuario: tu-email@outlook.com
Contraseña: tu-contraseña
Encriptación: TLS
```

---

## 🏢 Agregar/Editar Empresas

1. Abre acordeón "🏢 Gestión de Empresas"
2. Modifica el JSON:
   ```json
   [
     {
       "id": 1,
       "name": "Mi Empresa 1",
       "description": "Descripción...",
       "website": "https://ejemplo.com",
       "icon": "roller",
       "color": "gradient-primary"
     }
   ]
   ```
3. Haz clic en "Guardar Empresas" ✓

---

## 🏭 Agregar/Editar Sectores

1. Abre acordeón "🏭 Gestión de Sectores"
2. Modifica el JSON:
   ```json
   [
     {
       "id": 1,
       "title": "Sector Industrial",
       "subtitle": "Descripción del sector",
       "icon": "factory",
       "color": "orange",
       "features": [
         "Característica 1",
         "Característica 2"
       ]
     }
   ]
   ```
3. Haz clic en "Guardar Sectores" ✓

---

## ✨ Resultados Inmediatos

Una vez configurado, verás cambios en:

✅ **Página Institucional** (`/`)
   - Logo en navbar
   - Empresas actualizadas
   - Sectores actualizados
   - Footer con redes sociales
   - Botón WhatsApp flotante

✅ **Google Analytics**
   - Rastreo activo en todas las páginas
   - Datos visibles en GA después de 24h

✅ **Correos**
   - Configuración SMTP funcionando
   - Emails se envían desde tu cuenta

---

## 🎯 Ejemplos Listos para Copiar

### JSON Empresas - Copia y Pega:
```json
[
  {
    "id": 1,
    "name": "Tucu Roller",
    "description": "Líder en soluciones de rodillos industriales de alta precisión.",
    "website": "https://tucuroller.com.ar",
    "icon": "roller",
    "color": "gradient-primary"
  },
  {
    "id": 2,
    "name": "Sector Tecnología",
    "description": "Soluciones tecnológicas innovadoras para tu negocio.",
    "website": "https://ejemplo.com",
    "icon": "tech",
    "color": "blue"
  }
]
```

### JSON Sectores - Copia y Pega:
```json
[
  {
    "id": 1,
    "title": "Manufactura",
    "subtitle": "Soluciones industriales de precisión",
    "icon": "factory",
    "color": "orange",
    "features": [
      "Rodillos de precisión",
      "Componentes especializados",
      "Ingeniería personalizada"
    ]
  },
  {
    "id": 2,
    "title": "Tecnología",
    "subtitle": "Transformación digital y innovación",
    "icon": "code",
    "color": "blue",
    "features": [
      "Consultoría IT",
      "Automatización",
      "Soluciones custom"
    ]
  }
]
```

---

## ⚠️ Cosas Importantes

### Logo e Imágenes
```
✅ Hacer: Subir JPG, PNG, GIF, WebP optimizadas
❌ No hacer: Imágenes muy grandes (>10MB)

Tamaños recomendados:
- Logo: 200x50px (5MB max)
- Hero: 1920x400px (10MB max)
- Banner: 1200x300px (10MB max)
- Footer: 400x200px (10MB max)
```

### WhatsApp
```
✅ Número: +54911234567 (con código de país)
❌ Número: 1123456789 (sin código)

✅ Habilitado: checkbox marcado
❌ Habilitado: checkbox sin marcar = no aparece
```

### JSON
```
✅ JSON válido con comillas dobles
❌ JSON inválido con comillas simples

Herramientas: https://jsonlint.com
```

---

## 🆘 Si Algo No Funciona

### El botón WhatsApp no aparece
```bash
# Verifica que esté habilitado
# Verifica que el número no esté vacío
php artisan cache:clear
```

### Las imágenes no se ven
```bash
# Ejecuta:
php artisan storage:link

# Verifica que exista:
public/storage → apunta a storage/app/public/
```

### JSON inválido
```
1. Ve a https://jsonlint.com
2. Pega tu JSON
3. Copiar JSON válido del validador
4. Pegar en el panel
```

---

## 📞 Contacto Rápido

Si necesitas ayuda:

1. Revisa: `CONFIGURACION_AVANZADA.md`
2. Revisa: `IMPLEMENTACION_CONFIGURACION.md`
3. Revisa: `RESUMEN_VISUAL_CONFIGURACION.md`
4. Contacta al equipo de desarrollo

---

## 🎉 ¡Listo!

Ya tienes tu sistema de configuración funcionando.

**Próximos pasos:**
- [ ] Configurar datos de empresa
- [ ] Agregar logo
- [ ] Habilitar WhatsApp
- [ ] Configurar Google Analytics
- [ ] Editar footer
- [ ] Actualizar empresas
- [ ] Actualizar sectores

---

**¡Disfruta personalizando tu sitio! 🚀**
