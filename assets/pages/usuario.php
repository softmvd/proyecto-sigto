<?php
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/UsuarioController.php";
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/UsuarioEmpresaController.php";

// Crear una instancia del controlador Usuario
$controller = new UsuarioController();
$controllerEmpresa = new UsuarioEmpresaController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
        $resultado = $controller->create($_POST);

        // Verificar si la creación fue exitosa y redirigir.
        if ($resultado === "Usuario creado exitosamente.") {
            // Redirigir a la página principal.
            header("Location: /proyecto-sigto/assets/pages/index.php");
            exit; // Termina el script para evitar la ejecución adicional.
        } else {
            echo $resultado; // Muestra un mensaje de error si la operación falló.
        }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $resultado = $controllerEmpresa->create($_POST);

        // Verificar si la creación fue exitosa y redirigir.
        if ($resultado === "UsuarioEmpresa creado exitosamente.") {
            // Redirigir a la página principal.
            header("Location: /proyecto-sigto/assets/pages/index.php");
            exit; // Termina el script para evitar la ejecución adicional.
        } else {
            echo $resultado; // Muestra un mensaje de error si la operación falló.
        }
    }
}

$id_usuario = isset($_GET["id"]) ? $_GET['id'] : null;
$id_empresa = isset($_GET["id_usuario"]) ? $_GET['id_usuario'] : null;

$resultado = $controller->delete($id_usuario);
 
$resultadoE = $controllerEmpresa->delete($id_empresa);
   

$usuarios = $controller->readAll();
$usuariosEmpresa = $controllerEmpresa->readAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Usuarios</title>
    <link rel="icon" type="image/x-icon" href="/proyecto-sigto/assets/img/favicon-sigto.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/index.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/administrar.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/usuario.css">
</head>
<body>
    <header>
        <div class="menu-primero">
            <div>
                <a href="/proyecto-sigto/assets/pages/index.php">
                    <img id="logo" src="/proyecto-sigto/assets/img/logo-sigto.png" alt="logo-tiendaMia">
                </a>
            </div>
            <div>
                <p>Bienvenido, Fulanito de Tal.</p>
            </div>
        </div>
    </header>
    <main>
        <div class="menu-lateral">
            <ul>
                <li><a href="usuario.php">Usuarios</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="#">Ventas</a></li>
                <li><a href="#">Descuentos</a></li>
            </ul>
        </div>
        <div class="control">
            <div class="contenedor-control">
                <div class="titulo">
                    <h2 class="deco-btn">Registro Clientes</h2>
                    <h2>Registro Empresas</h2>
                </div>
                <div class="buscar">
                    <div>
                        <p>Buscar por correo</p>
                    </div>
                    <div class="buscador">
                        <input type="text" name="correo" placeholder="Ingrese correo">
                        <input type="button" value="Buscar">
                    </div>
                </div>
                <div class="usuarios">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre de Usuario</th>
                                <th>Email</th>
                               
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($usuarios && $usuarios->num_rows > 0) { ?>
                                <?php while ($usuario = $usuarios->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $usuario['id_usuario']; ?></td>
                                        <td><?php echo $usuario['nombre']; ?></td>
                                        <td><?php echo $usuario['email']; ?></td>
                                        <td>
                                            <a class="button edit" href="/proyecto-sigto/vista/edicionUsuarioAdmin.php?id=<?php echo $usuario['id_usuario']; ?>">Editar</a>
                                            <a class="button delete" href="?id=<?php echo $usuario['id_usuario']; ?>">Eliminar</a> <!-- Enlace para eliminar al usuario -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="5">No se encontraron usuarios.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="usuarios">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre de Empresa</th>
                                <th>Email</th>
                                
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($usuariosEmpresa && $usuariosEmpresa->num_rows > 0) { ?>
                                <?php while ($usuarioEmpresa = $usuariosEmpresa->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $usuarioEmpresa['id_usuario']; ?></td>
                                        <td><?php echo $usuarioEmpresa['nombreEmpresa']; ?></td>
                                        <td><?php echo $usuarioEmpresa['email']; ?></td>
                                        
                                        <td>
                                            <a class="button edit" href="/proyecto-sigto/vista/editarUsuarioEmpresa.php?id_usuario=<?php echo $usuarioEmpresa['id_usuario']; ?>">Editar</a>
                                            <a class="button delete" href="?id_usuario=<?php echo $usuarioEmpresa['id_usuario']; ?>">Eliminar</a> <!-- Enlace para eliminar al usuario empresa -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="5">No se encontraron usuarios empresa.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script src="/proyecto-sigto/assets/js/adminUsuarios.js"></script>
</body>
</html>
