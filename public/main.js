const API_URL = 'http://localhost/crud_citas_medicas/controller/citasMedicasController.php'

// Validacion para fecha
const hoy = new Date().toISOString().split('T')[0];
document.getElementById('fechaCita').setAttribute('min', hoy);

//Funcion para crear una citaMedica
document.getElementById("citaForm").addEventListener('submit', async function (e) {
    e.preventDefault();

    const nombrePaciente = document.getElementById('nombrePaciente').value;
    const especialidad = document.getElementById('especialidad').value;
    const fechaCita = document.getElementById('fechaCita').value;
    const method = 'create';
    await fetch(`${API_URL}?action=${method}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ nombrePaciente, especialidad, fechaCita })
    });

    loadPatients();
    this.reset();
});

//Funcion para editar una citaMedica
document.getElementById("updateCitaMedica").addEventListener('click', async function (e) {
    e.preventDefault();
    const id = document.getElementById('id').value;
    const nombrePaciente = document.getElementById('nombrePacienteUpdate').value;
    const especialidad = document.getElementById('especialidadUpdate').value;
    const fechaCita = document.getElementById('fechaCitaUpdate').value;

    const method = 'update&id='+id;
    await fetch(`${API_URL}?action=${method}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ nombrePaciente, especialidad, fechaCita })
    });
    const modal = bootstrap.Modal.getInstance(document.getElementById('modalEditCitaMedica'));
    modal.hide();
    loadPatients();
});

//Funcion para cargar una citaMedica
async function loadPatients() {
    const response = await fetch(`${API_URL}?action=list`);
    console.log(`${API_URL}?action=list`)
    const patients = await response.json();

    const tbody = document.querySelector('#patientsTable tbody');
    tbody.innerHTML = '';

    patients.forEach(p => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${p.nombrePaciente}</td>
            <td>${p.especialidad}</td>
            <td>${p.fecha_cita}</td>
            <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEditCitaMedica" onclick="editPatient(${p.id})">Editar</button>
                <button type="button" class="btn btn-danger" onclick="deleteCitaMedica(${p.id})">Eliminar</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}
//Funcion para cargar informacion de una citaMedica en el modal
async function editPatient(id) {
    const response = await fetch(`${API_URL}?action=get&id=${id}`);
    const patient = await response.json();
    document.getElementById('id').value=id;
    document.getElementById('nombrePacienteUpdate').value = patient.nombrePaciente;
    document.getElementById('especialidadUpdate').value = patient.especialidad;
    document.getElementById('fechaCitaUpdate').value = patient.fecha_cita;

}
//Funcion para eliminar una citaMedica
async function deleteCitaMedica(id) {
    if (confirm('¿Seguro que quieres eliminar este paciente?')) {
        await fetch(`${API_URL}?action=delete&id=${id}`);
        loadPatients();
    }
}

// Cargar pacientes al iniciar
loadPatients();
