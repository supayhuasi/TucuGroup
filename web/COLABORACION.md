# 🤝 GUÍA DE COLABORACIÓN - TUCUGROUP

## Bienvenido al Proyecto TucuGroup

Este documento te ayuda a colaborar en el proyecto usando Git y GitHub.

---

## 📋 Índice

1. [Configuración Inicial](#configuración-inicial)
2. [Flujo de Trabajo](#flujo-de-trabajo)
3. [Crear Feature](#crear-feature)
4. [Pull Requests](#pull-requests)
5. [Resolver Conflictos](#resolver-conflictos)
6. [Mejores Prácticas](#mejores-prácticas)

---

## ⚙️ Configuración Inicial

### Paso 1: Clonar el Repositorio

```bash
git clone https://github.com/supayhuasi/TucuGroup.git
cd TucuGroup/web
```

### Paso 2: Configurar tu Identidad Git

```bash
git config user.name "Tu Nombre"
git config user.email "tu@email.com"

# O globalmente (para todos los proyectos)
git config --global user.name "Tu Nombre"
git config --global user.email "tu@email.com"
```

### Paso 3: Instalar Dependencias

```bash
composer install
npm install
php artisan key:generate
```

### Paso 4: Verificar Conexión

```bash
git remote -v
# Debería mostrar:
# origin  https://github.com/supayhuasi/TucuGroup.git (fetch)
# origin  https://github.com/supayhuasi/TucuGroup.git (push)
```

---

## 🔄 Flujo de Trabajo

### Ciclo Típico de Desarrollo

```
1. Actualizar main     → git pull origin main
2. Crear rama          → git checkout -b feature/mi-feature
3. Hacer cambios       → Editar archivos
4. Commitear           → git commit -m "feat: descripción"
5. Hacer push          → git push origin feature/mi-feature
6. Pull Request        → En GitHub
7. Code Review         → Esperar aprobación
8. Merge               → En GitHub
9. Actualizar local    → git pull origin main
```

---

## 🎨 Crear una Nueva Feature

### Paso 1: Actualizar main

```bash
git checkout main
git pull origin main
```

### Paso 2: Crear Nueva Rama

```bash
# Usar nombre descriptivo
git checkout -b feature/nueva-funcionalidad

# O con prefijo según tipo:
# feature/nombre-feature      (Nueva funcionalidad)
# fix/nombre-bug              (Corrección de bug)
# refactor/nombre-cambio      (Refactorización)
# docs/nombre-documento       (Documentación)
```

### Paso 3: Hacer Cambios

```bash
# Ver estado
git status

# Ver cambios
git diff

# Ver cambios en un archivo específico
git diff archivo.php
```

### Paso 4: Commitear Cambios

```bash
# Agregar archivo específico
git add archivo.php

# O agregar todos los cambios
git add -A

# Commitear
git commit -m "feat: descripción del cambio

- Punto 1
- Punto 2
- Punto 3"
```

### Paso 5: Hacer Push

```bash
git push origin feature/nueva-funcionalidad
```

---

## 🔀 Pull Requests

### Crear Pull Request en GitHub

1. Ve a: https://github.com/supayhuasi/TucuGroup
2. Verás un botón "Compare & pull request" (o haz clic en "Pull requests" → "New")
3. Completa la información:

**Título:**
```
feat: Descripción breve de la funcionalidad
```

**Descripción:**
```markdown
## Descripción
Explica qué cambios hace este PR.

## Tipo de cambio
- [ ] Nueva funcionalidad
- [ ] Corrección de bug
- [ ] Cambio de documentación
- [ ] Refactorización

## Cómo probar
Describe los pasos para probar los cambios.

## Checklist
- [ ] Mi código sigue las convenciones del proyecto
- [ ] He actualizado la documentación
- [ ] He agregado tests (si aplica)
- [ ] Mi rama está actualizada con main
```

### Ejemplo Completo

```markdown
## Descripción
Agrega sistema de notificaciones por email

## Tipo de cambio
- [x] Nueva funcionalidad
- [ ] Corrección de bug
- [ ] Cambio de documentación
- [ ] Refactorización

## Cambios
- Crear controlador NotificacionController
- Agregar modelo Notificacion
- Crear migración de tabla notificaciones
- Agregar vistas para gestión

## Cómo probar
1. Ejecutar `php artisan migrate`
2. Ir a /admin/notificaciones
3. Crear nueva notificación
4. Verificar que se envía por email

## Checklist
- [x] Código sigue convenciones
- [x] Documentación actualizada
- [x] Tests creados
- [x] Rama actualizada con main
```

---

## 🔧 Resolver Conflictos

### Conflicto al hacer Merge

Si hay conflictos:

```bash
# Ver conflictos
git status

# Editar archivos con conflictos
nano archivo_conflictivo.php

# El archivo tendrá secciones como:
# <<<<<<< HEAD
# Tu código
# =======
# Código de la otra rama
# >>>>>>> nombre-rama

# Resolver manualmente, eliminar marcadores
git add archivo_conflictivo.php
git commit -m "resolve: Resolver conflicto en archivo_conflictivo.php"
git push origin nombre-rama
```

### Actualizar tu rama con cambios de main

```bash
git fetch origin
git rebase origin/main

# Si hay conflictos, resolverlos y:
git add .
git rebase --continue

# O abortar si hay problemas:
git rebase --abort
```

---

## ✅ Mejores Prácticas

### Mensajes de Commit

**Prefijos:**
```
feat:       Nueva funcionalidad
fix:        Corrección de bug
docs:       Cambios en documentación
style:      Cambios de formato (sin afectar código)
refactor:   Reorganización de código
perf:       Mejora de performance
test:       Agregar o modificar tests
chore:      Cambios de herramientas
ci:         Cambios en CI/CD
```

**Ejemplos correctos:**
```
feat: Agregar sistema de notificaciones
fix: Corregir validación de email
docs: Actualizar README
refactor: Simplificar lógica de AdminController
```

**Ejemplos incorrectos:**
```
cambios varios
fixed bug
updated
arreglo
```

### Commits Atómicos

Cada commit debe ser:
- ✓ Independiente y completo
- ✓ Enfocado en una sola tarea
- ✓ Con mensaje descriptivo
- ✓ Con tests pasando

**Bien:**
```
- Commit 1: feat: Crear modelo Notificacion
- Commit 2: feat: Agregar migración notificaciones
- Commit 3: feat: Crear controlador NotificacionController
```

**Mal:**
```
- Commit 1: Agregar notificaciones, cambiar BD, actualizar vistas (TODO)
```

### Branches

**Nombres de rama:**
```
feature/nueva-funcionalidad
fix/error-login
docs/readme-update
refactor/controllers
test/add-unit-tests
```

**Reglas:**
- Usar minúsculas
- Separar palabras con guiones
- Ser descriptivos
- Eliminar rama después de merge

### Pull Requests

Antes de hacer PR:

```bash
# Actualizar con cambios de main
git pull origin main

# Revisar cambios
git diff main

# Ejecutar tests
php artisan test

# Compilar assets
npm run build

# Verificar que no hay errores
php artisan lint
```

---

## 📊 Ver Información del Repositorio

```bash
# Ver ramas locales
git branch

# Ver todas las ramas (local + remota)
git branch -a

# Ver historial
git log --oneline -10

# Ver historial con grafo
git log --oneline --graph --all

# Ver colaboradores
git shortlog -sn

# Ver estadísticas
git log --stat

# Ver quién cambió cada línea
git blame archivo.php
```

---

## 🧹 Mantener Limpio el Repositorio

### Eliminar Ramas Locales

```bash
# Eliminar rama local
git branch -d nombre-rama

# Forzar eliminación
git branch -D nombre-rama

# Eliminar rama remota
git push origin --delete nombre-rama

# Limpiar referencias a ramas eliminadas
git remote prune origin
```

### Actualizar desde Remoto

```bash
# Traer cambios sin modificar local
git fetch origin

# Actualizar branch actual
git pull origin nombre-rama

# Actualizar main
git pull origin main
```

---

## 🐛 Revisar el Trabajo de Otros

### Examinar PR

1. Ve a https://github.com/supayhuasi/TucuGroup/pulls
2. Abre el PR que quieras revisar
3. Revisa los cambios en la pestaña "Files changed"
4. Comenta líneas específicas si es necesario
5. Aprueba o solicita cambios

### Descargar rama de PR para probar

```bash
git fetch origin pull/ID/head:nombre-rama
git checkout nombre-rama

# Probar cambios
php artisan serve

# Cuando termines
git checkout main
git branch -D nombre-rama
```

---

## 📞 Preguntas Frecuentes

### ¿Cómo deshago cambios?

```bash
# Deshacer cambios en archivo específico
git checkout archivo.php

# Deshacer todos los cambios (no commiteados)
git reset --hard

# Deshacer último commit (sin perder cambios)
git reset --soft HEAD~1

# Deshacer último commit (perdiendo cambios)
git reset --hard HEAD~1
```

### ¿Cómo renombro una rama?

```bash
# Renombrar rama actual
git branch -m nuevo-nombre

# Renombrar rama remota
git push origin :nombre-viejo nuevo-nombre
git push origin -u nuevo-nombre
```

### ¿Cómo veo quién hizo un cambio?

```bash
git blame archivo.php
```

### ¿Cómo recupero una rama eliminada?

```bash
git reflog
# Encontrar el commit
git checkout -b nombre-rama COMMIT_SHA
```

---

## 🔗 Enlaces Útiles

- [GitHub Flow Guide](https://guides.github.com/introduction/flow/)
- [Git Cheat Sheet](https://git-scm.com/docs)
- [Conventional Commits](https://www.conventionalcommits.org/)
- [GitHub Help](https://help.github.com)

---

## 💡 Tips

1. **Sync frecuente**: Haz `git pull` periódicamente para evitar conflictos
2. **Branches cortas**: Mantén ramas de corta vida (máximo 1-2 semanas)
3. **Commits frecuentes**: Commits pequeños son mejores que commits grandes
4. **Mensajes claros**: Escribe mensajes que expliquen el "por qué"
5. **Revisa antes de push**: Verifica cambios con `git diff` antes de hacer push
6. **Tests primero**: Asegúrate que los tests pasen antes de hacer PR
7. **Documentación**: Actualiza docs si cambias funcionalidades
8. **Comunicación**: Pregunta en Issues o Discussions si tienes dudas

---

## 🚀 Flujo Recomendado para Nuevos Colaboradores

1. Fork el repositorio (opcional)
2. Clonar el repositorio
3. Crear rama para tu feature
4. Hacer cambios pequeños y enfocados
5. Hacer commits frecuentes
6. Hacer push a tu rama
7. Crear Pull Request
8. Responder comentarios de revisión
9. Merge cuando esté aprobado

---

¡Gracias por colaborar en TucuGroup! 🙌

**Happy Coding!** 🚀
