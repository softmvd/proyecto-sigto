<?php
session_start(); // Iniciar sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: /proyecto-sigto/assets/pages/index.php"); // Redirigir al login si no ha iniciado sesión
    exit();
}

// Obtener los datos del usuario
$usuario = $_SESSION['usuario'];


if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Eliminar todas las variables de session
    $_SESSION = array();

    //Destruir la sesion
    session_destroy();

    //Redirigir al loginsss
    header("Location: /proyecto-sigto/assets/pages/index.php");
    exit();
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
           
            <div class="container-contenido">
                <div><img src="/proyecto-sigto/assets/img/perfil-datos.png" alt="tarjeta-informacion"></div>
                <div>    
                    <h3>Datos de cuenta</h3>
                    <p>Datos que representan a la cuenta de Sigto</p>
                    <form action="#">
                        <div>
                            <p>id Empresa:<?php echo $usuario["id_usuario"] ?></p>
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="<?php echo $usuario["email"] ?>" >
                        </div>
                        <div>
                            <label for="telefono">Telefono:</label>
                            <input type="email" name="email" value="<?php echo "099456559" ?>" >
                        </div>
                    </form>
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
                    <form action=""></form>
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
                    <form action="#">
                        <div>
                            <label for="direccion">Direccion:</label>
                            <input type="text" name="direccion" id="direccion" value="<?php echo "Juan Perez 1625 esq Julio"?>">
                        </div>
                    </form>
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
                    <form action=""></form>
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
                    <form action=""></form>
                </div>
                <div class="flechita">
                    <img src="/proyecto-sigto/assets/img/flecha.png" alt="flecha">
                </div>
            </div>
            <div class="cerrar-sesion">
                <form  method="post">
                    <button type="submit" name="cerrar_sesion">Cerrar sesion</button>    
                </form>
                
            </div>
        </section>
    </article>
</main>
<script src="/proyecto-sigto/assets/js/index.js"></script>
<script src="/proyecto-sigto/assets/js/perfilPersonal.js"></script>
</body>
</html>
