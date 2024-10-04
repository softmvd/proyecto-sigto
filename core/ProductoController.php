<?php
require "C:/xampp/htdocs/sigto/proyecto-sigto/modelo/Producto.php";

class ProductoController {

    // Método para crear un nuevo producto.
    public function crear($data) {
        $producto = new Producto();

        // Verifica la existencia de cada clave antes de acceder
        $producto->setNombre(isset($data['nombre']) ? $data['nombre'] : null);
        $producto->setCantidad(isset($data['cantidad']) ? $data['cantidad'] : null);
        $producto->setPrecio(isset($data['precio']) ? $data['precio'] : null);
        $producto->setDescripcion(isset($data['descripcion']) ? $data['descripcion'] : null);
        $producto->setMarca(isset($data['marca']) ? $data['marca'] : null);
        $producto->setEstado(isset($data['estado']) ? $data['estado'] : null);
        $producto->setEmailVendedor(isset($data['email']) ? $data['email'] : null);
        $producto->setImagen(isset($data['imagen']) ? $data['imagen'] : null);

       // Guardar la imagen
           // Obtener la información del archivo
$archivoImagen = $_FILES['imagen'];
$nombreOriginal = $archivoImagen['name'];
$tipoArchivo = $archivoImagen['type'];
$nombreTemporal = $archivoImagen['tmp_name'];
$tamañoArchivo = $archivoImagen['size'];

// Extensiones permitidas
$extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
$extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));

// Validar la extensión del archivo
if (in_array($extension, $extensionesPermitidas)) {
    // Generar un nombre único para la imagen
    $nombreImagenUnico = uniqid('img_', true) . '.' . $extension;
    $rutaImagen = 'C:/xampp/htdocs/sigto/proyecto-sigto/assets/img/' . $nombreImagenUnico;
    
    // Validar tamaño del archivo (ejemplo: máximo 2MB)
    $tamañoMaximo = 2 * 1024 * 1024; // 2MB
    if ($tamañoArchivo > $tamañoMaximo) {
        die("El archivo excede el tamaño máximo permitido de 2MB.");
    }
    
    // Mover el archivo a la carpeta de destino
    if (move_uploaded_file($nombreTemporal, $rutaImagen)) {
        // Asignar la imagen al producto y guardar en la base de datos
        $producto->setImagen($nombreImagenUnico);
        $producto->crear();
        echo "Imagen subida y producto guardado correctamente.";
    } else {
        die("Error al mover la imagen.");
    }
} else {
    die("Formato de imagen no permitido. Solo se permiten JPG, JPEG, PNG y GIF.");
}
    }


    // Método para obtener todos los productos.
    public function readAll() {
        $producto = new Producto();
        $result = $producto->readAll();

        if ($result) {
            return $result; // Retorna el resultado completo.
        } else {
            return false; // Maneja el error en caso de fallo.
        }
    }

    // Método para leer productos por el correo del vendedor.
    public function leerPorCorreo($email_vendedor) {
        $producto = new Producto();
        $producto->setEmailVendedor($email_vendedor);
        return $producto->leerPorCorreo();
    }

    // Método para buscar productos por el nombre.
    public function findByName($nombre) {
        $producto = new Producto();
        $producto->setNombre($nombre);
        return $producto->findByName();
    }

    // Método para leer un producto específico por ID.
    public function readOne($id) {
        $producto = new Producto();
        $producto->setId($id);
        return $producto->readOne();
    }

    // Método para actualizar un producto existente.
    public function update($data) {
        $producto = new Producto();

        // Verifica la existencia de cada clave antes de acceder
        $producto->setId(isset($data['id']) ? $data['id'] : null);
        $producto->setNombre(isset($data['nombre']) ? $data['nombre'] : null);
        $producto->setCantidad(isset($data['cantidad']) ? $data['cantidad'] : null);
        $producto->setPrecio(isset($data['precio']) ? $data['precio'] : null);
        $producto->setDescripcion(isset($data['descripcion']) ? $data['descripcion'] : null);
        $producto->setMarca(isset($data['marca']) ? $data['marca'] : null);
        $producto->setEstado(isset($data['estado']) ? $data['estado'] : null);
        $producto->setEmailVendedor(isset($data['email']) ? $data['email'] : null);
           // Si se ha subido una nueva imagen, actualizamos el nombre
           if ($_FILES['imagen']['name']) {
            $nombreImagen = $_FILES['imagen']['name'];
            $rutaImagen = 'C:/xampp/htdocs/sigto/proyecto-sigto/assets/img/' . $nombreImagen;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);
            $producto->setImagen($nombreImagen);
        } else {
            // Si no se sube una nueva imagen, conservamos la imagen actual
            $producto->setImagen($_POST['imagen']);
        }

        $producto->update();
    }


    // Método para eliminar un producto por ID.
    public function delete($id) {
        $producto = new Producto();
        $producto->setId($id);

        if ($producto->delete()) {
            return "Producto eliminado exitosamente.";
        } else {
            return "Error al eliminar el producto.";
        }
    }
}
