<?php
class Automovil {
    private $conn; // Conexión a la base de datos
    private $table_name = "vehiculos"; // Nombre de la tabla

    // Propiedades de la clase
    public $marca;
    public $modelo;
    public $anio;
    public $color;
    public $placa;
    public $num_motor;
    public $chasis;
    public $vehiculo;


    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para registrar un nuevo automóvil
    public function registrar() {
        // Query para insertar un nuevo automóvil
        $query = "INSERT INTO " . $this->table_name . " (marca, modelo, anio, color, placa, motor, chasis, vehiculo) VALUES (:marca, :modelo, :anio, :color, :placa, :num_motor, :chasis, :vehiculo)";

        // Preparar la declaración
        $stmt = $this->conn->prepare($query);

        // Limpiar los datos para evitar inyección SQL
        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->anio = htmlspecialchars(strip_tags($this->anio));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->placa = htmlspecialchars(strip_tags($this->placa));

        // Enlazar los parámetros
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":anio", $this->anio);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":placa", $this->placa);
        $stmt->bindParam(":num_motor", $this->num_motor);
        $stmt->bindParam(":chasis", $this->chasis);
        $stmt->bindParam(":vehiculo", $this->vehiculo);

        // Ejecutar la declaración
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function buscar($placa) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE placa = :placa";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":placa", $placa);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para eliminar
    public function eliminar($placa) {
        $query = "DELETE FROM " . $this->table_name . " WHERE placa = :placa";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":placa", $placa);
        return $stmt->execute();
    }

    // Método para actualizar
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

