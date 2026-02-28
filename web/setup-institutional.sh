#!/bin/bash

# Script de Setup - Página Institucional Tucu Group
# Este script prepara el proyecto para usar la página institucional

echo "=========================================="
echo "Setup Página Institucional - Tucu Group"
echo "=========================================="
echo ""

# Colores para output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Verificar si estamos en el directorio correcto
if [ ! -f "artisan" ]; then
    echo -e "${RED}✗ Error: No se encuentra artisan. Asegúrate de estar en la raíz del proyecto.${NC}"
    exit 1
fi

echo -e "${BLUE}1. Verificando dependencias...${NC}"
if ! command -v php &> /dev/null; then
    echo -e "${RED}✗ PHP no está instalado${NC}"
    exit 1
fi
echo -e "${GREEN}✓ PHP está instalado${NC}"

if ! command -v composer &> /dev/null; then
    echo -e "${RED}✗ Composer no está instalado${NC}"
    exit 1
fi
echo -e "${GREEN}✓ Composer está instalado${NC}"

if ! command -v npm &> /dev/null; then
    echo -e "${RED}✗ Node.js/npm no está instalado${NC}"
    exit 1
fi
echo -e "${GREEN}✓ Node.js/npm está instalado${NC}"

echo ""
echo -e "${BLUE}2. Instalando dependencias de Composer...${NC}"
composer install
echo -e "${GREEN}✓ Dependencias de Composer instaladas${NC}"

echo ""
echo -e "${BLUE}3. Instalando dependencias de npm...${NC}"
npm install
echo -e "${GREEN}✓ Dependencias de npm instaladas${NC}"

echo ""
echo -e "${BLUE}4. Compilando assets...${NC}"
npm run build
echo -e "${GREEN}✓ Assets compilados${NC}"

echo ""
echo -e "${BLUE}5. Configurando archivo .env...${NC}"
if [ ! -f ".env" ]; then
    cp .env.example .env
    echo -e "${GREEN}✓ Archivo .env creado${NC}"
else
    echo -e "${YELLOW}→ Archivo .env ya existe${NC}"
fi

echo ""
echo -e "${BLUE}6. Generando clave de aplicación...${NC}"
php artisan key:generate
echo -e "${GREEN}✓ Clave de aplicación generada${NC}"

echo ""
echo -e "${BLUE}7. Ejecutando migraciones...${NC}"
php artisan migrate --force
echo -e "${GREEN}✓ Migraciones ejecutadas${NC}"

echo ""
echo -e "${GREEN}=========================================="
echo "✓ Setup completado exitosamente!"
echo "==========================================${NC}"
echo ""
echo -e "${YELLOW}Próximos pasos:${NC}"
echo ""
echo "1. Para desarrollo local:"
echo -e "   ${BLUE}php artisan serve${NC}"
echo ""
echo "2. Para compilar assets en modo watch:"
echo -e "   ${BLUE}npm run dev${NC}"
echo ""
echo "3. Acceder a la página institucional:"
echo -e "   ${BLUE}http://localhost:8000${NC}"
echo ""
echo "4. Para producción, compilar:"
echo -e "   ${BLUE}npm run build${NC}"
echo ""
echo -e "${YELLOW}Archivos principales:${NC}"
echo -e "   ${BLUE}resources/views/institutional.blade.php${NC} - Página principal"
echo -e "   ${BLUE}resources/views/components/{{NC} - Componentes reutilizables"
echo -e "   ${BLUE}config/institutional.php{{NC} - Configuración"
echo ""
