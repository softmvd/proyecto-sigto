<?php
class Database {
    private $host = "127.0.0.1";
    private $db_name = "sigto";
    private $username = "root";
    private $password = "";
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            // Intentar establecer la conexión a la base de datos.
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

            // Verificar si la conexión tuvo éxito.
            if ($this->conn->connect_error) {
                // Lanzar una excepción si hubo un error en la conexión.
                throw new Exception("Error en la conexión: " . $this->conn->connect_error);
            } else {
                echo "";
            }
        } catch (Exception $e) {
            // Mostrar el mensaje de error si la conexión falló.
            echo $e->getMessage();
        }

        return $this->conn;
    }

    public function closeConnection() {
        if ($this->conn !== null) {
            $this->conn->close();
        }
    }
}

// Uso de la clase Database para verificar la conexión.
$database = new Database();
$connection = $database->getConnection();


?>

