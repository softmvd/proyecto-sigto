<?php
    require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/direccionesClienteController.php";  
    $id_usuario = isset($_GET["id_usuario"])? $_GET["id_usuario"] : null;


    $controllerDireccion = new direccionesClienteController();
    $direccion = $controllerDireccion -> readOne($id_usuario);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Dirección de Envío | Admin</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/vistaEdicionAdmin.css">
</head>
<body>
    <h1>Actualizar Dirección de Envío</h1>
    <form action="../assets/pages/perfilPersonal.php" method="post">
        
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

    
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="<?php echo $direccion["direccion"]?>" required><br>
        
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" value="<?php echo $direccion["ciudad"]?>" required><br>
        
        <label for="provincia">Provincia:</label>
        <input type="text" name="provincia" value="<?php echo $direccion["provincia"]?>" required><br>
        
        <label for="codigoPostal">Código Postal:</label>
        <input type="text" name="codigoPostal" value="<?php echo $direccion["codigoPostal"]?>" required><br>
        
        <label for="pais">País:</label>
        <input type="text" name="pais" value="<?php echo $direccion["pais"]?>" required><br>
        
        <label for="direccionPrincipal">¿Dirección Principal?</label>
        <select name="direccionPrincipal" id="direccionPrincipal">
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select><br>
        
        <input type="submit" value="Actualizar Dirección">
        <a class="button" href="../assets/pages/perfilPersonal.php">Volver a la lista</a>
    </form>
</body>
</html>
