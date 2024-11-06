<?php

require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/cuentaClienteController.php";
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/direccionesClienteController.php";

session_start(); // Iniciar sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: /proyecto-sigto/assets/pages/index.php"); // Redirigir al login si no ha iniciado sesión
    exit();
}

// Obtener los datos del usuario
$usuario = $_SESSION['usuario'];

$controller = new cuentaClienteController();
$cuenta = $controller->readOne((int)$usuario["id_usuario"]); // Leer la cuenta del usuario

$controllerDireccion = new direccionesClienteController();
$direccion = $controllerDireccion -> readOne((int)$usuario["id_usuario"]);

$direcciones = $controllerDireccion -> readAll((int)$usuario["id_usuario"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["cerrar_sesion"])) {
        // Eliminar todas las variables de sesión
        $_SESSION = array();
        // Destruir la sesión
        session_destroy();
        // Redirigir al índice
        header("Location: /proyecto-sigto/assets/pages/index.php");
        exit();
    } elseif (isset($_POST["telefono"])) {
        // Lógica para actualizar los datos de la cuenta
        $controller->update($_POST); // Actualizar con los datos del formulario
        $cuenta = $controller->readOne((int)$usuario["id_usuario"]); // Leer de nuevo la cuenta actualizada
    } elseif(isset($_POST["direccion"])){
        $controllerDireccion -> create($_POST);
    } elseif(isset($_POST["id_direccion"])){
        $controllerDireccion -> update($_POST);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $controllerDireccion -> delete(isset($_GET["id_direccion"])? $_GET["id_direccion"] : null);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Empresa</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/index.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/perfilPersonal.css">
</head>
<body>
<header>
    <div id="logo-sigto">
        <a href="/proyecto-sigto/assets/pages/index.php"><img id="logo" src="/proyecto-sigto/assets/img/logo-sigto.png" alt="logo-Sigto"></a>
    </div>
    <div class="menu-primero">
        <div id="menu"> 
            <img src="/proyecto-sigto/assets/img/menu (1).png" alt="menu-burguer">
        </div>
        <div id="logo-sigto-dos">
            <a href="/proyecto-sigto/assets/pages/index.php"><img id="logo" src="/proyecto-sigto/assets/img/logo-sigto.png" alt="logo-Sigto"></a>
        </div>
        <div>
            <input type="text" name="buscador" placeholder="Buscar..."> <!-- Placeholder para el input -->
        </div>
        <div>
            <a href="catalogoEmpresa.php">Catalogo</a>
        </div>
        <div>
            <a href="#">Ventas</a>
        </div>
        <div>
            <a href="cuenta.php">Mi Cuenta</a>
        </div>
    </div>
    <div class="menu-segundo">
        <ul>
            <li><a href="#">Todas las categorías</a></li>
            <li><a href="/proyecto-sigto/assets/pages/ofertasSemanales.html">Ofertas de la semana</a></li>
            <li><a href="#">Cómo comprar</a></li>
            <li><a href="#">Costos y tarifas</a></li>
            <li><a href="#">Garantía de entrega</a></li>
            <li><a href="/proyecto-sigto/assets/pages/administrar.php">Administrar</a></li>
        </ul>
    </div>
</header>
<main>
    <article class="container-info">
        <section class="info">
            <div class="container-contenido">
            <div class="img-perfil"><img src="https://thumbs.dreamstime.com/b/vector-de-icono-perfil-usuario-s%C3%ADmbolo-retrato-avatar-logo-la-persona-forma-plana-silueta-negra-aislada-sobre-fondo-blanco-196482128.jpg" alt="perfil"></div>
                <div>    
                    <h2><?php echo ($usuario['nombreEmpresa']); ?></h2>
                    <p><?php echo ($usuario['email']); ?></p>
                </div>
            </div>
        </section>
    </article>
    <article class="container-info">
        <section class="info">
           
        <article class="container-info">
        <section class="info">
           
            <div class="container-contenido">
                <div><img src="/proyecto-sigto/assets/img/perfil-datos.png" alt="tarjeta-informacion"></div>
                <div class="datos">
    <h3>Datos de cuenta</h3>
    <p>Datos que representan a la cuenta de Mercado Sigto y Sigto Pagos.</p>
    <div class="form">
        <div>
            <p>Nombre: 
                <?php 
                    echo !empty($usuario["nombre"]) ? $usuario["nombre"] : "No disponible";
                ?>
            </p>  
        </div>
        <div>
            <p>Apellido: 
                <?php 
                    echo !empty($usuario["apellido"]) ? $usuario["apellido"] : "No disponible";
                ?>
            </p>
        </div>
        <div>
            <p>Email: 
                <?php 
                    echo !empty($usuario["email"]) ? $usuario["email"] : "No disponible";
                ?>
            </p>
        </div>
    </div>
</div>

                <div class="flechita">
                    <img src="/proyecto-sigto/assets/img/flecha.png" alt="flecha">
                </div>
            </div>
            <div class="container-contenido">
    <div><img src="/proyecto-sigto/assets/img/perfil-datos.png" alt="tarjeta-informacion"></div>
    <div>    
        <h3>Datos Personales</h3>
        <p>Datos que representan a la cuenta de Mercado Sigto y Sigto Pagos.</p>
        <div class="form">
            <div>
                <p>Telefono: 
                    <?php 
                        echo !empty($cuenta["telefono"]) ? $cuenta["telefono"] : "No disponible";
                    ?>
                </p>
            </div>
            <div>
                <p>Genero: 
                    <?php 
                        echo !empty($cuenta["genero"]) ? $cuenta["genero"] : "No disponible";
                    ?>
                </p>
            </div>
            <div>
                <p>Fecha de nacimiento: 
                    <?php 
                        echo !empty($cuenta["fechaNac"]) ? $cuenta["fechaNac"] : "No disponible";
                    ?>
                </p>
            </div>
            <a href="/proyecto-sigto/vista/editarCuenta.php?id_cuenta=<?php echo $cuenta["id_usuario"];?>" >
                <input class="inp-sub" type="button" value="Editar">
            </a>
        </div>
    </div>
    <div class="flechita">
        <img src="/proyecto-sigto/assets/img/flecha.png" alt="flecha">
    </div>
</div>

            <div class="container-contenido">
                <div><img src="/proyecto-sigto/assets/img/tarjeta.png" alt="logo-perfil"></div>
                <div>    
                    <h3>Tarjetas</h3>
                    <p>Tarjetas guardadas en tu cuenta.</p>
                    <div class="form"></div>
                </div>
                <div class="flechita">
                    <img src="/proyecto-sigto/assets/img/flecha.png" alt="flecha">
                </div>
            </div>
            <div class="container-contenido">
                <div><img src="/proyecto-sigto/assets/img/ubicacion.png" alt="ubicacion"></div>
                <div>    
                    <h3>Direcciones</h3>
                    <p>Direcciones guardadas en tu cuenta.</p>
                    <div class="form">
                        <?php foreach($direcciones as $dire){?> 
                            <div class="direccion">
                                <p><?php if($dire["direccionPrincipal"] == 1) echo "✔ "?><?php echo isset($dire["direccion"]) ? $dire["direccion"] : "No hay direccion asignada"; ?> </p>
                                <a href="/proyecto-sigto/vista/editarDireccion.php?id_usuario=<?php echo $cuenta["id_usuario"]; ?>">
                                    <input id="edit-direc" type="button">
                                </a>
                                <a href="/proyecto-sigto/assets/pages/perfilPersonal.php?id_direccion=<?php echo $dire["id_direccion"]; ?>">
                                    <input id="eliminar-direc" type="button">
                                </a>
                            </div>
                        <?php }?>
                        <a href="/proyecto-sigto/vista/agregarDireccion.php?id_usuario=<?php echo $cuenta["id_usuario"];?>" >
                            <input class="inp-sub" type="button" value="Agregar">
                        </a>
                    </div>
                </div>
                <div class="flechita">
                    <img src="/proyecto-sigto/assets/img/flecha.png" alt="flecha">
                </div>
            </div>
            <div class="container-contenido">
                <div><img src="/proyecto-sigto/assets/img/privacidad.png" alt="privacidad"></div>
                <div>    
                    <h3>Privacidad</h3>
                    <p>Preferencias y control sobre el uso de tus datos.</p>
                    <div class="form"></div>
                </div>
                <div class="flechita">
                    <img src="/proyecto-sigto/assets/img/flecha.png" alt="flecha">
                </div>
            </div>
            <div class="container-contenido">
                <div><img src="/proyecto-sigto/assets/img/mensaje.png" alt="mensajes"></div>
                <div>    
                    <h3>Comunicaciones</h3>
                    <p>Elige qué tipo de información quieres recibir.</p>
                    <div class="form"></div>
                </div>
                <div class="flechita">
                    <img src="/proyecto-sigto/assets/img/flecha.png" alt="flecha">
                </div>
            </div>
                <div class="cerrar-sesion">
                <form method="post">
                    <button class="btn-cerrar-sesion" type="submit" name="cerrar_sesion">Cerrar sesión</button>    
                </form>
            </div>
                
            </div>
        </section>
    </article>
</main>
<script src="/proyecto-sigto/assets/js/index.js"></script>
<script src="/proyecto-sigto/assets/js/perfilPersonal.js"></script>

</body>
</html>
