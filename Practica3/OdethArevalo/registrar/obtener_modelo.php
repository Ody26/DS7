<?php
require_once '../includes/Database.php';

$database = new Database();
$db = $database->getConnection();

$id_marca = $_GET['id_marca'];

$query = "SELECT id_modelo, nombre_modelo FROM modelo WHERE id_marca = ?";
$stmt = $db->prepare($query);
$stmt->execute([$id_marca]);

$options = '<option value="">Seleccione un modelo</option>';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $options .= '<option value="' . $row['id_modelo'] . '">' . htmlspecialchars($row['nombre_modelo']) . '</option>';
}

echo $options;
?>
