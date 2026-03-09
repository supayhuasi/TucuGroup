#!/bin/bash

# 🔧 Solución: Symfony 8.0 requiere PHP 8.4, pero tenemos 8.3.30
# Opciones: Actualizar a PHP 8.4 O forzar Symfony 7.x

echo "=================================================="
echo "🔍 Verificando versión actual de PHP..."
echo "=================================================="
php -v

echo ""
echo "=================================================="
echo "📦 OPCIÓN A: Actualizar a PHP 8.4 (RECOMENDADO)"
echo "=================================================="
echo "Ejecuta estos comandos en el servidor:"
echo ""
echo "  apt update"
echo "  apt install -y php8.4 php8.4-cli php8.4-fpm php8.4-mbstring php8.4-xml php8.4-bcmath php8.4-curl php8.4-gd php8.4-intl php8.4-zip php8.4-mysql php8.4-sqlite3 php8.4-opcache"
echo "  update-alternatives --set php /usr/bin/php8.4"
echo "  systemctl stop php8.3-fpm"
echo "  systemctl start php8.4-fpm"
echo "  php -v"
echo ""

echo "=================================================="
echo "📦 OPCIÓN B: Forzar Symfony 7.x (más rápido)"
echo "=================================================="
echo "Ejecuta esto en el directorio del proyecto:"
echo ""
echo "  rm -f composer.lock"
echo "  composer install"
echo ""
echo "Esto regenerará composer.lock con versiones compatibles para PHP 8.3"
echo ""

read -p "¿Deseas ejecutar OPCIÓN B ahora? (s/n): " choice
if [[ "$choice" == "s" || "$choice" == "S" ]]; then
    echo ""
    echo "🔄 Eliminando composer.lock y reinstalando dependencias..."
    rm -f composer.lock
    composer install
    
    if [ $? -eq 0 ]; then
        echo ""
        echo "✅ ¡Dependencias instaladas correctamente!"
        echo ""
        echo "🔍 Verificando versiones de Symfony instaladas:"
        composer show symfony/* | grep "versions"
    else
        echo ""
        echo "❌ Error al instalar dependencias"
        exit 1
    fi
fi
