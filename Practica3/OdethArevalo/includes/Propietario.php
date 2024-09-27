<?php
class Propietario {
    private $conn;
    private $table_name = "propietario";

    public $id_propietario;
    public $nombre;
    public $apellido;
    public $telefono;
    public $direccion;
    public $tipo_propietario;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para registrar un propietario
    public function registrar() {
        $query = "INSERT INTO " . $this->table_name . " 
            (id_propietario, nombre, apellido, telefono, direccion, tipo_propietario) 
            VALUES (:id_propietario, :nombre, :apellido, :telefono, :direccion, :tipo_propietario)";

        $stmt = $this->conn->prepare($query);

        $this->id_propietario = htmlspecialchars(strip_tags($this->id_propietario));
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->direccion = htmlspecialchars(strip_tags($this->direccion));
        $this->tipo_propietario = htmlspecialchars(strip_tags($this->tipo_propietario));

        // Asignar valores
        $stmt->bindParam(":id_propietario", $this->id_propietario);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":direccion", $this->direccion);
        $stmt->bindParam(":tipo_propietario", $this->tipo_propietario);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function obtenerPorId($id_propietario) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_propietario = :id_propietario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_propietario", $id_propietario);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->id_propietario = $row['id_propietario'];
            $this->nombre = $row['nombre'];
            $this->apellido = $row['apellido'];
            $this->telefono = $row['telefono'];
            $this->direccion = $row['direccion'];
            $this->tipo_propietario = $row['tipo_propietario'];
            return true;
        }
        return false;
    }
    public function existe() {
        $query = "SELECT COUNT(*) FROM " . $this->table_name . " WHERE id_propietario = :id_propietario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_propietario", $this->id_propietario);
        $stmt->execute();
    
        return $stmt->fetchColumn() > 0;
    }
    
}
?>
