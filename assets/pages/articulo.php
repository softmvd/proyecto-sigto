<?php
require_once 'C:/xampp/htdocs/sigto/proyecto-sigto/core/ProductoController.php';
$controlador = new ProductoController();

$id = isset($_GET["id"]) ? $_GET["id"] : null;

$productos = $controlador->readOne($id);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículo - <?php echo $productos["nombre_producto"]; ?></title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/index.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/articulo.css">
</head>
<body>
    <header>
        <div id="logo-sigto">
            <a href="/proyecto-sigto/assets/pages/index.php">
                <img id="logo" src="/proyecto-sigto/assets/img/logo-sigto.png" alt="Logo de Sigto">
            </a>
        </div>
        <nav class="menu-primero">
            <div id="menu">
                <img src="/proyecto-sigto/assets/img/menu (1).png" alt="Menú">
            </div>
            <div id="logo-sigto-dos">
                <a href="/proyecto-sigto/assets/pages/index.php">
                    <img id="logo" src="/proyecto-sigto/assets/img/logo-sigto.png" alt="Logo de Sigto">
                </a>
            </div>
            <div>
                <input type="text" name="buscador" placeholder="Buscar...">
            </div>
            <div id="registro">
                <a href="#">Registrarse</a>
            </div>
            <div>
                <a href="/proyecto-sigto/assets/pages/cuenta.html">Mi Cuenta</a>
            </div>
            <div>
                <a href="carrito.php">
                    <img src="/proyecto-sigto/assets/img/shopping-cart (2).png" alt="Carrito">
                </a>
            </div>
        </nav>
        <div class="op-registro">
            <a href="registrarse.php"><input type="button" value="Cliente"></a>
            <a href=""><input type="button" value="Empresa"></a>
        </div>
        <nav class="menu-segundo">
            <ul>
                <li><a href="#">Todas las categorías</a></li>
                <li><a href="/proyecto-sigto/assets/pages/ofertasSemanales.html">Ofertas de la semana</a></li>
                <li><a href="#">Cómo comprar</a></li>
                <li><a href="#">Costos y tarifas</a></li>
                <li><a href="#">Garantía de entrega</a></li>
                <li><a href="/proyecto-sigto/assets/pages/administrar.php">Administrar</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <article>
            <section class="imagenes-articulo">
                <div>
                    <img src="/proyecto-sigto/assets/img/<?php echo $productos["imagen"] ?>" alt="<?php echo $productos["nombre_producto"]; ?>" class="img-articulo">
                </div>
            </section>
            <section class="descripcion-articulo">
                <p>Nuevo |</p>
                <div>
                    <h3><?php echo $productos["nombre_producto"] ?></h3>
                </div>
                <div>
                    <p><span class="precio">U$S <?php echo $productos["precio"] ?></span></p>
                    <p>en <span class="cuotas">10x $786,20 sin interés</span></p>
                    <p><span class="opciones">Ver los medios de pagos</span></p>
                </div>
                <div>
                    <p>Color: ND</p>
                </div>
                <div class="lo-que-tienes-que-saber">
                    <p>Lo que tienes que saber de este producto:</p>
                    <p><?php echo $productos["descripcion"] ?></p>
                </div>
            </section>
            <section class="opciones-compra">
                <div>
                    <p><span class="cuotas">Llega gratis mañana</span></p>
                    <p>Más formas de entrega</p>
                </div>
                <div>
                    <p><span class="cuotas">Retira gratis</span> a partir del jueves en correos</p>
                    <p>Ver en el mapa</p>
                </div>
                <div>
                    <p>Stock disponible: <?php echo $productos["stock"] ?></p>
                </div>
                <div class="botones">
                    <input type="button" value="Comprar ahora">
                    <a href="carrito.php?id=<?php echo $id ?>"> 
                        <input type="button" value="Agregar al carrito">
                    </a>
                </div>
                <div>
                    <p>Vendido por <span class="opciones"><?php echo $productos["email_vendedor"] ?></span></p>
                    <p>Líder de Mercado | +1000 ventas</p>
                </div>
                <div class="devolucion">
                    <div>
                        <p><span class="opciones">Devolución gratis.</span> Tienes 30 días desde que lo recibes.</p>
                    </div>
                    <div>
                        <p><span class="opciones">Compra Protegida.</span> Se abrirá en una nueva ventana, recibe el producto que esperabas o te devolvemos tu dinero.</p>
                    </div>
                </div>
            </section>
        </article>
    </main>
    <script src="/proyecto-sigto/assets/js/index.js"></script>
</body>
</html>
