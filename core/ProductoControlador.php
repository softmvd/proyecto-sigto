<?php
// Incluimos el modelo Producto.
if (file_exists('C:/xampp/htdocs/sigto/proyecto-sigto/modelo/Producto.php')) {
    require_once 'C:/xampp/htdocs/sigto/proyecto-sigto/modelo/Producto.php';
} else {
    die('El archivo Producto.php no se encontró en la ruta especificada.');
}

class ProductoControlador{
  public function crear($data){
    $producto = new Producto();
    $producto->setNombre($data["nombre"]);
    $producto->setCantidad($data["cantidad"]);
    $producto->setPrecio($data["precio"]);
    $producto->setDescripcion($data["descripcion"]);
    $producto->setMarca($data["marca"]);
    $producto->setEstado($data["estado"]);
    $producto->setEmailVendedor($data["email"]);
    $producto->setImagen($data["imagen"]);
    if ($producto->crear()) { // Intentamos crear el usuario en la base de datos.
        return "Producto creado exitosamente."; // Si la creación fue exitosa, devolvemos un mensaje de éxito.
    } else {
        return "Error al crear un prodcuto."; // Si hubo un error, devolvemos un mensaje de error.
    }
  }
}

?>