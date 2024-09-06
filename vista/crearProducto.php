<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/vistaEdicionAdmin.css">
</head>
<body>
    <h1>Crear Producto</h1>
    <form action="?action=create" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="descripcion">Descripcion:</label>
        <input type="text" name="descripcion" required><br>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" required><br>
        <label for="imagen">Imagen:</label>
        <input type="text" name="imagen" required><br>
        <label for="email">Email vendedor:</label>
        <input type="email" name="email" >
        <label for="marca">Marca:</label>
        <input type="text" name="marca">
        <label for="cantidad">Cantidad:</label>
        <input type="text" name="cantidad">
        <label for="estado">Estado</label>
        <input type="text" name="estado">
        <input type="submit" value="Crear">
        <a class="button" href="../assets/pages/productos.php">Volver a la lista</a>
    </form>
    
</body>
</html>
