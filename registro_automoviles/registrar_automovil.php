<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Automóviles</title>
    <link rel="stylesheet" href="diseño/registrar_automovil.css">
</head>

<body>
    <div class="form-container">
        <h2>Registro</h2>
        <form action="procesar_registro.php" method="post">
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" required>
            </div>

            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" required>
            </div>

            <div class="form-group">
                <label for="placa">Placa:</label>
                <input type="text" id="placa" name="placa" required>
            </div>

            <div class="form-group">
                <label for="anio">Año:</label>
                <input type="number" id="anio" name="anio" required>
            </div>

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" id="color" name="color" required>
            </div>

            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
