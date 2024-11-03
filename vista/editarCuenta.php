<?php
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/cuentaClienteController.php";

$controlador = new cuentaClienteController();
$id_cuenta = isset($_GET["id_cuenta"]) ? $_GET["id_cuenta"] : null;
$cuenta = $controlador->readOne($id_cuenta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar datos personales</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/vistaEdicionAdmin.css">
</head>
<body>
    <h1>Editar datos personales</h1>
    <form action="../assets/pages/perfilPersonal.php" method="post" enctype="multipart/form-data">
        <!-- Campo oculto para el ID del cuenta  -->
        <input type="hidden" name="id_cuenta" value="<?php echo $cuenta["id_cuenta"]; ?>">

        <label for="telefono">Teléfono:</label>
        <input type="number" name="telefono" value="<?php echo $cuenta["telefono"]; ?>" required><br>
       
        <div>
            <label for="genero">Género:</label>
            <div>
                <label>
                    <input type="radio" name="genero" value="M" <?php echo (isset($cuenta["genero"]) && $cuenta["genero"] == "M") ? "checked" : ""; ?>>
                    Masculino
                </label>
                <label>
                    <input type="radio" name="genero" value="F" <?php echo (isset($cuenta["genero"]) && $cuenta["genero"] == "F") ? "checked" : ""; ?>>
                    Femenino
                </label>
            </div>
        </div>

        <label for="imagen">Imagen:</label>
        <!-- Mostrar la imagen si ya existe -->
        <?php if (!empty($cuenta["imagen"])): ?>
            <div>
                <img src="/proyecto-sigto/assets/img/<?php echo $cuenta["imagen"]; ?>" alt="Imagen de perfil" style="width: 100px; height: 100px;">
                <p>Imagen actual. Si desea cambiarla, elija una nueva.</p>
            </div>
        <?php endif; ?>
        <input type="file" name="imagen"><br>

        <label for="fechaNac">Fecha de nacimiento:</label>
        <input type="date" name="fechaNac" value="<?php echo $cuenta["fechaNac"]; ?>" required><br>
        
        <input type="submit" value="Actualizar">
        <a class="button" href="../assets/pages/perfilPersonal.php">Volver a la lista</a>
    </form>
</body>
</html>
