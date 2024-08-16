<?php
session_start();
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
                <a href="/proyecto-sigto/assets/pages/index.html">
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
                <li><a href="#">Usuarios</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Ventas</a></li>
                <li><a href="#">Descuentos</a></li>
            </ul>
        </div>
        <div class="control">
            <div class="contenedor-control">
                <div class="titulo">
                    <h2>Registro de Usuarios</h2>
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
                <div class="barra-datos">
                    <ul>
                        <li>Nombre</li>
                        <li>Apellido</li>
                        <li>Email</li>
                        <li>Clave</li>
                    </ul>
                </div>
                <div class="usuarios">
                    <?php          
                    if (isset($_SESSION['usuarios']) && !empty($_SESSION['usuarios'])) {
                        foreach ($_SESSION['usuarios'] as $key => $usuario) {
                            echo "<div>";
                            echo "    <ul>";
                            foreach ($usuario as $campo => $valor) {
                                echo "        <li>$valor</li>";
                            }
                             echo   '<li><img src="/proyecto-sigto/assets/img/menu (4).png" alt="menu"></li>'; 
                            echo "    </ul>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
