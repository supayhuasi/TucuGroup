# 🎯 TucuGroup - Panel de Administración

## Descripción del Proyecto

TucuGroup es una aplicación web desarrollada con **Laravel 11** que incluye un módulo completo de administración para gestionar usuarios, roles y configuración del sistema.

---

## ✨ Características Principales

### 🔐 Módulo de Administración
- Dashboard con estadísticas en tiempo real
- Gestión completa de usuarios (CRUD)
- Sistema de roles (Admin/Usuario)
- Cambio dinámico de roles
- Panel de configuración del sistema

### 🎨 Interfaz Moderna
- Diseño responsive (móvil, tablet, desktop)
- Soporte para dark mode
- Tailwind CSS
- Componentes profesionales

### 🔒 Seguridad
- Autenticación de usuarios
- Middleware de autorización
- CSRF protection
- Validación de datos
- Protección del último administrador

### 👥 Gestión de Usuarios
- Registro de usuarios
- Login seguro
- Verificación de email
- Recuperación de contraseña
- Edición de perfil

---

## 🚀 Requisitos Previos

- PHP 8.2+
- Composer
- Node.js y npm
- Base de datos (MySQL, PostgreSQL, SQLite)
- Git

---

## 📥 Instalación

### 1. Clonar el Repositorio

```bash
git clone https://github.com/supayhuasi/TucuGroup.git
cd TucuGroup/web
```

### 2. Instalar Dependencias

```bash
# Instalar dependencias de PHP
composer install

# Instalar dependencias de Node.js
npm install
```

### 3. Configurar Ambiente

```bash
# Copiar archivo de configuración
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### 4. Configurar Base de Datos

Edita el archivo `.env` con tus credenciales:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tucugroup
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Ejecutar Migraciones

```bash
php artisan migrate
```

### 6. Crear Datos de Prueba (Opcional)

```bash
php artisan db:seed
```

Esto crea dos usuarios:
- **admin@example.com** (Admin) - Contraseña: `password`
- **test@example.com** (Usuario) - Contraseña: `password`

### 7. Compilar Assets

```bash
npm run build
```

### 8. Iniciar Servidor

```bash
php artisan serve
```

Accede a: `http://localhost:8000`

---

## 📱 Acceder al Panel de Administración

1. Ve a `http://localhost:8000/login`
2. Ingresa las credenciales de administrador:
   - Email: `admin@example.com`
   - Contraseña: `password`
3. Haz clic en **"🔐 Administración"**
4. ¡Listo! Ahora estás en el panel

---

## 📂 Estructura del Proyecto

```
web/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php        # Controlador de admin
│   │   │   └── Auth/                      # Controladores de auth
│   │   ├── Middleware/
│   │   │   └── IsAdmin.php                # Middleware de protección
│   │   └── Requests/
│   ├── Models/
│   │   └── User.php                       # Modelo de usuario
│   └── Providers/
│
├── database/
│   ├── migrations/
│   │   └── 2026_02_28_000000_add_role_to_users_table.php
│   ├── seeders/
│   │   └── DatabaseSeeder.php
│   └── factories/
│
├── resources/
│   ├── views/
│   │   ├── admin/                         # Vistas del panel
│   │   ├── auth/                          # Vistas de autenticación
│   │   ├── layouts/                       # Layouts
│   │   └── components/                    # Componentes
│   ├── css/
│   └── js/
│
├── routes/
│   ├── web.php                            # Rutas web
│   ├── auth.php                           # Rutas de autenticación
│   └── console.php                        # Rutas de consola
│
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   └── ...
│
├── storage/
├── tests/
├── public/
│
├── composer.json
├── package.json
├── .env.example
└── artisan
```

---

## 🔧 Comandos Útiles

```bash
# Ejecutar migraciones
php artisan migrate

# Revertir migraciones
php artisan migrate:rollback

# Crear seeder
php artisan make:seeder NombreSeeder

# Ejecutar seeders
php artisan db:seed

# Compilar assets
npm run build

# Watch assets
npm run dev

# Tinker (REPL interactivo)
php artisan tinker

# Ejecutar tests
php artisan test
```

---

## 👥 Gestión de Usuarios desde CLI

### Crear usuario administrador

```bash
php artisan tinker
```

