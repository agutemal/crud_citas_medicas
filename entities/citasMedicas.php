<?php
class citasMedicas {
    public $id;
    public $nombrePaciente;
    public $especialidad;
    public $fechaCita;

    public function __construct($id = null, $nombrePaciente = '', $especialidad = '', $fechaCita = '') {
        $this->id = $id;
        $this->nombrePaciente = $nombrePaciente;
        $this->especialidad = $especialidad;
        $this->fechaCita = $fechaCita;
    }
}
?>