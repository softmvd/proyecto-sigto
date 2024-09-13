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
    $producto->setNombre($_POST['nombre']);
    $producto->setCantidad($_POST['cantidad']);
    $producto->setPrecio($_POST['precio']);
    $producto->setDescripcion($_POST['descripcion']);
    $producto->setMarca($_POST['marca']);
    $producto->setEstado($_POST['estado']);
    $producto->setEmailVendedor($_POST['email']);
    $producto->setImagen($_POST['imagen']);

    if ($producto->crear()) { // Intentamos crear el producto en la base de datos.
        return "Producto creado exitosamente."; // Si la creación fue exitosa, devolvemos un mensaje de éxito.
    } else {
        return "Error al crear un prodcuto."; // Si hubo un error, devolvemos un mensaje de error.
    }
  }

  public function readAll(){
    $producto = new Producto();
    return $producto-> readAll();
  }

  public function readOne($id){
    $producto = new Producto();
    $producto ->setId($id);
    return $producto -> readOne();
  }
  // Método para actualizar un producto existente.
  public function update($data) {
    $producto = new Producto(); // Creamos una nueva instancia del modelo Producto.
    $producto->setId($data['id']);
    $producto->setNombre($data['nombre']);
    $producto->setCantidad($data['cantidad']);
    $producto->setPrecio($data['precio']);
    $producto->setDescripcion($data['descripcion']);
    $producto->setMarca($data['marca']);
    $producto->setEstado($data['estado']);
    $producto->setEmailVendedor($data['email']);
    $producto->setImagen($data['imagen']);

        if ($producto->update()) { // Intentamos actualizar el producto en la base de datos.
        return "Producto actualizado exitosamente."; // Si la actualización fue exitosa, devolvemos un mensaje de éxito.
    } else {
        return "Error al actualizar producto."; // Si hubo un error, devolvemos un mensaje de error.
    }
}
  // Método para eliminar un producto por su ID.
  public function delete($id) {
    $producto = new producto(); // Creamos una nueva instancia del modelo producto.
    $producto->setId($id); // Asignamos el ID del producto que se va a eliminar.
    if ($producto->delete()) { // Intentamos eliminar el producto de la base de datos.
        return "producto eliminado exitosamente."; // Si la eliminación fue exitosa, devolvemos un mensaje de éxito.
    } else {
        return "Error al eliminar producto."; // Si hubo un error, devolvemos un mensaje de error.
    }
}   
}

?>