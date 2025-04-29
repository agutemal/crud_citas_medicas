<?php 
echo "Hola mundo";
require_once __DIR__ . '/services/citasMedicasService.php';


$service = new citasMedicasService();
$action = $_GET['action'] ?? '';
echo json_encode($service->getAllPatients());

?>