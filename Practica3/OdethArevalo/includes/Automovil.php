<?php
class Automovil {
    private $conn;
    private $table_name = "vehiculo";

    public $placa;
    public $anio;
    public $color;
    public $motor;
    public $chasis;
    public $id_marca;
    public $id_modelo;
    public $id_tipo_vehiculo;
    public $id_propietario;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar($propietario) {
        $query = "SELECT COUNT(*) FROM " . $this->table_name . " WHERE placa = :placa";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":placa", $this->placa);
        $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            echo "El vehículo con placa " . $this->placa . " ya está registrado.";
            return false;
        }
        
        // Obtener el ID de la marca
        $query = "SELECT id_marca FROM marca WHERE id_marca = :marca";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':marca', $this->id_marca);
        $stmt->execute();
        $marca_row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id_marca = $marca_row['id_marca'];
        
        // Obtener el ID del modelo
        $query = "SELECT id_modelo FROM modelo WHERE id_modelo = :modelo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':modelo', $this->id_modelo);
        $stmt->execute();
        $modelo_row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id_modelo = $modelo_row['id_modelo'];
        
        // Obtener el ID del tipo de vehículo
        $query = "SELECT id_tipo_vehiculo FROM tipovehiculo WHERE nombre_tipo = :nombre_tipo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre_tipo', $this->id_tipo_vehiculo);
        $stmt->execute();
        $tipo_row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id_tipo_vehiculo = $tipo_row['id_tipo_vehiculo'];

        // Consulta para inserción del vehículo
        $query = "INSERT INTO " . $this->table_name . "
            (placa, anio, color, motor, chasis, id_marca, id_modelo, id_tipo_vehiculo, id_propietario) 
            VALUES (:placa, :anio, :color, :motor, :chasis, :id_marca, :id_modelo, :id_tipo_vehiculo, :id_propietario)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":placa", $this->placa);
        $stmt->bindParam(":anio", $this->anio);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":motor", $this->motor);
        
        $stmt->bindParam(":chasis", $this->chasis);
        $stmt->bindParam(":id_marca", $this->id_marca);
        $stmt->bindParam(":id_modelo", $this->id_modelo);
        $stmt->bindParam(":id_tipo_vehiculo", $this->id_tipo_vehiculo);
        $stmt->bindParam(":id_propietario", $this->id_propietario);
        return $stmt->execute();
        
    }

    public function buscar($placa) {
        $query = "
            SELECT v.*, m.nombre AS modelo, b.nombre AS marca, p.nombre AS propietario, v.tipo_vehiculo 
            FROM " . $this->table_name . " v
            JOIN modelos m ON v.modelo_id = m.id
            JOIN marcas b ON m.marca_id = b.id
            JOIN propietarios p ON v.propietario_id = p.id
            WHERE v.placa = :placa
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":placa", $placa);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function eliminar($placa) {
        $query = "DELETE FROM " . $this->table_name . " WHERE placa = :placa";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":placa", $placa);
        return $stmt->execute();
    }

    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " SET marca = :marca, modelo = :modelo, anio = :anio, color = :color, motor = :num_motor, chasis = :chasis, vehiculo = :vehiculo WHERE placa = :placa";
        $stmt = $this->conn->prepare($query);

        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->anio = htmlspecialchars(strip_tags($this->anio));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->placa = htmlspecialchars(strip_tags($this->placa));

        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":anio", $this->anio);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":num_motor", $this->num_motor);
        $stmt->bindParam(":chasis", $this->chasis);
        $stmt->bindParam(":vehiculo", $this->vehiculo);
        $stmt->bindParam(":placa", $this->placa);

        return $stmt->execute();
    }
}
?>


