<?php
    require_once "C:/xampp/htdocs/sigto/proyecto-sigto/conf/database.php";

    class cuentaCliente {
        private $conn;
        private $table_name = "cuentacliente";

        private $id_cuenta;
        private $telefono;
        private $genero;
        private $fechaNac;
        private $preferenciasComunicacion;
        private $fecha_registro;
        private $id_usuario;

        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        // Getters y Setters para cada atributo

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

    }
?>

