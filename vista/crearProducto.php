<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto| Admin</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/vistaEdicionAdmin.css">
</head>
<body>
    <h1>Crear Producto</h1>
    <form action="../assets/pages/productos.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" required><br>
        
        <label for="precio">Precio:</label>
        <input type="text" name="precio" required><br>
        
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen"><br>
        
        <label for="email">Email Vendedor:</label>
        <input type="email" name="email"><br>
        
        <label for="marca">Marca:</label>
        <input type="text" name="marca"><br>
        
        <label for="cantidad">Cantidad:</label>
        <input type="text" name="cantidad"><br>
        
        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
            <option value="ACTIVO">ACTIVO</option>
            <option value="INACTIVO">INACTIVO</option>
        </select><br>
        
        <input type="submit" value="Crear">
        <a class="button" href="../assets/pages/productos.php">Volver a la lista</a>
    </form>
</body>
</html>
