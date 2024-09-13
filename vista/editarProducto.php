<?php
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/ProductoControlador.php";

$controlador = new ProductoControlador();
$id= isset($_GET["id"])? $_GET["id"] : null;
$producto= $controlador->readOne($id);

// Inicializamos una variable para mostrar mensajes
$message = "";

// Verificamos si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Llamamos a la función de actualización y almacenamos el resultado
    $result = $controlador->update($_POST);

    // Verificamos si la actualización fue exitosa
    if ($result) {
        // Redirigimos a la lista de usuarios
        header("Location: /proyecto-sigto/assets/pages/producto.php");
        exit(); // Asegura que se detenga la ejecución del script
    } else {
        $message = "Error al actualizar el usuario. Por favor, intenta nuevamente.";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/vistaEdicionAdmin.css">
</head>
<body>
    <h1>Crear Producto</h1>
    <form action="../assets/pages/productos.php" method="post">
    <!-- Campo oculto para el ID del producto -->
    <input type="hidden" name="id" value="<?php echo $producto["id"]; ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $producto["nombre"] ?>" required><br>
    <label for="descripcion">Descripcion:</label>
    <input type="text" name="descripcion" value="<?php echo $producto["descripcion"] ?>" required><br>
    <label for="precio">Precio:</label>
    <input type="text" name="precio" value="<?php echo $producto["precio"] ?>" required><br>
    <label for="imagen">Imagen:</label>
    <input type="text" name="imagen" value="<?php echo $producto["imagen"] ?>">
    <label for="email">Email vendedor:</label>
    <input type="email" name="email" value="<?php echo $producto["email_vendedor"] ?>">
    <label for="marca">Marca:</label>
    <input type="text" name="marca" value="<?php echo $producto["marca"] ?>">
    <label for="cantidad">Cantidad:</label>
    <input type="text" name="cantidad" value="<?php echo $producto["cantidad"] ?>">
    <label for="estado">Estado:</label>
    <input type="text" name="estado" value="<?php echo $producto["estado"] ?>">
    <input type="submit" value="Actualizar">
    <a class="button" href="../assets/pages/productos.php">Volver a la lista</a>
</form>

</body>
</html>
