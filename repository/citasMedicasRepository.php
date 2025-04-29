<?php
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../entities/citasMedicas.php';

class CitasMedicasRepository {
    private $conn;

    public function __construct() {
        $database = new conexion();
        $this->conn = $database->getconexion();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM pacientes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM pacientes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(citasMedicas $citasMedicas) {
        $stmt = $this->conn->prepare("INSERT INTO pacientes (nombrePaciente, especialidad, fecha_cita) VALUES (?, ?, ?)");
        return $stmt->execute([$citasMedicas->nombrePaciente, $citasMedicas->especialidad, $citasMedicas->fechaCita]);
    }

    public function update(citasMedicas $citasMedicas) {
        $stmt = $this->conn->prepare("UPDATE pacientes SET nombrePaciente = ?, especialidad = ?, fecha_cita = ? WHERE id = ?");
        return $stmt->execute([$citasMedicas->nombrePaciente, $citasMedicas->especialidad, $citasMedicas->fechaCita, $citasMedicas->id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM pacientes WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>