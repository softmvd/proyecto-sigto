<?php
require "C:/xampp/htdocs/sigto/proyecto-sigto/conf/database.php";

class Producto{
    private $conn;
    private $table_name = "productos";

    private $id;
    private $nombre;
    private $cantidad;
    private $precio;
    private $descripcion;
    private $marca;
    private $estado;
    private $email_vendedor;
    private $imagen;
    
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Getters y Setters para los atributos.
    public function getId() {
        return $this->id; 
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getCantidad() {
        return $this->cantidad;
    }
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getPrecio() {
        return $this->precio;
    }
    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getDescripcion() {
        return $this->descripcion; // Corregido para retornar la descripción correcta.
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getMarca() {
        return $this->marca; // Corregido para retornar la marca correcta.
    }
    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getEstado() {
        return $this->estado;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getEmailVendedor() {
        return $this->email_vendedor; // Corregido para retornar el email del vendedor correcto.
    }
    public function setEmailVendedor($email_vendedor) {
        $this->email_vendedor = $email_vendedor;
    }

    public function getImagen() {
        return $this->imagen;
    }
    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    // Método para crear un nuevo producto.
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=?, cantidad=?, precio=?, descripcion=?, marca=?, estado=?, email_vendedor=?, imagen=?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("siisssss", $this->nombre, $this->cantidad, $this->precio, $this->descripcion, $this->marca, $this->estado, $this->email_vendedor, $this->imagen);
        
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    public function readAll(){
        $query = "SELECT * FROM " . $this->table_name; 
        $result = $this->conn->query($query);
        
        if($result === false){
            echo "Error en la consulta: " . $this->conn->error;
            return null;
        } else {
            return $result;
        }
    }

    public function leerPorCorreo() {
        // Asegúrate de agregar un espacio antes de "WHERE"
        $query = "SELECT * FROM " . $this->table_name . " WHERE email_vendedor = ?";
        $stmt = $this->conn->prepare($query);
        
        // Verifica si la preparación fue exitosa
        if ($stmt === false) {
            die("Error al preparar la SQL: " . $this->conn->error);
        }
    
        // Vincula el parámetro
        $stmt->bind_param("s", $this->email_vendedor);
        
        // Ejecuta la consulta
        if (!$stmt->execute()) {
            echo "Error al ejecutar la consulta: " . $stmt->error;
            return []; // Retorna un array vacío en caso de error
        }
    
        // Obtén el resultado
        $result = $stmt->get_result();
        
        // Crea un array para almacenar todos los registros
        $productos = [];
        
        // Almacena cada fila en el array
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row; // Agrega cada producto al array
        }
    
        return $productos; // Retorna el array de productos
    }

    public function findByName(){
        // Definir la consulta SQL con LIKE para búsqueda parcial
        $query = "SELECT * FROM " . $this->table_name . " WHERE LOWER(nombre) LIKE ?";
    
        // Preparar la consulta
        $stmt = $this->conn->prepare($query);
    
        // Verificar si la preparación de la consulta fue exitosa
        if(!$stmt) {
            die("Error al preparar la consulta: " . $this->conn->error);
        }
    
        // Agregar los comodines para la búsqueda
        $buscarTermino = strtolower($this->nombre) . "%";
        $stmt->bind_param("s", $buscarTermino);
    
        // Ejecutar la consulta
        if(!$stmt->execute()){
            echo "Error al ejecutar la consulta: " . $stmt->error;
            return [];
        }
    
        // Obtener el resultado de la consulta
        $result = $stmt->get_result();
    
        // Crear un array para almacenar todos los registros
        $productos = [];
    
        // Almacenar cada fila en el array
        while($row = $result->fetch_assoc()){
            $productos[] = $row; // Agregar producto al array
        }
    
        // Retornar el array de productos
        return $productos;
    }
    
    
    

    public function readOne() {
        // Corregimos la consulta SQL agregando los espacios y ajustando la cláusula WHERE
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
    
        // Preparamos la consulta
        $stmt = $this->conn->prepare($query);
    
        // Verificamos si la consulta fue preparada correctamente
        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->conn->error);
        }
    
        // Unimos el ID al parámetro de la consulta
        $stmt->bind_param("i", $this->id);
    
        // Ejecutamos la consulta
        $stmt->execute();
    
        // Obtenemos el resultado y retornamos el registro como un arreglo asociativo
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

        // Método para actualizar un producto existente.
        public function update() {
            // Consulta SQL para actualizar un registro en la tabla de productos, usando un identificador (ej. id).
            $query = "UPDATE " . $this->table_name . " SET nombre=?, cantidad=?, precio=?, descripcion=?, marca=?, estado=?, email_vendedor=?, imagen=? WHERE id=?";
            
            // Preparamos la consulta SQL.
            $stmt = $this->conn->prepare($query);
            
            // Unimos los valores a los parámetros de la consulta SQL.
            $stmt->bind_param("siisssssi", $this->nombre, $this->cantidad, $this->precio, $this->descripcion, $this->marca, $this->estado, $this->email_vendedor, $this->imagen, $this->id);
            
            // Ejecutamos la consulta y retornamos el resultado (true si fue exitoso, false si no lo fue).
            return $stmt->execute();
        }
        
       
        

        public function delete() {
            // Consulta SQL para eliminar un registro específico por ID.
            $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
            
            // Preparamos la consulta SQL.
            $stmt = $this->conn->prepare($query);
            
            // Unimos el ID al parámetro de la consulta SQL.
            $stmt->bind_param("i", $this->id);
            
            // Ejecutamos la consulta y retornamos el resultado (true si fue exitoso, false si no lo fue).
            return $stmt->execute();
        }
    
}
?>
