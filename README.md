# Tarea 7 - Sistema de Calificaciones

App web diseñada para registrar, ver, editar y eliminar materias y sus calificaciones por actividad evaluable.

## Stack

| Tool       | Version  |
|------------|----------|
| PHP        | 8.2.12   |
| Composer   | 2.9.5    |
| Laravel    | 12.54.1  |
| MySQL      | 8.0      |

> **NOTA:** Todos los proyectos han sido realizados en Laravel 12 ya que Laravel 7 es incompatible con la versión de PHP instalada.

## Diagrama ER

| Tabla              | Relación | Tabla        |
|--------------------|----------|--------------|
| materias           | 1:N      | actividades  |
| tipo_actividades   | 1:N      | actividades  |

## Comandos usados de Artisan
```bash
# Crear modelos + migraciones + controladores + factories
php artisan make:model Actividad -mcrf
php artisan make:model Materias -mcrf
php artisan make:model Tipo_actividades -mcrf

# Crear vistas de blade
New-Item resources\views\materias\index.blade.php
New-Item resources\views\materias\create.blade.php
New-Item resources\views\materias\edit.blade.php
New-Item resources\views\materias\show.blade.php

New-Item resources\views\actividades\index.blade.php
New-Item resources\views\actividades\create.blade.php
New-Item resources\views\actividades\edit.blade.php
New-Item resources\views\actividades\show.blade.php

New-Item resources\views\tipo_actividades\index.blade.php
New-Item resources\views\tipo_actividades\create.blade.php
New-Item resources\views\tipo_actividades\edit.blade.php
New-Item resources\views\tipo_actividades\show.blade.php

New-Item resources\views\layouts\app.blade.php

# Migraciones
php artisan migrate

# Iniciar servidor
php artisan serve
```

## Funcionalidades

- CRUD completo de materias
- CRUD completo de tipos de actividad (tarea, examen, quick test, etc.)
- Registro de calificaciones por materia con fecha y comentarios opcionales
- Validación de formularios en todos los módulos
- Indicador visual de calificación por color (verde, amarillo, rojo)

## Rutas principales

| Método | URL                                  | Descripción                  |
|--------|--------------------------------------|------------------------------|
| GET    | /materias                            | Lista de materias            |
| GET    | /materias/create                     | Formulario nueva materia     |
| GET    | /materias/{id}/actividad             | Calificaciones de la materia |
| GET    | /materias/{id}/actividad/create      | Formulario nueva actividad   |
| GET    | /tipo-actividades                    | Lista de tipos de actividad  |