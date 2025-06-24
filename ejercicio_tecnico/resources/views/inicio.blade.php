<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List - Viaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <h1 class="text-center mb-0 animate__animated animate__fadeInDown">To Do List - Viaje ✈️</h1>
        <p class="text-center mb-5 animate__animated animate__fadeInUp">Organiza y prioriza tus actividades de viaje</p>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow border-0 h-100 animate__animated animate__fadeInLeft">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">Agregar Actividad</h5>
                        <p class="card-text">Planea una nueva parada para tu aventura.</p>
                        <button class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#modalAgregar">+
                            Nueva actividad</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow border-0 h-100 animate__animated animate__fadeInRight">
                    <div class="card-body">
                        <h5 class="card-title">Actualizar Actividad</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Subir al Nevado
                                <div>
                                    <button class="btn btn-sm btn-info text-white">Ver</button>
                                    <button class="btn btn-sm btn-success">&check;</button>
                                    <button class="btn btn-sm btn-danger">&#128465;</button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Visitar pueblito mágico
                                <div>
                                    <button class="btn btn-sm btn-info text-white">Ver</button>
                                    <button class="btn btn-sm btn-success">&check;</button>
                                    <button class="btn btn-sm btn-danger">&#128465;</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Agregar Actividad -->
    <div class="modal fade" id="modalAgregar" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nueva actividad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formAgregar" novalidate>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="titulo" required minlength="3"
                                placeholder="Ej. Ir a la playa">
                            <div class="invalid-feedback">El título es obligatorio (mínimo 3 caracteres).</div>
                        </div>
                        <div class="mb-3">
                            <label for="comentarios" class="form-label">Comentarios</label>
                            <textarea class="form-control" id="comentarios" rows="3" required
                                placeholder="Detalles, notas..."></textarea>
                            <div class="invalid-feedback">Agrega una descripción o comentario.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap y validación -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (() => {
            'use strict';
            const form = document.getElementById('formAgregar');
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        })();
    </script>
</body>

</html>