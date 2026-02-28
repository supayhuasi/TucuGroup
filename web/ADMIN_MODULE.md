# 📊 Módulo de Administración - TucuGroup

## Descripción

Se ha creado un completo módulo de administración para el panel principal de TucuGroup. El módulo permite gestionar toda la aplicación desde una interfaz intuitiva y protegida por autenticación.

## Características

✅ **Panel de Control (Dashboard)**
- Estadísticas en tiempo real
- Total de usuarios registrados
- Cantidad de administradores
- Cantidad de usuarios regulares
- Últimos usuarios registrados

✅ **Gestión de Usuarios**
- Ver lista completa de usuarios
- Editar información de usuarios
- Cambiar rol de usuario (Admin/Usuario)
- Eliminar usuarios
- Paginación de resultados

✅ **Configuración del Sistema**
- Información general de la aplicación
- Detalles del sistema (PHP, Laravel, BD)
- Información de seguridad

✅ **Control de Acceso**
- Autenticación requerida
- Middleware de administrador
- Solo usuarios con rol "admin" pueden acceder
- Protección contra eliminación del último admin

## Instalación y Configuración

### 1. Ejecutar Migraciones

Primero, ejecuta la migración que agrega el campo `role` a la tabla `users`:

```bash
php artisan migrate
```

### 2. Ejecutar Seeders (Opcional)

Para crear datos de prueba con un usuario administrador:

```bash
php artisan db:seed
```

Esto creará dos usuarios:
- **Usuario Regular**: `test@example.com` / `password`
- **Usuario Admin**: `admin@example.com` / `password`

### 3. Acceder al Panel

Una vez logueado con una cuenta de administrador, accede a:

```
http://tu-aplicacion.local/admin/dashboard
```

## Estructura de Archivos

```
app/
├── Http/
│   ├── Controllers/
│   │   └── AdminController.php          # Controlador principal
│   └── Middleware/
│       └── IsAdmin.php                  # Middleware de protección
└── Models/
    └── User.php                         # Modelo actualizado con rol

database/
├── migrations/
│   └── 2026_02_28_000000_add_role_to_users_table.php
└── seeders/
    └── DatabaseSeeder.php               # Seeder actualizado

resources/views/admin/
├── layout.blade.php                     # Layout principal
├── dashboard.blade.php                  # Dashboard
├── users.blade.php                      # Gestión de usuarios
├── edit-user.blade.php                  # Edición de usuario
└── settings.blade.php                   # Configuración

routes/
└── web.php                              # Rutas actualizadas
```

## Rutas Disponibles

### Públicas (sin autenticación)
- `GET /` → Página institucional
- `GET /welcome` → Página de bienvenida
- `GET /login` → Login
- `POST /login` → Procesar login
- `GET /register` → Registro
- `POST /register` → Procesar registro

### Protegidas (requieren autenticación)
- `GET /dashboard` → Dashboard de usuario
- `GET /profile` → Editar perfil
- `PATCH /profile` → Actualizar perfil
- `DELETE /profile` → Eliminar perfil

### Protegidas (requieren ser Admin)
- `GET /admin/dashboard` → Dashboard de administración
- `GET /admin/users` → Lista de usuarios
- `GET /admin/users/{id}/edit` → Editar usuario
- `PATCH /admin/users/{id}` → Actualizar usuario
- `DELETE /admin/users/{id}` → Eliminar usuario
- `POST /admin/users/{id}/toggle-admin` → Cambiar rol
- `GET /admin/settings` → Configuración
- `POST /admin/settings` → Guardar configuración

## Uso

### Login como Administrador

1. Ve a http://tu-aplicacion.local/login
2. Ingresa:
   - Email: `admin@example.com`
   - Contraseña: `password`
3. Una vez logueado, haz clic en "🔐 Administración" en la página de bienvenido
4. ¡Acceso completo al panel!

### Cambiar rol de un usuario

1. Ve a "👥 Usuarios" en el menú lateral
2. Busca al usuario que deseas cambiar
3. Haz clic en "Hacer Admin" o "Quitar Admin"
4. El cambio se aplica inmediatamente

### Editar un usuario

1. Ve a "👥 Usuarios"
2. Haz clic en "Editar" al lado del usuario
3. Modifica los datos necesarios
4. Haz clic en "Guardar Cambios"

## Características de Seguridad

🔒 **Protección contra acceso no autorizado**
- Middleware `is.admin` valida que el usuario sea administrador
- Cualquier intento de acceso sin permiso retorna error 403

🔒 **Protección de datos**
- Solo administradores pueden gestionar usuarios
- No puedes eliminarte a ti mismo
- No se puede eliminar el último administrador
- No se puede cambiar el rol del último administrador

🔒 **Validación de datos**
- Validación de email único
- Validación de rol (admin/user)
- CSRF protection en todos los formularios

## Personalización

### Cambiar el nombre de la aplicación en el panel

Edita `bootstrap/app.php` y ajusta el nombre mostrado.

### Agregar nuevas opciones de rol

1. Modifica la migración o agrega una nueva
2. Actualiza el campo `role` en validaciones
3. Crea nuevos middlewares según sea necesario

### Personalizar el estilo

Las vistas usan Tailwind CSS. Puedes modificar las clases en:
- `resources/views/admin/layout.blade.php`
- `resources/views/admin/dashboard.blade.php`
- Etc.

## Troubleshooting

### Error: "Acceso denegado" (403)

**Causa:** El usuario no tiene rol de administrador

**Solución:** 
1. Accede con una cuenta admin
2. Ve a "👥 Usuarios"
3. Haz clic en "Hacer Admin" para el usuario deseado

### La migración falla

**Causa:** Posible problema con la BD

**Solución:**
```bash
php artisan migrate:rollback
php artisan migrate
```

### No aparece el botón "🔐 Administración"

**Causa:** No has iniciado sesión como admin

**Solución:**
1. Asegúrate de estar logueado como admin
2. Verifica que tu usuario tenga `role = 'admin'` en la BD

## Notas de Desarrollo

- El panel está completamente integrado con el sistema de autenticación de Laravel
- Usa el sistema de autorización de Laravel (gates, policies)
- Totalmente responsive y compatible con dark mode
- Compatible con navegadores modernos

## Próximas Mejoras (Opcionales)

- [ ] Logs de actividad del administrador
- [ ] Exportar lista de usuarios a CSV
- [ ] Cambiar contraseña desde el panel de admin
- [ ] Buscar y filtrar usuarios
- [ ] Estadísticas de uso
- [ ] Gestión de roles más avanzada
- [ ] Notificaciones del sistema

---

**Última actualización:** 28 de Febrero de 2026
