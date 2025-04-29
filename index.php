<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Citas Médicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/main.css">
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Clínica Hiberus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        <!-- Formulario -->
        <div class="container mt-4">
            <h2 class="mb-4">Agendar Cita Médica</h2>
            <form id="citaForm" class="row g-3">
                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre del Paciente</label>
                    <input type="text" class="form-control" id="nombrePaciente" required>
                </div>
                <div class="col-md-4">
                    <label for="especialidad" class="form-label">Especialidad</label>
                    <select class="form-select" id="especialidad" required>
                        <option selected disabled value="">Seleccionar...</option>
                        <option>Medicina General</option>
                        <option>Pediatría</option>
                        <option>Dermatología</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="fecha" class="form-label">Fecha de la Cita</label>
                    <input type="date" class="form-control" id="fechaCita" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-dark">Agregar</button>
                </div>
            </form>
        </div>

        <!-- Tabla de citas -->
        <div class="container mt-5">
            <h3>Citas Agendadas</h3>
            <div class="table-responsive">
                <table class="table table-striped" id="patientsTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre del Paciente</th>
                            <th>Especialidad</th>
                            <th>Fecha Cita</th>
                            <th>Configurar</th>
                        </tr>
                    </thead>
                    <tbody id="tablaCitas">
                        <!-- Filas agregadas dinámicamente -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalEditCitaMedica" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Cita Medica</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="col-md-8">
                            <label for="nombre" class="form-label">Nombre del Paciente</label>
                            <input type="text" class="form-control" id="nombrePacienteUpdate" required>
                        </div>
                        <div class="col-md-8 mt-2">
                            <label for=" especialidad" class="form-label">Especialidad</label>
                            <select class="form-select" id="especialidadUpdate" required>
                                <option selected disabled value="">Seleccionar...</option>
                                <option>Medicina General</option>
                                <option>Pediatría</option>
                                <option>Dermatología</option>
                            </select>
                        </div>
                        <div class="col-md-8 mt-2">
                            <label for="fecha" class="form-label">Fecha de la Cita</label>
                            <input type="date" class="form-control" id="fechaCitaUpdate" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="updateCitaMedica">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-white text-center py-2">
        <div class="container">
            <p class="mb-0">&copy; Derechos Reservados <span>2025</span></p>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="public/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>