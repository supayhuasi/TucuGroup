# 🎯 GUÍA PASO A PASO - MÓDULO DE ADMINISTRACIÓN

## Bienvenido al Panel de Administración TucuGroup

Este documento te guía paso a paso para configurar y usar el nuevo módulo de administración.

---

## PASO 1: PREPARAR LA BASE DE DATOS

### ¿Qué hace?
Agrega el campo `role` a la tabla de usuarios para poder asignar roles.

### Ejecuta:
```bash
php artisan migrate
```

### Resultado esperado:
```
Migrating: 2026_02_28_000000_add_role_to_users_table
Migrated:  2026_02_28_000000_add_role_to_users_table (xxx ms)
```

---

## PASO 2: CREAR DATOS DE PRUEBA (OPCIONAL)

### ¿Qué hace?
Crea usuarios de prueba incluyendo un administrador.

### Ejecuta:
```bash
php artisan db:seed
```

### Usuarios creados:
| Email | Contraseña | Rol |
|-------|-----------|-----|
| test@example.com | password | Usuario regular |
| admin@example.com | password | **Administrador** |

### Nota:
Si ya tienes usuarios en la base de datos, puedes saltar este paso.

---

## PASO 3: INICIA EL SERVIDOR

### Ejecuta:
```bash
php artisan serve
```

### Resultado esperado:
```
Starting Laravel development server: http://127.0.0.1:8000
```

---

## PASO 4: ACCEDE AL PANEL

### Abre tu navegador y ve a:
```
http://localhost:8000/login
```

### Inicia sesión con:
- **Email**: admin@example.com
- **Contraseña**: password

### Verás:
Una página con opciones de Dashboard y **🔐 Administración** (solo visible para admins)

---

## PASO 5: ENTRA AL PANEL DE ADMINISTRACIÓN

### Haz clic en:
```
🔐 Administración
```

### ¡Bienvenido al panel!
Ahora ves el dashboard con estadísticas.

---

## CONOCER EL PANEL

### 📊 Dashboard (Inicio)
Aquí ves:
- Total de usuarios registrados
- Total de administradores
- Total de usuarios regulares
- Últimos usuarios registrados

### 👥 Usuarios
Aquí puedes:
- Ver la lista completa de usuarios
- Editar información de un usuario
- Cambiar el rol (Admin ↔ Usuario)
- Eliminar usuarios

### ⚙️ Configuración
Aquí puedes:
- Ver configuración de la aplicación
- Ver información del sistema
- Ver versión de PHP y Laravel

---

## TAREAS COMUNES

### Cómo cambiar a un usuario a administrador

1. Haz clic en "👥 Usuarios" en el menú lateral
2. Busca el usuario que deseas cambiar
3. Haz clic en el botón **"Hacer Admin"**
4. ¡Listo! Ahora ese usuario puede acceder al panel

### Cómo quitar rol de administrador a un usuario

1. Ve a "👥 Usuarios"
2. Busca el usuario
3. Haz clic en **"Quitar Admin"**
4. El usuario vuelve a ser usuario regular

### Cómo editar información de un usuario

1. Ve a "👥 Usuarios"
2. Haz clic en **"Editar"** al lado del usuario
3. Modifica:
   - Nombre
   - Email
   - Rol
4. Haz clic en **"Guardar Cambios"**

### Cómo eliminar un usuario

1. Ve a "👥 Usuarios"
2. Haz clic en **"Eliminar"** (botón rojo)
3. Confirma cuando se pida

**Nota:** No puedes eliminar:
- El último administrador
- Tu propia cuenta (si eres el administrador)

---

## CREAR UN NUEVO USUARIO ADMINISTRADOR DESDE LA BASE DE DATOS

Si necesitas crear un admin directamente en la BD:

### Opción 1: Usando Tinker (Interactivo)
```bash
php artisan tinker
```

Luego ejecuta:
```php
$user = new App\Models\User();
$user->name = 'Nombre del Admin';
$user->email = 'admin@ejemplo.com';
$user->password = bcrypt('contraseña_segura');
$user->role = 'admin';
$user->email_verified_at = now();
$user->save();
exit;
```

### Opción 2: Crear Migration personalizada
```bash
php artisan make:migration create_admin_user --table=users
```

---

## CAMBIAR TU PROPIA CONTRASEÑA

