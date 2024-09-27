<?php
include '../includes/Database.php';
include '../includes/Automovil.php';

$database = new Database();
$db = $database->getConnection();
$automovil = new Automovil($db);
$vehiculos = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['placa'])) {
    $placa = $_POST['placa'];

    $resultado = $automovil->buscar($placa);

    if ($resultado) {
        $vehiculos[] = array(
            'marca' => $resultado['marca'],
            'modelo' => $resultado['modelo'],
            'anio' => $resultado['anio'],
            'color' => $resultado['color'],
            'num_motor' => $resultado['motor'],
            'chasis' => $resultado['chasis'],
            'vehiculo' => $resultado['vehiculo'],
            'propietario' => $resultado['nombre'] // Asegúrate de que esto sea correcto
        );
    }
}

header('Content-Type: application/json');
echo json_encode($vehiculos);
?>
