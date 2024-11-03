<?php
    require_once "C:/xampp/htdocs/sigto/proyecto-sigto/conf/database.php";

    class cuentaCliente {
        private $conn;
        private $table_name = "cuentacliente";

        private $id_cuenta;
        private $telefono;
        private $genero;
        private $fechaNac;
        private $preferenciasComunicacion; // SMS, llamadas, wsap, email.
        private $fecha_registro;
        private $imagen;
        private $id_usuario;

        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        // Getters y Setters para cada atributo

        public function getImagen() {
            return $this->imagen;
        }
        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }

        public function getIdCuenta() {
            return $this->id_cuenta;
        }
        public function setIdCuenta($idCuenta) {
            $this->id_cuenta = $idCuenta;
        }
        

        public function getTelefono() {
            return $this->telefono;
        }
        public function setTelefono($tel) {
            $this->telefono = $tel;
        }

        public function getGenero() {
            return $this->genero;
        }
        public function setGenero($gen) {
            $this->genero = $gen;
        }

        public function getFechaNac() {
            return $this->fechaNac;
        }
        public function setFechaNac($fecha) {
            $this->fechaNac = $fecha;
        }

        public function getPreferenciasComunicacion() {
            return $this->preferenciasComunicacion;
        }
        public function setPreferenciasComunicacion($preferencias) {
            $this->preferenciasComunicacion = $preferencias;
        }

        public function getFechaRegistro() {
            return $this->fecha_registro;
        }
        public function setFechaRegistro($fechaRegistro) {
            $this->fecha_registro = $fechaRegistro;
        }

        public function getIdUsuario() {
            return $this->id_usuario;
        }
        public function setIdUsuario($idUsuario) {
            $this->id_usuario = $idUsuario;
        }
        
        public function create() {
            // Consulta SQL para insertar un nuevo registro en cuentaCliente
            $query = "INSERT INTO " . $this->table_name . " (id_usuario) VALUES (?)";
            
            // Preparamos la consulta SQL
            $stmt = $this->conn->prepare($query);

            // Unimos los valores a los parámetros de la consulta SQL
            $stmt->bind_param("i",$this->id_usuario);
            
            // Ejecutamos la consulta y verificamos si se ejecutó correctamente
            if ($stmt->execute()) {
                return true; // Retornamos true si la cuenta fue creada exitosamente
            } else {
                // Manejo de errores: mostramos el error y retornamos false
                echo "Error: " . $stmt->error;
                return false;
            }
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
   // Método para obtener la imagen actual
   public function getImagenActual() {
    $query = "SELECT imagen FROM " . $this->table_name . " WHERE id_cuenta = ? LIMIT 0,1";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $this->id_cuenta);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    // Depuración: imprimir imagen actual
    echo "Imagen actual obtenida: " . ($data ? $data['imagen'] : "No existe") . "\n";

    return $data ? $data['imagen'] : null;
}

  // Método para actualizar el cuentaCliente existente en el modelo.
public function update() {
    // Consulta SQL para actualizar un registro en la tabla de cuentaClientes.
    $query = "UPDATE " . $this->table_name . " SET telefono=?, genero=?, fechaNac=?, preferenciasComunicacion=?, imagen=? WHERE id_cuenta=?";
    
    // Preparamos la consulta SQL.
    $stmt = $this->conn->prepare($query);
    
    // Unimos los valores a los parámetros de la consulta SQL.
    // Asegúrate de que tienes la variable preferenciasComunicacion correctamente definida en tu clase.
    $stmt->bind_param("sssssi", $this->telefono, $this->genero, $this->fechaNac, $this->preferenciasComunicacion,$this->imagen ,$this->id_cuenta);
    
    // Ejecutamos la consulta y retornamos el resultado (true si fue exitoso, false si no lo fue).
    return $stmt->execute();
}
    }
?>

