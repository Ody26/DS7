<?php
include '../includes/Database.php';

$cedula_propietario = isset($_GET['cedula']) ? $_GET['cedula'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Vehículo</title>
    <link rel="stylesheet" href="registrar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="form-container">
            <h2>Registro de Vehículo</h2>
            <form action="procesar_registro.php" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="placa">Placa del Vehículo:</label>
                        <input type="text" id="placa" name="placa" required>
                    </div>
                    <div class="form-group">
                        <label for="marca">Marca:</label>
                        <select id="marca" name="marca" required>
                            <option value="">Seleccione una marca</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <select id="modelo" name="modelo" required>
                            <option value="">Seleccione un modelo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="anio">Año:</label>
                        <input type="number" id="anio" name="anio" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="color">Color:</label>
                        <input type="text" id="color" name="color" required>
                    </div>
                    <div class="form-group">
                        <label for="num_motor">Número de Motor:</label>
                        <input type="text" id="num_motor" name="num_motor" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="chasis">Número de Chasis:</label>
                        <input type="text" id="chasis" name="chasis" required>
                    </div>
                    <div class="form-group">
                        <label for="tipoVehiculo">Tipo de Vehículo:</label>
                        <input type="text" id="tipoVehiculo" name="tipoVehiculo" readonly>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="propietario">Cédula del Propietario:</label>
                        <input type="text" id="propietario" name="propietario" value="<?php echo htmlspecialchars($cedula_propietario); ?>" required>
                    </div>
                </div>
                
                <div class="botones">
                    <input type="submit" value="Registrar">
                    <button id="regresar_btn">Regresar</button>
                </div>
            </form>
        </div>
        <footer>
            <p>Odeth Arevalo</p>
        </footer>
    </div>

    <script>
        document.getElementById('regresar_btn').addEventListener('click', function() {
            window.location.href = '/Practica3/OdethArevalo/index.php';
        });
        $(document).ready(function() {
            $.ajax({
                url: 'obtener_marcas.php',
                type: 'GET',
                success: function(data) {
                    $('#marca').html(data);
                },
                error: function(error) {
                    console.log('Error al cargar marcas:', error);
                }
            });

            $('#marca').change(function() {
                let id_marca = $(this).val();
                if (id_marca) {
                    $.ajax({
                        url: 'obtener_modelo.php',
                        type: 'GET',
                        data: { id_marca: id_marca },
                        success: function(data) {
                            $('#modelo').html(data);
                        },
                        error: function(error) {
                            console.log('Error al cargar modelos:', error);
                        }
                    });
                } else {
                    $('#modelo').html('<option value="">Seleccione un modelo</option>');
                    $('#tipoVehiculo').html('<option value="">Seleccione un tipo de vehículo</option>');
                }
            });

            $('#modelo').change(function() {
                var id_modelo = $(this).val();

                if (id_modelo) {
                    $.ajax({
                        type: 'GET',
                        url: 'obtener_tipo_vehiculo.php',
                        data: { modelo_id: id_modelo },
                        success: function(response) {
                            if (response.trim() !== '') {
                                $('#tipoVehiculo').val(response);
                            } else {
                                $('#tipoVehiculo').val('No disponible');
                            }
                        },
                        error: function(error) {
                            console.log('Error al cargar el tipo de vehículo:', error);
                            $('#tipoVehiculo').val('Error al cargar');
                        }
                    });
                } else {
                    $('#tipoVehiculo').val('');
                }
            });
        });
    </script>
</body>
</html>
