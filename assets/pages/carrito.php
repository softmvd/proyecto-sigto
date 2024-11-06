<?php
require_once 'C:/xampp/htdocs/sigto/proyecto-sigto/core/ProductoController.php';
// Iniciar la sesión
session_start();

// Verificar y corregir la variable de sesión para asegurar que sea un arreglo
if (!isset($_SESSION['carritoIDS']) || !is_array($_SESSION['carritoIDS'])) {
    $_SESSION['carritoIDS'] = []; // Inicializar como un arreglo vacío si no existe o no es un arreglo
}

// Capturar el parámetro de eliminación y borrar el producto del carrito
if (isset($_GET['eliminar_id']) && is_numeric($_GET['eliminar_id'])) {
    $idEliminar = (int)$_GET['eliminar_id'];
    if (($key = array_search($idEliminar, $_SESSION['carritoIDS'])) !== false) {
        unset($_SESSION['carritoIDS'][$key]);
        $_SESSION['carritoIDS'] = array_values($_SESSION['carritoIDS']); // Reindexar el array
    }
}

// Obtener el número enviado por GET y añadirlo al array de sesión
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    $_SESSION['carritoIDS'][] = $id; // Agregar el número al array de sesión
}

$arrayIDs = isset($_SESSION['carritoIDS']) ? $_SESSION['carritoIDS'] : [];

// Crear una instancia del controlador de productos
$controller = new ProductoController();

// Inicializar el array de productos
$arrayProductos = [];

// Recorrer el array de IDs y obtener cada producto
foreach ($arrayIDs as $id) {
    $producto = $controller->readOne($id);
    if ($producto) { // Verificar que se obtuvo un producto válido
        $arrayProductos[] = $producto;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/index.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/perfilPersonal.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/productos.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/carrito.css">
</head>

<body>
    <header>
        <div id="logo-sigto">
            <a href="/proyecto-sigto/assets/pages/index.php">
                <img id="logo" src="/proyecto-sigto/assets/img/logo-sigto.png" alt="logo-Sigto">
            </a>
        </div>
        <div class="menu-primero">
            <div id="menu">
                <img src="/proyecto-sigto/assets/img/menu (1).png" alt="menu-burguer">
            </div>
            <div id="logo-sigto-dos">
                <a href="/proyecto-sigto/assets/pages/index.php">
                    <img id="logo" src="/proyecto-sigto/assets/img/logo-sigto.png" alt="logo-Sigto">
                </a>
            </div>
            <div>
                <input type="text" name="buscador">
            </div>
            <div>
                <a href="misCompras.php">Mis Compras</a>
            </div>
            <div>
                <a href="/proyecto-sigto/assets/pages/cuenta.html">Mi Cuenta</a>
            </div>
            <div class="carrito">
                <a href="carrito.php">
                   <p></p><img src="/proyecto-sigto/assets/img/shopping-cart (2).png" alt="carrito">
                </a>
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
    <article class="administrar-opciones">
            <?php foreach ($arrayProductos as $producto) { ?>
            <section class="productos">
                <div class="producto-item">
                    <div class="fecha">
                        <p>Productos de  <?php echo $producto["email_vendedor"]; ?> </p>
                    </div>
                    <div class="producto-item-1">
                        <div class="imagen-item"> 
                            <img src="/proyecto-sigto/assets/img/<?php echo $producto["imagen"]; ?>" alt="Notebook">
                        </div>
                        <div class="descripcion">
                            <div>
                                <h3><?php echo $producto["nombre_producto"]; ?> </h3>
                            </div>
                            <div class="andes-input-stepper">
                                <button class="decrease-btn">-</button>
                                <div class="andes-input-stepper__content" id="quantity-selector-content" >
                                    <span class="andes-input-stepper__value">1</span>
                                </div>
                                <button class="increase-btn">+</button>
                            </div>
                            <div class="botones-op">
                                <a href="?eliminar_id=<?php echo $producto['id_producto']; ?>"> 
                                    <input class="eliminar-btn" type="button" value="Eliminar">
                                </a>
                            </div>
                        </div>
                        <div class="precio">
                            <p><?php echo $producto["precio"]; ?></p><span>$</span>
                            <p class="precio-art"><?php echo $producto["precio"]; ?></p>

                        </div>
                    </div>
                    <div class="envio">
                        <h3>Envio</h3>
                        <p>Gratis</p>
                    </div>
                </div>
            </section>
            <?php } ?> 
    </article>
    <article class="total">
    <section class="total-container">
        <div>
            <h3>Resumen de compra</h3>
            <ul>
                <li><p>Productos</p><p class="total-productos"><span class="dar-precio">$0.00</span></p></li> <!-- Muestra el total de productos -->
                <li><p>Envios</p><p>Gratis</p></li>
                <li><p>Total</p><p><span class="dar-precio" >$0.00</span></p></li> <!-- Este span se actualizará con el total -->
            </ul>
            <input type="button" value="Continuar compra">
        </div>
    </section>
    </article>
    </main>
    
    <script src="/proyecto-sigto/assets/js/index.js"></script>
    <script src="/proyecto-sigto/assets/js/carrito.js"></script>
</body>

</html>
