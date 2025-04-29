<?php
require_once __DIR__ . '/../services/citasMedicasService.php';

$service = new citasMedicasService();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'list':
        echo json_encode($service->getAllPatients());
        break;
    case 'get':
        $id = $_GET['id'];
        echo json_encode($service->getPatient($id));
        break;
    case 'create':
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode(['success' => $service->createPatient($data)]);
        break;
    case 'update':
        $id = $_GET['id'];
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode(['success' => $service->updatePatient($id, $data)]);
        break;
    case 'delete':
        $id = $_GET['id'];
        echo json_encode(['success' => $service->deletePatient($id)]);
        break;
    default:
        echo json_encode(['error' => 'Acción no válida']);
}
?>
