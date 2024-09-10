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
        $this-> conn = $database->getConnection();
    }

      // Getters y Setters para los atributos.
      public function getId() {
        return $this->id; // Retornamos el ID del producto.
    }
    public function setId($id) {
        $this->id = $id; // Asignamos el ID del producto.
    }

    public function getNombre() {
        return $this->nombre; // Retornamos el nombre del producto.
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre; // Asignamos el nombre del producto.
    }

    public function getCantidad() {
        return $this->cantidad; // Retornamos la cantidad del producto.
    }
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad; // Asignamos la cantidad del producto.
    }

    public function getPrecio() {
        return $this->precio; // Retornamos el precio del producto.
    }
    public function setPrecio($precio) {
        $this->precio = $precio; // Asignamos el precio del producto.
    }

    public function getDescripcion() {
        return $this->nombre; // Retornamos la decripcion del producto.
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion; // Asignamos la descripcion del producto.
    }

    public function getMarca() {
        return $this->nombre; // Retornamos la marca del producto.
    }
    public function setMarca($marca) {
        $this->marca = $marca; // Asignamos la marca del producto.
    }

    public function getEstado() {
        return $this->estado; // Retornamos el estado del producto.
    }
    public function setEstado($estado) {
        $this->estado = $estado; // Asignamos el estado del producto.
    }

    public function getEmailVendedor() {
        return $this->nombre; // Retornamos el email del vendedor  del producto.
    }
    public function setEmailVendedor($email_vendedor) {
        $this->email_vendedor = $email_vendedor; // Asignamos el email del vendedor del producto.
    }

    public function getImagen() {
        return $this->imagen; // Retornamos el email del vendedor  del producto.
    }
    public function setImagen($imagen) {
        $this->imagen = $imagen; // Asignamos el email del vendedor del producto.
    }
     // Método para crear un nuevo producto.
     public function crear() {
        // Creamos una consulta SQL para insertar un nuevo registro en la tabla de usuarios.
        $query = "INSERT INTO " . $this->table_name . " SET nombre=?, cantidad=?, precio=?, descripcion=?, marca=?, estado=?, email_vendedor=?, imagen=?";
        
        // Preparamos la consulta SQL.
        $stmt = $this->conn->prepare($query);
        
        // Unimos los valores a los parámetros de la consulta SQL.
        $stmt->bind_param("siisssss", $this->nombre, $this->cantidad, $this->precio, $this->descripcion, $this->marca, $this->estado, $this->email_vendedor, $this->imagen);
        
        // Ejecutamos la consulta y verificamos si se ejecutó correctamente.
        if ($stmt->execute()) {
            return true; // Retornamos true si el producto fue creado exitosamente.
        } else {
            // Manejo de errores: mostramos el error y retornamos false.
            echo "Error: " . $stmt->error;
            return false;
        }
    }
}

?>