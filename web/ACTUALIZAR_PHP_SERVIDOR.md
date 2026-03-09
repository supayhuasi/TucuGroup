# 🔧 Guía: Actualizar PHP en Servidor Remoto

## ⚠️ Problema Actual

**Servidor:** 149.50.133.145:5123  
**PHP Actual:** 8.1.2  
**PHP Requerido:** 8.2+ (mínimo)  
**PHP Recomendado:** 8.3 o 8.4

## 🚀 Solución: Actualizar PHP a 8.3

### Paso 1: Conectarse al Servidor

```bash
ssh -p5123 root@149.50.133.145
```

### Paso 2: Verificar Sistema Operativo

```bash
cat /etc/os-release
```

---

## 📦 Para Ubuntu/Debian

### 1. Agregar repositorio de PHP (Ondřej Surý)

```bash
# Actualizar paquetes
apt update

# Instalar dependencias
apt install -y software-properties-common

# Agregar repositorio PPA de PHP
add-apt-repository ppa:ondrej/php -y

# Actualizar lista de paquetes
apt update
```

### 2. Instalar PHP 8.3 y extensiones necesarias

```bash
# Instalar PHP 8.3 y extensiones
apt install -y \
    php8.3 \
    php8.3-cli \
    php8.3-fpm \
    php8.3-mbstring \
    php8.3-xml \
    php8.3-bcmath \
    php8.3-curl \
    php8.3-gd \
    php8.3-intl \
    php8.3-zip \
    php8.3-mysql \
    php8.3-sqlite3 \
    php8.3-pgsql \
    php8.3-redis \
    php8.3-opcache
```

### 3. Configurar PHP 8.3 como versión por defecto

```bash
# Para CLI
update-alternatives --set php /usr/bin/php8.3

# Para PHP-FPM (si usas Nginx)
systemctl stop php8.1-fpm
systemctl disable php8.1-fpm
systemctl enable php8.3-fpm
systemctl start php8.3-fpm
```

### 4. Verificar versión instalada

```bash
php -v
```

Deberías ver: `PHP 8.3.x`

---

## 📦 Para CentOS/AlmaLinux/Rocky Linux

### 1. Agregar repositorio Remi

```bash
# Instalar EPEL
dnf install -y epel-release

# Instalar repositorio Remi
dnf install -y https://rpms.remirepo.net/enterprise/remi-release-9.rpm

# Habilitar módulo PHP 8.3
dnf module reset php
dnf module enable php:remi-8.3 -y
```

### 2. Instalar PHP 8.3

```bash
dnf install -y \
    php \
    php-cli \
    php-fpm \
    php-mbstring \
    php-xml \
    php-bcmath \
    php-json \
    php-curl \
    php-gd \
    php-intl \
    php-zip \
    php-mysqlnd \
    php-pdo \
    php-opcache
```

### 3. Reiniciar servicios

```bash
systemctl restart php-fpm
systemctl restart nginx  # o apache
```

---

## 🔄 Actualizar Composer en el Servidor

Después de actualizar PHP:

```bash
# Verificar versión de Composer
composer --version

# Si es necesario, actualizar Composer
composer self-update
```

---

## 🚀 Reinstalar Dependencias del Proyecto

Una vez que PHP 8.3 esté instalado:

```bash
# Ir al directorio del proyecto
cd /ruta/del/proyecto

# Limpiar caché de Composer
rm -rf vendor/
composer clear-cache

# Instalar dependencias
composer install --no-dev --optimize-autoloader

# O si estás en desarrollo
composer install
```

---

## 🔍 Verificaciones Finales

### 1. Verificar PHP

```bash
php -v
# Debe mostrar: PHP 8.3.x

php -m
# Lista todas las extensiones instaladas
```

### 2. Verificar extensiones requeridas

```bash
php -m | grep -E "mbstring|xml|bcmath|curl|gd|intl|zip|pdo|opcache"
```

Todas deben aparecer en la lista.

### 3. Verificar PHP-FPM (si usas Nginx)

```bash
systemctl status php8.3-fpm
```

Debe mostrar: `active (running)`

### 4. Verificar configuración de Nginx/Apache

Si usas **Nginx**, actualiza el socket de PHP-FPM:

```nginx
# /etc/nginx/sites-available/tu-sitio

location ~ \.php$ {
    fastcgi_pass unix:/run/php/php8.3-fpm.sock;
    # ... resto de la configuración
}
```

Luego reinicia Nginx:

```bash
nginx -t  # Verificar sintaxis
systemctl restart nginx
```

---

## 🐛 Troubleshooting

### Error: "add-apt-repository: command not found"

```bash
apt install -y software-properties-common
```

### Error: "Package php8.3 is not available"

```bash
# Asegurarse de que el repositorio está agregado
apt-cache policy | grep ondrej
```

### PHP-FPM no inicia

```bash
# Ver logs
journalctl -u php8.3-fpm -n 50

# O
tail -f /var/log/php8.3-fpm.log
```

### Composer sigue usando PHP 8.1

```bash
# Forzar que Composer use PHP 8.3
which php  # Debe mostrar /usr/bin/php -> php8.3

# Si no, actualizar symlink
update-alternatives --config php
```

---

## 📋 Checklist Post-Actualización

- [ ] PHP 8.3+ instalado y activo
- [ ] Todas las extensiones requeridas instaladas
- [ ] PHP-FPM reiniciado (si aplica)
- [ ] Nginx/Apache configurado con PHP 8.3
- [ ] Composer actualizado
- [ ] `composer install` ejecutado sin errores
- [ ] Proyecto funciona correctamente

---

## ⚡ Comando Rápido (Ubuntu/Debian)

```bash
# Todo en uno (Ubuntu/Debian)
apt update && \
apt install -y software-properties-common && \
add-apt-repository ppa:ondrej/php -y && \
apt update && \
apt install -y php8.3 php8.3-cli php8.3-fpm php8.3-mbstring php8.3-xml php8.3-bcmath php8.3-curl php8.3-gd php8.3-intl php8.3-zip php8.3-mysql php8.3-sqlite3 php8.3-opcache && \
update-alternatives --set php /usr/bin/php8.3 && \
systemctl enable php8.3-fpm && \
systemctl start php8.3-fpm && \
php -v
```

---

## 📞 Soporte

Si encuentras problemas:
1. Verifica logs del servidor: `/var/log/syslog`
2. Verifica logs de PHP-FPM: `/var/log/php8.3-fpm.log`
3. Verifica permisos de archivos del proyecto

---

**Siguiente paso después de actualizar PHP:**
```bash
cd /ruta/proyecto
composer install
php artisan migrate
php artisan optimize
```

¡Listo! 🚀
