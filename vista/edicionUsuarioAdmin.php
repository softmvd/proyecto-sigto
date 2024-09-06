<?php
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/UsuarioController.php";
$controller = new UsuarioController();

// Obtenemos el ID del usuario desde la URL
$id_usuario = isset($_GET["id"]) ? $_GET["id"] : null;

// Si hay un ID de usuario, obtenemos sus datos
$usuario = $controller->readOne($id_usuario);

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
        $message = "Error al actualizar el usuario. Por favor, intenta nuevamente.";
    }

    // Obtenemos los datos actualizados del usuario
    $usuario = $controller->readOne($id_usuario);
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
    <h1>Editar Usuario</h1>

    <!-- Mostrar mensajes de retroalimentación -->
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="#" method="post">
        <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required><br>
        <label for="nombreUsuario">Nombre de Usuario:</label>
        <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="clave" required><br>
        <input type="submit" value="Actualizar">
        <a class="button" href="/proyecto-sigto/assets/pages/usuario.php">Volver a la lista</a>
    </form>
    
</body>
</html>
