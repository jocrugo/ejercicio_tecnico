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

            .text-dynamic {
                color: #f8f9fa !important;
            }

            .list-group-item:hover {
                background-color: rgba(102, 178, 255, 0.2);
                transform: scale(1.01);
            }
        }

        .progress-bar {
            background-color: #28a745;
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

        <div class="progress position-relative" style="height: 25px; margin-bottom: 20px; " >
            <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;"></div>
            <span id="progressText"
                class="position-absolute top-0 start-50 translate-middle-x h-100 d-flex align-items-center justify-content-center text-white fw-bold">
                0 de 0 completadas
            </span>
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
                        <ul id="taskList" class="list-group list-group-flush">

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
                    <h5 id="modalVerTitulo" class="text-dynamic">Título</h5>
                    <p id="modalVerDescripcion" class="text-dynamic">Descripción</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnModalCheck">
                        Marcar como completada
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
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
document.addEventListener('DOMContentLoaded', () => {
    const lista    = document.getElementById('taskList');
    const form     = document.getElementById('formAgregar');
    const token    = document.querySelector('meta[name="csrf-token"]').content;
    let idToComplete, liToComplete, idToDelete, liToDelete;
    let currentFilter = 'todas';

    // inicializa modales
    const modalVer           = new bootstrap.Modal(document.getElementById('modalVer'));
    const btnModalCheck      = document.getElementById('btnModalCheck');
    const modalConfirmCheck  = new bootstrap.Modal(document.getElementById('modalConfirmCheck'));
    const btnConfirmCheck    = document.querySelector('#modalConfirmCheck .btn-success');
    const modalConfirmDelete = new bootstrap.Modal(document.getElementById('modalConfirmDelete'));
    const btnConfirmDelete   = document.querySelector('#modalConfirmDelete .btn-danger');

    // configura botones de filtro
    document.querySelectorAll('.btn-group .btn').forEach(btn => {
        btn.addEventListener('click', () => {
            // marca botón activo
            document.querySelectorAll('.btn-group .btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            // ajusta filtro (todas|pendientes|completadas)
            currentFilter = btn.textContent.trim().toLowerCase();
            applyFilter();
        });
    });

    // dibuja una tarea en la lista
    function renderTask(task) {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center animate__animated animate__fadeIn';
        li.dataset.status = task.status; // 'pendiente' o 'completada'
        if (task.status === 'completada') {
            li.classList.add('text-decoration-line-through');
        }
        li.innerHTML = `
            <span>${task.title}</span>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-info btn-ver" data-id="${task.id}">Ver</button>
                ${task.status==='pendiente'?`<button class="btn btn-sm btn-success btn-check" data-id="${task.id}">✓</button>`:``}
                <button class="btn btn-sm btn-danger btn-delete" data-id="${task.id}">🗑️</button>
            </div>
        `;

        // evento “Ver”
        li.querySelector('.btn-ver').addEventListener('click', async () => {
            idToComplete = task.id; liToComplete = li;
            const res  = await fetch(`/tasks/${task.id}`);
            const data = await res.json();
            document.getElementById('modalVerTitulo').textContent      = `Título: ${data.title}`;
            document.getElementById('modalVerDescripcion').textContent = data.description;
            btnModalCheck.disabled = data.status==='completada';
            modalVer.show();
        });

        // evento marcar completada (desde lista)
        li.querySelector('.btn-check')?.addEventListener('click', () => {
            idToComplete = task.id; liToComplete = li;
            modalConfirmCheck.show();
        });

        // evento eliminar
        li.querySelector('.btn-delete').addEventListener('click', () => {
            idToDelete = task.id; liToDelete = li;
            modalConfirmDelete.show();
        });

        lista.appendChild(li);
    }

    // carga inicial de tareas
    fetch('/tasks')
        .then(r => r.json())
        .then(tasks => {
            tasks.forEach(renderTask);
            applyFilter();
        });

    // agregar nueva tarea
    form.addEventListener('submit', async e => {
        e.preventDefault();
        const title       = document.getElementById('titulo').value.trim();
        const description = document.getElementById('comentarios').value.trim();
        const res = await fetch('/tasks', {
            method: 'POST',
            headers: { 'Content-Type':'application/json','X-CSRF-TOKEN':token },
            body: JSON.stringify({ title, description })
        });
        const nueva = await res.json();
        renderTask(nueva);
        applyFilter();
        form.reset();
        bootstrap.Modal.getOrCreateInstance('#modalAgregar').hide();
    });

    // completar desde modal “Ver”
    btnModalCheck.addEventListener('click', () => {
        modalVer.hide();
        modalConfirmCheck.show();
    });

    // confirmar completada
    btnConfirmCheck.addEventListener('click', async () => {
        await fetch(`/tasks/${idToComplete}/complete`, {
            method: 'PUT',
            headers: { 'X-CSRF-TOKEN': token }
        });
        liToComplete.classList.add('text-decoration-line-through');
        liToComplete.dataset.status = 'completada';
        liToComplete.querySelector('.btn-check')?.remove();
        applyFilter();
        modalConfirmCheck.hide();
    });

    // confirmar eliminar
    btnConfirmDelete.addEventListener('click', async () => {
        await fetch(`/tasks/${idToDelete}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': token }
        });
        liToDelete.remove();
        applyFilter();
        modalConfirmDelete.hide();
    });

    // ——— LÓGICA DE FILTRADO ———
    function applyFilter() {
        // recorre cada elemento <li> y lo oculta o muestra según el filtro
        lista.querySelectorAll('li').forEach(li => {
            const status = li.dataset.status;
            const mostrar =
                currentFilter === 'todas'
                || (currentFilter === 'pendientes'  && status === 'pendiente')
                || (currentFilter === 'completadas' && status === 'completada');
            li.classList.toggle('d-none', !mostrar);
        });
        updateUI();
    }

    // actualiza barra de progreso y mensaje de lista vacía
    function updateUI() {
        // sólo contamos las <li> visibles
        const visibles = Array.from(lista.querySelectorAll('li:not(.d-none)'));
        const total = visibles.filter(li => li.dataset.status).length;
        const done  = visibles.filter(li => li.classList.contains('text-decoration-line-through')).length;
        const pct   = total ? Math.round(done/total*100) : 0;

        // actualiza barra y texto
        const barra = document.getElementById('progressBar');
        barra.style.width = `${pct}%`;
        barra.className = 'progress-bar ' + (pct===100?'bg-success':pct>=50?'bg-warning':'bg-danger');
        document.getElementById('progressText').textContent = `${done} de ${total} completadas`;

        // mensaje "vacío"
        let emptyMsg = document.getElementById('emptyMessage');
        if (total === 0) {
            if (!emptyMsg) {
                emptyMsg = document.createElement('li');
                emptyMsg.id = 'emptyMessage';
                emptyMsg.className = 'list-group-item text-center text-muted';
                emptyMsg.textContent = 'Aún no hay actividades registradas';
                lista.appendChild(emptyMsg);
            }
        } else {
            emptyMsg?.remove();
        }
    }

});
</script>



</body>

</html>