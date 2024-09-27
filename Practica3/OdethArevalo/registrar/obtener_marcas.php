<?php
require_once '../includes/Database.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT id_marca, nombre_marca FROM marca";
$stmt = $db->prepare($query);
$stmt->execute();

$options = '<option value="">Seleccione una marca</option>';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $options .= '<option value="' . $row['id_marca'] . '">' . htmlspecialchars($row['nombre_marca']) . '</option>';
}

echo $options;
?>

