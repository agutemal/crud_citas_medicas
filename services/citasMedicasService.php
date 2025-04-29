<?php 
require_once __DIR__ . '/../repository/citasMedicasRepository.php';
class citasMedicasService{
    private $repository;

    public function __construct() {
        $this->repository = new citasMedicasRepository();
    }

    public function getAllPatients() {
        return $this->repository->getAll();
    }

    public function getPatient($id) {
        return $this->repository->getById($id);
    }

    public function createPatient($data) {
        $patient = new citasMedicas(null, $data['nombrePaciente'], $data['especialidad'], $data['fechaCita']);
        return $this->repository->create($patient);
    }

    public function updatePatient($id, $data) {
        $patient = new citasMedicas($id, $data['nombrePaciente'], $data['especialidad'], $data['fechaCita']);
        return $this->repository->update($patient);
    }

    public function deletePatient($id) {
        return $this->repository->delete($id);
    }

}

?>