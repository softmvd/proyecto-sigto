<?php
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/UsuarioEmpresaController.php";
$controller = new UsuarioEmpresaController();

// Obtenemos el ID del usuarioEmpresa desde la URL
$id_empresa = isset($_GET["id_empresa"]) ? $_GET["id_empresa"] : null;

// Si hay un ID de usuarioEmpresa, obtenemos sus datos
$usuarioEmpresa = $controller->readOne($id_empresa);

// Inicializamos una variable para mostrar mensajes
$message = "";

// Verificamos si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Llamamos a la función de actualización y almacenamos el resultado
    $result = $controller->update($_POST);

    // Verificamos si la actualización fue exitosa
    if ($result) {
        // Redirigimos a la lista de usuarios
        header("Location: /proyecto-sigto/assets/pages/usuario.php");
        exit(); // Asegura que se detenga la ejecución del script
    } else {
        $message = "Error al actualizar el usuarioEmpresa. Por favor, intenta nuevamente.";
    }

    // Obtenemos los datos actualizados del usuarioEmpresa
    $usuarioEmpresa = $controller->readOne($id_empresa);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/vistaEdicionAdmin.css">
</head>
<body>
    <h1>Editar Usuario Empresa</h1>

    <form action="#" method="post">
        <input type="hidden" name="id_empresa" value="<?php echo $usuarioEmpresa['id_empresa']; ?>">
        <label for="text">Email Empresa:</label>
        <input type="text" name="email" value="<?php echo $usuarioEmpresa['email']; ?>" required><br>
        <label for="nombre">Nombre de Empresa:</label>
        <input type="text" name="nombre" value="<?php echo $usuarioEmpresa['nombreEmpresa']; ?>" required><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="clave" required><br>
        <input type="submit" value="Actualizar">
        <a class="button" href="/proyecto-sigto/assets/pages/usuario.php">Volver a la lista</a>
    </form>
    
</body>
</html>
