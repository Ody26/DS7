<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Propietario</title>
    <link rel="stylesheet" href="registrar.css">
</head>
<body>
    <div class="wrapper">
        <div class="form-container">
            <h2>Registro de Propietario</h2>
            <form action="procesar_registro_propietario.php" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="cedula">Cédula:</label>
                        <input type="text" id="cedula" name="cedula" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_propietario">Tipo de Propietario:</label>
                        <select id="tipo_propietario" name="tipo_propietario" required>
                            <option value="natural">Natural</option>
                            <option value="juridico">Jurídico</option>
                        </select>
                    </div>
                </div>
                <div class="botones">
                    <input type="submit" value="Registrar Propietario">
                    <button id="regresar_btn">Regresar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('regresar_btn').addEventListener('click', function() {
            window.location.href = '/Practica3/OdethArevalo/index.php';
        });
    </script>
</body>
</html>
