<?php
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/ProductoController.php";

$controlador = new ProductoController();
$id_producto= isset($_GET["id_producto"])? $_GET["id_producto"] : null;
$producto= $controlador->readOne($id_producto);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/vistaEdicionAdmin.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="../assets/pages/productos.php" method="post" enctype="multipart/form-data">
    <!-- Campo oculto para el ID del producto -->
    <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"]; ?>">

    <label for="nombre_producto">Nombre:</label>
    <input type="text" name="nombre_producto" value="<?php echo $producto["nombre_producto"] ?>" required><br>
    <label for="descripcion">Descripcion:</label>
    <input type="text" name="descripcion" value="<?php echo $producto["descripcion"] ?>" required><br>
    <label for="precio">Precio:</label>
    <input type="text" name="precio" value="<?php echo $producto["precio"] ?>" required><br>
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" value="<?php echo $producto["imagen"] ?>">
    <label for="stock">Cantidad:</label>
    <input type="text" name="stock" value="<?php echo $producto["stock"] ?>">
    <label for="disponibilidad">Estado:</label>
    <input type="text" name="disponibilidad" value="<?php echo $producto["disponibilidad"] ?>">
    <input type="submit" value="Actualizar">
    <a class="button" href="../assets/pages/productos.php">Volver a la lista</a>
</form>

</body>
</html>
