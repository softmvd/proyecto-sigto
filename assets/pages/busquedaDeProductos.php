<?php
require_once 'C:/xampp/htdocs/sigto/proyecto-sigto/core/ProductoController.php';

session_start();
$usuarioSesion = isset($_SESSION["usuario"])? $_SESSION["usuario"]:null;


$controlador = new ProductoController();

// Aquí inicializamos $productos como un array vacío si no hay POST
$productos = $_SERVER["REQUEST_METHOD"] == "POST" ? $controlador->findByName($_POST) : [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador productos</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/index.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/perfilPersonal.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/productos.css">
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
                <input type="text" name="buscador"> <!-- Poner img lupa dentro del input -->
            </div>
            <div>
                <a href="misCompras.php">Mis compras</a>
            </div>
            <div>
                <a href="perfilEmpresa.php">Mi Cuenta</a>
            </div>
            <div>
                <a href="carrito.php"><img src="/proyecto-sigto/assets/img/shopping-cart (2).png" alt="carrito"></a>
            </div>
        </div>
        <div class="menu-segundo">
            <ul>
                <li><a href="#">Todas las categorias</a></li>
                <li><a href="/proyecto-sigto/assets/pages/ofertasSemanales.html">Ofertas de la semana</a></li>
                <li><a href="#">Como comprar</a></li>
                <li><a href="#">Costos y tarifas</a></li>
                <li><a href="#">Garantia de entrega</a></li>
                <li><a href="/proyecto-sigto/assets/pages/administrar.php">Administrar</a></li>
            </ul>
        </div>
    </header>
    <main>
    <article class="administrar-opciones">
            <section class="buscador-productos">
                <h1>Encuentra tu proxima compra</h1>
                <input type="text" name="buscador" id="busqueda" placeholder="Buscar">
                <select name="filtro" id="filtroTiempo">
                    <optgroup>
                        <option>Todos</option>
                        <option>Este Mes</option>
                        <option >Mes pasado</option>
                        <option>Este año</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                    </optgroup>
                </select>
                <div>
                    <a href="#"> 
                        <input type="button" value="Buscar">
                    </a>
                </div>
            </section>
            
                
                <section class="productos">
                <?php foreach($productos as $producto) {?>
                    <div class="producto-item">
                        <div class="producto-item-1">
                            <div class="imagen-item"><img src="/proyecto-sigto/assets/img/<?php echo $producto["imagen"] ?>" alt="Articulo"></div>
                            <div class="descripcion">
                                
                                <div>
                                    <p>Nombre: <?php echo $producto["nombre"]; ?></p>
                                    <p>Precio: <?php echo $producto["precio"] ?></p>
                                    <p>Descripcion: <?php echo $producto["descripcion"] ?></p>
                                    <p>Unidades:<?php echo $producto["cantidad"] ?></p>
                                </div>
                                <div>
                                    <p>Empresa: <?php echo $producto["email_vendedor"] ?></p>
                                </div>
                            </div>
                        </div>                   
                    </div>
                    <?php }?>
            </section>
            
            
        </article>
    </main>
    <script src="/proyecto-sigto/assets/js/index.js"></script>
</body>