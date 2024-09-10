<?php
include '../includes/Database.php';
include '../includes/Automovil.php';

$response = [
    'status' => false,
    'message' => 'Error desconocido.'
];

$database = new Database();
$db = $database->getConnection();

$automovil = new Automovil($db);

// Obtener los datos del formulario
$automovil->marca = $_POST['marca'];
$automovil->modelo = $_POST['modelo'];
$automovil->anio = $_POST['anio'];
$automovil->color = $_POST['color'];
$automovil->num_motor = $_POST['num_motor'];
$automovil->chasis = $_POST['chasis'];
$automovil->vehiculo = $_POST['vehiculo'];
$automovil->placa = $_POST['placa'];

// Registrar el automóvil
try {
    $registroExitoso = $automovil->registrar();
    if ($registroExitoso) {
        $response['status'] = true;
        $response['message'] = "Registro realizado exitosamente.";
    } else {
        $response['message'] = "Error al registrar el automóvil.";
    }
} catch (Exception $e) {
    $response['message'] = "No se ha podido completar el registro";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Automóvil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(45deg, #ff8a80, #b452ff);
            margin: 0;
            min-height: 100vh;
        }
    </style>
    <script>
        window.onload = function() {
            var response = <?php echo json_encode($response); ?>;
            if (response.message) {
                Swal.fire({
                    title: response.status ? 'Éxito' : 'Error',
                    text: response.message,
                    icon: response.status ? 'success' : 'error',
                    timer: 5000,
                    timerProgressBar: true,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'registrar_automovil.html';
                });
            }
        };
    </script>
</head>
<body>
</body>
</html>
