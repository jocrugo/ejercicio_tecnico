<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List - Viaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
            color: #212529;
        }

        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .list-group-item {
            transition: background-color 0.3s ease, transform 0.2s ease-in-out;
        }

        .list-group-item:hover {
            background-color: rgba(0, 123, 255, 0.1);
            transform: scale(1.01);
        }

        .btn-outline-primary {
            color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-outline-primary:hover,
        .btn-outline-primary.active {
            background-color: #0d6efd;
            color: white;
        }

        .modal-content,
        .accordion-button,
        .accordion-body,
        .list-group-item,
        .card,
        .btn,
        .progress-bar {
            color: inherit;
        }

        .text-dynamic {
            color: #212529;
        }

        @media (prefers-color-scheme: dark) {
            body {
                background-color: #212529;
                background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
                color: #f8f9fa;
            }

            .card {
                background-color: #2b3035;
                border: 1px solid #444;
                color: #f8f9fa;
            }

            .modal-content {
                background-color: #343a40;
                color: #f8f9fa;
            }

            .btn-close {
                filter: invert(1);
            }

            .accordion-button {
                background-color: #495057;
                color: #f8f9fa;
            }

            .accordion-body,
            .list-group-item {
                background-color: #3b4147;
                color: #f8f9fa;
            }

            .btn-outline-primary {
                color: #66b2ff;
                border-color: #66b2ff;
            }

            .btn-outline-primary:hover,
            .btn-outline-primary.active {
                background-color: #66b2ff;
                color: #000;
            }

            .progress-bar {
                background-color: #28a745 !important;
                color: #000;
            }

            .text-dynamic {
                color: #f8f9fa !important;
            }

            .list-group-item:hover {
                background-color: rgba(102, 178, 255, 0.2);
                transform: scale(1.01);
            }
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h1 class="text-center mb-0 animate__animated animate__fadeInDown">To Do List - Viaje ✈️</h1>
        <p class="text-center text-dynamic mb-5 animate__animated animate__fadeInUp">Organiza, prioriza y disfruta tu
            aventura 🌄📋</p>

        <div class="container mb-4">
            <div class="d-flex justify-content-center">
                <div class="btn-group" role="group">
                    <button class="btn btn-outline-primary active">Todas</button>
                    <button class="btn btn-outline-primary">Pendientes</button>
                    <button class="btn btn-outline-primary">Completadas</button>
                </div>
            </div>
        </div>

        <div class="container mb-4">
            <div class="progress" style="height: 25px;">
                <div class="progress-bar bg-success" style="width: 50%;">2 de 4 completadas</div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow rounded-4 border-0 h-100 animate__animated animate__fadeInLeft">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">Agregar Actividad</h5>
                        <p class="card-text text-dynamic">Planea una nueva parada para tu aventura.</p>
                        <button class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                            + Nueva actividad
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow rounded-4 border-0 h-100 animate__animated animate__fadeInRight">
                    <div class="card-body">
                        <h5 class="card-title">Actualizar Actividad</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Subir al Nevado
                                <div>
                                    <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                        data-bs-target="#modalVer">Ver</button>
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalConfirmCheck">&check;</button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalConfirmDelete">&#128465;</button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Visitar pueblito mágico
                                <div>
                                    <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                        data-bs-target="#modalVer">Ver</button>
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalConfirmCheck">&check;</button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalConfirmDelete">&#128465;</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modales -->
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

    <div class="modal fade" id="modalVer" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content animate__animated animate__fadeInUp rounded-4">
                <div class="modal-header">
                    <h5 class="modal-title">Detalles de la actividad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h5 class="text-dynamic">Título: Subir al Nevado</h5>
                    <p class="text-dynamic">Subiremos al Nevado de Toluca el sábado. Llevar ropa térmica, agua y snacks.
                        Punto de reunión: entrada del parque 7:00 AM.</p>
                    <button class="btn btn-secondary mt-2" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalConfirmCheck" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content animate__animated animate__fadeIn">
                <div class="modal-header">
                    <h5 class="modal-title">¿Marcar como completada?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Esta actividad se moverá a tu lista de tareas completadas. ¿Deseas continuar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Sí, marcar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalConfirmDelete" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content animate__animated animate__fadeIn">
                <div class="modal-header">
                    <h5 class="modal-title">¿Eliminar actividad?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Esta acción no se puede deshacer. ¿Estás seguro de eliminar la actividad?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger">Sí, eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (() => {
            const form = document.getElementById('formAgregar');
            const tituloInput = document.getElementById('titulo');
            const comentariosInput = document.getElementById('comentarios');
            const lista = document.querySelector('.list-group');

            form.addEventListener('submit', async event => {
                event.preventDefault();
                event.stopPropagation();

                if (!form.checkValidity()) {
                    console.warn('Formulario inválido');
                    form.classList.add('was-validated');
                    return;
                }

                const datos = {
                    title: tituloInput.value.trim(),
                    description: comentariosInput.value.trim()
                };

                console.log('Enviando datos al backend:', datos);

                try {
                    const response = await fetch('/tasks', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(datos)
                    });


                    console.log('Respuesta HTTP:', response);

                    if (!response.ok) throw new Error('Error HTTP: ' + response.status);

                    const nueva = await response.json();
                    console.log('Tarea creada:', nueva);

                    // Mostrar nueva actividad
                    const nuevaTarea = document.createElement('li');
                    nuevaTarea.className = 'list-group-item d-flex justify-content-between align-items-center animate__animated animate__fadeIn';
                    nuevaTarea.innerHTML = `
                ${nueva.title}
                <div>
                    <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalVer">Ver</button>
                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalConfirmCheck">&check;</button>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalConfirmDelete">&#128465;</button>
                </div>
            `;
                    lista.appendChild(nuevaTarea);

                    form.reset();
                    form.classList.remove('was-validated');
                    bootstrap.Modal.getInstance(document.getElementById('modalAgregar')).hide();

                } catch (error) {
                    console.error('Fallo en la solicitud:', error);
                    alert('Error al guardar la tarea: ' + error.message);
                }
            });
        })();
    </script>

</body>

</html>