1. Haz clic en "Mi Perfil" (esquina superior derecha)
2. Ve a la sección de contraseña
3. Ingresa tu contraseña actual
4. Ingresa la nueva contraseña
5. Haz clic en "Guardar"

---

## ENTENDER LOS ROLES

### Rol: "user" (Usuario Regular)
- ✗ No puede acceder al panel de administración
- ✓ Puede ver su dashboard personal
- ✓ Puede editar su perfil

### Rol: "admin" (Administrador)
- ✓ Acceso completo al panel de administración
- ✓ Puede gestionar todos los usuarios
- ✓ Puede ver estadísticas del sistema
- ✓ Puede cambiar roles de otros usuarios

---

## SEGURIDAD

### Contraseña fuerte
Siempre usa contraseñas fuertes para cuentas de administrador:
- Al menos 12 caracteres
- Mezcla de mayúsculas, minúsculas, números y símbolos
- Evita información personal

### Cambiar contraseña por defecto
⚠️ **MUY IMPORTANTE**: Cambia la contraseña "password" después del primer acceso.

1. Ve a "Mi Perfil"
2. Busca la sección de contraseña
3. Cambia por una contraseña fuerte
4. Guarda los cambios

### No compartas acceso de admin
Solo da acceso administrativo a personas de confianza.

---

## SOLUCIONAR PROBLEMAS

### Problema: No veo el botón "🔐 Administración"
**Solución:** No has iniciado sesión como administrador.
1. Ve a /login
2. Asegúrate de usar una cuenta admin
3. Si la cuenta no es admin, pide a un admin que te cambie el rol

### Problema: "Acceso denegado" (Error 403)
**Solución:** La cuenta no tiene rol de administrador.
1. Pide a otro admin que te cambie el rol
2. O cambia el rol en la BD directamente:
   ```sql
   UPDATE users SET role = 'admin' WHERE email = 'tu@email.com';
   ```

### Problema: No puedo eliminar al último admin
**Solución:** Es por seguridad. Crea otro admin primero:
1. Crea una nueva cuenta
2. Ve a "👥 Usuarios"
3. Cambia el nuevo usuario a admin
4. Luego sí puedes cambiar el rol del otro admin

### Problema: Olvidé la contraseña de admin
**Solución:** Usa la opción "¿Olvidaste tu contraseña?" en el login.
O accede directamente a la BD y restablécela:
```php
php artisan tinker
$user = App\Models\User::where('email', 'admin@example.com')->first();
$user->password = bcrypt('nueva_contraseña');
$user->save();
exit;
```

---

## PRÓXIMAS MEJORAS (Futuro)

Estas características pueden agregarse después:
- [ ] Logs de actividad (quién hizo qué y cuándo)
- [ ] Exportar usuarios a CSV
- [ ] Búsqueda y filtros avanzados
- [ ] Estadísticas más detalladas
- [ ] Gestión de permisos granular

---

## RESUMEN DE FUNCIONES

| Función | Ubicación | Descripción |
|---------|-----------|------------|
| Ver Dashboard | /admin/dashboard | Ver estadísticas |
| Listar usuarios | /admin/users | Ver todos los usuarios |
| Editar usuario | /admin/users/{id}/edit | Cambiar datos del usuario |
| Cambiar rol | /admin/users | Botón "Hacer/Quitar Admin" |
| Eliminar usuario | /admin/users | Botón "Eliminar" |
| Configuración | /admin/settings | Ver info del sistema |

---

## DOCUMENTACIÓN ADICIONAL

Para información más técnica:
- Ver `ADMIN_MODULE.md` - Documentación técnica completa
- Ver `ADMIN_QUICK_START.txt` - Guía rápida
- Ver código comentado en `app/Http/Controllers/AdminController.php`

---

## CONTACTO Y SOPORTE

Si tienes problemas o preguntas:
1. Consulta la documentación incluida
2. Revisa el código fuente comentado
3. Verifica los archivos de log en `storage/logs/`

---

## 🎉 ¡Listo para Comenzar!

Ahora que conoces el panel de administración, ¡estás listo para gestionar tu aplicación!

**Recordatorio importante:**
- Ejecuta `php artisan migrate` antes de todo
- Cambia las contraseñas por defecto
- Mantén seguras las cuentas de admin
- Haz backups regularmente

**¡Bienvenido al Panel de Administración TucuGroup!** 🚀

---

Documento versión 1.0 | 28 de Febrero de 2026