```php
$user = new App\Models\User();
$user->name = 'Nombre del Admin';
$user->email = 'admin@ejemplo.com';
$user->password = bcrypt('contraseña');
$user->role = 'admin';
$user->email_verified_at = now();
$user->save();
exit;
```

### Ver todos los usuarios

```php
App\Models\User::all();
```

### Cambiar rol de usuario

```php
$user = App\Models\User::find(1);
$user->role = 'admin';
$user->save();
```

---

## 🔐 Seguridad

### Cambiar contraseña por defecto

⚠️ **MUY IMPORTANTE**: Después de la instalación, cambia las contraseñas por defecto.

1. Ve a `/login`
2. Inicia sesión con admin@example.com
3. Ve a "Mi Perfil"
4. Cambia la contraseña

### Contraseña fuerte

Usa contraseñas con:
- Mínimo 12 caracteres
- Mayúsculas y minúsculas
- Números y símbolos especiales

### Permisos de archivos

```bash
chmod -R 755 storage bootstrap/cache
chmod -R 644 storage bootstrap/cache/*
```

---

## 📖 Documentación

El proyecto incluye documentación completa:

- [ADMIN_PASO_A_PASO.md](./ADMIN_PASO_A_PASO.md) - Guía paso a paso
- [ADMIN_MODULE.md](./ADMIN_MODULE.md) - Documentación técnica del módulo
- [ADMIN_RESUMEN.md](./ADMIN_RESUMEN.md) - Resumen ejecutivo
- [QUICK_START.md](./QUICK_START.md) - Inicio rápido

---

## 🐛 Solucionar Problemas

### Error: "No tienes permiso para acceder a esta sección"

Asegúrate de que:
1. Estés logueado como administrador
2. Tu usuario tenga `role = 'admin'` en la BD
3. Ejecutaste las migraciones correctamente

### Error: "Base de datos no encontrada"

1. Crea la base de datos
2. Verifica credenciales en `.env`
3. Ejecuta `php artisan migrate`

### Assets no se cargan

```bash
npm run build
php artisan serve
```

---

## 🤝 Contribuir

Las contribuciones son bienvenidas. Por favor:

1. Haz fork del proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

---

## 📝 Convenciones de Commits

```
feat: Nueva funcionalidad
fix: Corrección de bug
docs: Cambios en documentación
style: Cambios de formato (sin afectar código)
refactor: Refactorización de código
perf: Mejora de performance
test: Agregar o actualizar tests
chore: Cambios de herramientas/dependencias
```

---

## 📞 Soporte

Para reportar bugs o hacer preguntas:

1. Abre un Issue en GitHub
2. Describe el problema detalladamente
3. Incluye pasos para reproducir
4. Proporciona información del sistema

---

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Ver archivo [LICENSE](./LICENSE) para más detalles.

---

## 👨‍💻 Autor

**Rodrigo Supay Huasi**
- GitHub: [@supayhuasi](https://github.com/supayhuasi)
- Email: supayhuasi@example.com

---

## 🎯 Roadmap

### v1.0 (Actual)
- ✅ Panel de administración
- ✅ Gestión de usuarios
- ✅ Sistema de roles
- ✅ Autenticación completa

### v1.1 (Próximo)
- [ ] Logs de actividad
- [ ] Exportar usuarios a CSV
- [ ] Búsqueda y filtros avanzados
- [ ] Dashboard mejorado

### v2.0 (Futuro)
- [ ] API REST
- [ ] App móvil
- [ ] Soporte multiidioma
- [ ] Notificaciones por email

---

## ❤️ Agradecimientos

Gracias a:
- Laravel Framework
- Tailwind CSS
- La comunidad de desarrollo

---

**Última actualización:** 28 de Febrero de 2026

**Estado del Proyecto:** ✅ Activo y en desarrollo

**Versión:** 1.0.0

---

## 🔗 Enlaces Útiles

- [Documentación de Laravel](https://laravel.com/docs)
- [Documentación de Tailwind CSS](https://tailwindcss.com/docs)
- [Composer](https://getcomposer.org)
- [Node.js](https://nodejs.org)

---

¿Preguntas? Abre un issue o contacta al autor.

**¡Happy Coding! 🚀**
