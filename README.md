# ✈️ To Do List - Planificador de Viaje

Una aplicación web interactiva y responsive para organizar actividades antes de un viaje, desarrollada con **Laravel**, **Bootstrap 5**, **Fetch API**, y animaciones con **Animate.css**.

---

## 💠 Tecnologías utilizadas

- **Laravel 10** (Back-end, rutas, validación, API REST)
- **MySQL** (Persistencia de tareas)
- **Bootstrap 5.3** (Diseño responsive y estilo visual)
- **JavaScript** (DOM, eventos, Fetch API)
- **Animate.css** (Animaciones suaves en interfaz)
- **Git** (Control de versiones)

---

## 🎯 Funcionalidades

- ✅ Crear nuevas tareas con título y descripción
- ✅ Visualizar detalles de cada tarea en un modal
- ✅ Marcar tareas como completadas
- ✅ Eliminar tareas con confirmación
- ✅ Filtrar tareas entre:
  - Todas
  - Pendientes
  - Completadas
- ✅ Barra de progreso dinámica según tareas visibles
- ✅ Mensaje cuando no hay tareas en la vista actual
- ✅ Interfaz responsive y compatible con modo oscuro

---

## 📆 Instalación y configuración

1. **Clona el repositorio**

```bash
git clone https://github.com/jocrugo/ejercicio_tecnico.git
cd ejercicio_tecnico
```

2. **Instala dependencias**

```bash
composer install
npm install && npm run build
```

3. **Configura el entorno**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Configura tu base de datos en **``\
   Asegúrate de tener una base llamada `ejercicio_tecnico`.

```env
DB_DATABASE=ejercicio_tecnico
DB_USERNAME=root
DB_PASSWORD=
```

5. **Ejecuta las migraciones**

```bash
php artisan migrate
```

6. **Inicia el servidor**

```bash
php artisan serve
```

Accede desde [http://localhost:8000](http://localhost:8000)

---

## 🗃 Estructura básica de la base de datos

La tabla `tasks` tiene el siguiente diseño:

```php
Schema::create('tasks', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description')->nullable();
    $table->enum('status', ['pendiente', 'completada'])->default('pendiente');
    $table->timestamps();
});
```

---

## 🔄 Endpoints API

| Método | Ruta                   | Acción                        |
| ------ | ---------------------- | ----------------------------- |
| GET    | `/tasks`               | Obtener todas las tareas      |
| GET    | `/tasks/{id}`          | Obtener detalles de una tarea |
| POST   | `/tasks`               | Crear nueva tarea             |
| PUT    | `/tasks/{id}/complete` | Marcar tarea como completada  |
| DELETE | `/tasks/{id}`          | Eliminar una tarea            |

---

## 📸 Capturas

---

## 🧠 Consideraciones

- Se utiliza `fetch` puro, sin jQuery.
- El diseño es completamente responsivo.
- No se utiliza Livewire ni Inertia para mantener la lógica lo más clara posible.

---

## 📌 Autor

Josué Cruz González
[GitHub](https://github.com/jocrugo) 

---

## ⚖️ Licencia

Este proyecto está bajo la Licencia MIT.

