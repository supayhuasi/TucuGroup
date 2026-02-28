#!/bin/bash

# Script de Verificación del Módulo de Administración
# Ejecutar desde la raíz del proyecto

echo "╔════════════════════════════════════════════════════════════════╗"
echo "║        Verificando Módulo de Administración                   ║"
echo "╚════════════════════════════════════════════════════════════════╝"
echo ""

# Color codes
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Contador de verificaciones
PASS=0
FAIL=0

# Función para verificar archivos
check_file() {
    if [ -f "$1" ]; then
        echo -e "${GREEN}✓${NC} $1"
        ((PASS++))
    else
        echo -e "${RED}✗${NC} $1"
        ((FAIL++))
    fi
}

# Función para verificar directorios
check_dir() {
    if [ -d "$1" ]; then
        echo -e "${GREEN}✓${NC} $1/"
        ((PASS++))
    else
        echo -e "${RED}✗${NC} $1/"
        ((FAIL++))
    fi
}

echo "📁 Verificando archivos..."
echo ""

check_file "app/Http/Controllers/AdminController.php"
check_file "app/Http/Middleware/IsAdmin.php"
check_file "database/migrations/2026_02_28_000000_add_role_to_users_table.php"
check_file "resources/views/admin/layout.blade.php"
check_file "resources/views/admin/dashboard.blade.php"
check_file "resources/views/admin/users.blade.php"
check_file "resources/views/admin/edit-user.blade.php"
check_file "resources/views/admin/settings.blade.php"
check_file "ADMIN_MODULE.md"
check_file "ADMIN_QUICK_START.txt"

echo ""
echo "════════════════════════════════════════════════════════════════"
echo ""

echo "📊 Próximos pasos:"
echo ""
echo "1. Ejecutar migraciones:"
echo "   ${YELLOW}php artisan migrate${NC}"
echo ""
echo "2. (Opcional) Crear datos de prueba:"
echo "   ${YELLOW}php artisan db:seed${NC}"
echo ""
echo "3. Inicia el servidor:"
echo "   ${YELLOW}php artisan serve${NC}"
echo ""
echo "4. Accede a:"
echo "   ${YELLOW}http://localhost:8000/login${NC}"
echo ""
echo "5. Ingresa con:"
echo "   Email: admin@example.com"
echo "   Contraseña: password"
echo ""
echo "6. Haz clic en '🔐 Administración'"
echo ""

echo "════════════════════════════════════════════════════════════════"
echo ""
echo -e "Resultado: ${GREEN}${PASS} archivos OK${NC} ${RED}${FAIL} errores${NC}"
echo ""

if [ $FAIL -eq 0 ]; then
    echo -e "${GREEN}✓ Todas las verificaciones pasaron!${NC}"
    exit 0
else
    echo -e "${RED}✗ Se encontraron errores${NC}"
    exit 1
fi
