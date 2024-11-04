<?php
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/conf/database.php";

class DireccionEnvio {
    private $conn;
    private $table_name = "direccionenvio";

    private $id_direccion;
    private $id_usuario;
    private $direccion;
    private $ciudad;
    private $provincia;
    private $codigoPostal;
    private $pais;
    private $direccionPrincipal;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Getters y Setters para cada atributo
    public function getIdDireccion() {
        return $this->id_direccion;
    }
    public function setIdDireccion($idDireccion) {
        $this->id_direccion = $idDireccion;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }
    public function setIdUsuario($idUsuario) {
        $this->id_usuario = $idUsuario;
    }

    public function getDireccion() {
        return $this->direccion;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getCiudad() {
        return $this->ciudad;
    }
    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    public function getProvincia() {
        return $this->provincia;
    }
    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function getCodigoPostal() {
        return $this->codigoPostal;
    }
    public function setCodigoPostal($codigoPostal) {
        $this->codigoPostal = $codigoPostal;
    }

    public function getPais() {
        return $this->pais;
    }
    public function setPais($pais) {
        $this->pais = $pais;
    }

    public function isDireccionPrincipal() {
        return $this->direccionPrincipal;
    }
    public function setDireccionPrincipal($direccionPrincipal) {
        $this->direccionPrincipal = $direccionPrincipal;
    }

    // Método para crear una nueva dirección de envío
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (id_usuario, direccion, ciudad, provincia, codigoPostal, pais, direccionPrincipal) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("isssssi", $this->id_usuario, $this->direccion, $this->ciudad, $this->provincia, $this->codigoPostal, $this->pais, $this->direccionPrincipal);
        
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    // Método para leer una dirección de envío específica por su ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_usuario = ? LIMIT 0,1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id_direccion);
        $stmt->execute();
        
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Método para leer todas las direcciones de envío por el ID de usuario
public function readAll($userId) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id_usuario = ?";
    
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    // Crear un array para almacenar las direcciones
    $direcciones = [];
    
    // Recuperar todas las filas y almacenarlas en el array
    while ($row = $result->fetch_assoc()) {
        $direcciones[] = $row;
    }
    
    return $direcciones; // Devolver todas las direcciones
}


    // Método para actualizar una dirección de envío
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET direccion=?, ciudad=?, provincia=?, codigoPostal=?, pais=?, direccionPrincipal=? WHERE id_direccion=?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssii", $this->direccion, $this->ciudad, $this->provincia, $this->codigoPostal, $this->pais, $this->direccionPrincipal, $this->id_direccion);
        
        return $stmt->execute();
    }


    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_direccion = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id_direccion);
        
        return $stmt->execute();
    }
    
}
?>
