<?php
include '../includes/Database.php';

$response = [
    'status' => false,
    'message' => 'Error desconocido.'
];

$database = new Database();
$db = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $tipo_propietario = $_POST['tipo_propietario'];

    $sql = "INSERT INTO Propietario (id_propietario, nombre, apellido, telefono, direccion, tipo_propietario) 
            VALUES (:cedula, :nombre, :apellido, :telefono, :direccion, :tipo_propietario)";

    $stmt = $db->prepare($sql);

    $stmt->bindValue(':cedula', $cedula);
    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':apellido', $apellido);
    $stmt->bindValue(':telefono', $telefono);
    $stmt->bindValue(':direccion', $direccion);
    $stmt->bindValue(':tipo_propietario', $tipo_propietario);

    if ($stmt->execute()) {
        header("Location: registrar_automovil.php?cedula=$cedula");
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }

}
?>


