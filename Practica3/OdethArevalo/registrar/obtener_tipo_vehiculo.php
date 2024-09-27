<?php
require_once '../includes/Database.php';

$database = new Database();
$db = $database->getConnection();

if (isset($_GET['modelo_id'])) {
    $modelo_id = $_GET['modelo_id'];

    $query = "SELECT tv.nombre_tipo
                FROM modelo m
                JOIN tipovehiculo tv ON m.id_tipo_vehiculo = tv.id_tipo_vehiculo
                WHERE m.id_modelo = ?";
                
    $stmt = $db->prepare($query);
    $stmt->execute([$modelo_id]);

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo htmlspecialchars($row['nombre_tipo']);
    } else {
        echo '';
    }
} else {
    echo 'Error: Modelo no especificado.';
}

?>
