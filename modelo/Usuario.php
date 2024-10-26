<?php
    require_once "C:/xampp/htdocs/sigto/proyecto-sigto/conf/database.php";

    class Usuario{
        //Conxion a la base de datos y nombre de la tabla
        private $conn;
        private $table_name= "usuarioCliente";

        //Atributos privados.
        private $id_usuario;
        private $nombre;
        private $apellido;
        private $email;
        private $clave;

        //Constructor para inicializar la conexion a la base de datos
        public function __construct()
        {
            $database = new Database(); 
            $this->conn = $database->getConnection();
        }
        
    // Getters y Setters para los atributos.
    public function getId() {
        return $this->id_usuario; // Retornamos el ID del usuario.
    }

    public function setId($id_usuario) {
        $this->id_usuario = $id_usuario; // Asignamos el ID del usuario.
    }

    public function getEmail() {
        return $this->email; // Retornamos el email del usuario.
    }

    public function setEmail($email) {
        $this->email = $email; // Asignamos el email del usuario.
    }

    public function getNombre() {
        return $this->nombre; // Retornamos el nombre de usuario.
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre; // Asignamos el nombre de usuario.
    }

    

    public function getContraseña() {
        return $this->clave; // Retornamos la contraseña del usuario.
    }

    public function setContraseña($clave) {
        $this->clave = $clave; // Asignamos la contraseña del usuario.
    }

    // Método para crear un nuevo usuario.
    public function create() {
        // Consulta SQL para insertar un nuevo registro
        $query = "INSERT INTO " . $this->table_name . " (nombre, email, clave) VALUES (?, ?, ?)";
        
        // Preparamos la consulta SQL
        $stmt = $this->conn->prepare($query);
        
        // Aplicamos un hash a la contraseña para almacenarla de manera segura
        $hashedPassword = password_hash($this->clave, PASSWORD_DEFAULT);
        
        // Unimos los valores a los parámetros de la consulta SQL
        $stmt->bind_param("sss", $this->nombre, $this->email, $hashedPassword);
        
        // Ejecutamos la consulta y verificamos si se ejecutó correctamente
        if ($stmt->execute()) {
            return true; // Retornamos true si el usuario fue creado exitosamente
        } else {
            // Manejo de errores: mostramos el error y retornamos false
            echo "Error: " . $stmt->error;
            return false;
        }
    }
    
    // Método para leer todos los usuarios.
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        
        if ($result === false) {
            echo "Error en la consulta: " . $this->conn->error;
            return null;
        }
        
        return $result;
    }

    // Método para leer un usuario específico por su ID.
    public function readOne() {
        // Consulta SQL para seleccionar un registro específico por ID.
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_usuario = ? LIMIT 0,1";
        
        // Preparamos la consulta SQL.
        $stmt = $this->conn->prepare($query);
        
        // Unimos el ID al parámetro de la consulta SQL.
        $stmt->bind_param("i", $this->id_usuario);
        
        // Ejecutamos la consulta.
        $stmt->execute();
        
        // Obtenemos el resultado y retornamos el registro como un arreglo asociativo.
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }


    // Método para actualizar un usuario existente.
    public function update() {
        // Consulta SQL para actualizar un registro en la tabla de usuarios.
        $query = "UPDATE " . $this->table_name . " SET email=?,nombre=? , clave=? WHERE id_usuario=?";
        
        // Preparamos la consulta SQL.
        $stmt = $this->conn->prepare($query);
        
        // Aplicamos un hash a la nueva contraseña.
        $hashedPassword = password_hash($this->clave, PASSWORD_DEFAULT);
        
        // Unimos los valores a los parámetros de la consulta SQL.
        $stmt->bind_param("sssi", $this->email, $this->nombre, $hashedPassword, $this->id_usuario);
        
        // Ejecutamos la consulta y retornamos el resultado (true si fue exitoso, false si no lo fue).
        return $stmt->execute();
    }

    // Método para eliminar un usuario por su ID.
    public function delete() {
        // Consulta SQL para eliminar un registro específico por ID.
        $query = "DELETE FROM " . $this->table_name . " WHERE id_usuario = ?";
        
        // Preparamos la consulta SQL.
        $stmt = $this->conn->prepare($query);
        
        // Unimos el ID al parámetro de la consulta SQL.
        $stmt->bind_param("i", $this->id_usuario);
        
        // Ejecutamos la consulta y retornamos el resultado (true si fue exitoso, false si no lo fue).
        return $stmt->execute();
    }
}

?>