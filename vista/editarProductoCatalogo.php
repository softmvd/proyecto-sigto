<?php
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/ProductoController.php";

$controlador = new ProductoController();
$id_producto= isset($_GET["id"])? $_GET["id"] : null;
$producto= $controlador->readOne($id_producto);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto| Catalogo</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/vistaEdicionAdmin.css">
</head>
<body>
    <h1>Editar producto</h1>
    <form action="../assets/pages/catalogoEmpresa.php" method="post" enctype="multipart/form-data">
    <!-- Campo oculto para el ID del producto -->
    <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"]; ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $producto["nombre_producto"] ?>" required><br>
    <label for="descripcion">Descripcion:</label>
    <input type="text" name="descripcion" value="<?php echo $producto["descripcion"] ?>" required><br>
    <label for="precio">Precio:</label>
    <input type="text" name="precio" value="<?php echo $producto["precio"] ?>" required><br>
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" value="<?php echo $producto["imagen"] ?>">
    <label for="email">Email vendedor:</label>
    <input type="email" name="email" value="<?php echo $producto["email_vendedor"] ?>">
    <label for="marca">Marca:</label>
    <input type="text" name="marca" value="<?php echo $producto["marca"] ?>">
    <label for="cantidad">Cantidad:</label>
    <input type="text" name="cantidad" value="<?php echo $producto["stock"] ?>">
    <label for="estado">Estado:</label>
    <input type="text" name="estado" value="<?php echo $producto["disponibilidad"] ?>">
    <input type="submit" value="Actualizar">
    <a class="button" href="../assets/pages/catalogoEmpresa.php">Volver a la lista</a>
</form>

</body>
</html>
