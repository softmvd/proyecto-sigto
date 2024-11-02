<?php
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/conf/database.php";

class UsuarioEmpresa {
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "usuarioEmpresa";

    // Atributos privados
    private $id_usuario;
    private $nombreEmpresa;
    private $email;
    private $clave;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Getters y Setters para los atributos
    public function getId() {
        return $this->id_usuario; // Retornamos el ID del usuario Empresa
    }

    public function setId($id_usuario) {
        $this->id_usuario = $id_usuario; // Asignamos el ID del usuario Empresa
    }

    public function getEmail() {
        return $this->email; // Retornamos el email del usuario Empresa
    }

    public function setEmail($email) {
        $this->email = $email; // Asignamos el email del usuario Empresa
    }

    public function getNombre() {
        return $this->nombreEmpresa; // Retornamos el nombreEmpresa del usuario Empresa
    }

    public function setNombre($nombreEmpresa) {
        $this->nombreEmpresa = $nombreEmpresa; // Asignamos el nombreEmpresa del usuario Empresa
    }

    public function getContraseña() {
        return $this->clave; // Retornamos la contraseña del usuario Empresa
    }

    public function setContraseña($clave) {
        $this->clave = $clave; // Asignamos la contraseña del usuario Empresa
    }

    // Método para crear un nuevo usuario Empresa
    public function create() {
        // Verificamos que los atributos no sean nulos
        if (empty($this->nombreEmpresa) || empty($this->email) || empty($this->clave)) {
            echo "Error: Todos los campos son obligatorios.";
            return false;
        }

        // Creamos una consulta SQL para insertar un nuevo registro
        $query = "INSERT INTO " . $this->table_name . " SET nombreEmpresa=?, email=?, clave=?";
        
        // Preparamos la consulta SQL
        $stmt = $this->conn->prepare($query);

        // Aplicamos un hash a la contraseña para almacenarla de manera segura
        $hashedPassword = password_hash($this->clave, PASSWORD_DEFAULT);
        
        // Unimos los valores a los parámetros de la consulta SQL
        $stmt->bind_param("sss", $this->nombreEmpresa, $this->email, $hashedPassword);
        
        // Ejecutamos la consulta y verificamos si se ejecutó correctamente
        if ($stmt->execute()) {
            return true; // Retornamos true si el usuario Empresa fue creado exitosamente
        } else {
            // Manejo de errores: mostramos el error y retornamos false
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    // Método para leer todos los usuarios
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        
        if ($result === false) {
            echo "Error en la consulta: " . $this->conn->error;
            return null;
        }
        
        return $result;
    }

    // Método para leer un usuario Empresa específico por su ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_usuario=? LIMIT 0,1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id_usuario);
        $stmt->execute();
        
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Método para actualizar un usuario Empresa existente
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET email=?, nombreEmpresa=?, clave=? WHERE id_usuario=?";
        
        $stmt = $this->conn->prepare($query);
        
        // Aplicamos un hash a la nueva contraseña
        $hashedPassword = password_hash($this->clave, PASSWORD_DEFAULT);
        
        // Unimos los valores a los parámetros de la consulta SQL
        $stmt->bind_param("sssi", $this->email, $this->nombreEmpresa, $hashedPassword, $this->id_usuario);
        
        return $stmt->execute();
    }

    // Método para eliminar un usuario Empresa por su ID
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_usuario = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id_usuario);
        
        return $stmt->execute();
    }
}
?>
