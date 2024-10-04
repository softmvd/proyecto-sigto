<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Personal</title>
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
            <div>
                <a href="carrito.php">
                    <img src="/proyecto-sigto/assets/img/shopping-cart (2).png" alt="carrito">
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
            <section class="productos">
                <p>1 Producto</p>
                <div class="producto-item">
                    <div class="fecha">
                        <p>TodoTecno.uy</p>
                        <p>Vendido por TodoTecno.uy</p>
                    </div>
                    <div class="producto-item-1">
                        <div class="imagen-item">
                            <img src="https://static-catalog.tiendamia.com/marketplace_manager_service/production/product_2aac9d64_mirakl_image_1_medium.jpg" alt="Notebook">
                        </div>
                        <div class="descripcion">
                            <div>
                                <h3>Apple MacBook Air 13.3" Core i7 / 8GB /... </h3>
                            </div>
                            <div class="andes-input-stepper">
                                <button id="decrease-btn">-</button>
                                <div class="andes-input-stepper__content" id="quantity-selector-content" >
                                    <span class="andes-input-stepper__value">1</span>
                                </div>
                                <button id="increase-btn">+</button>
                            </div>
                            <div class="botones-op">
                                <input type="button" value="Eliminar">
                                <input type="button" value="Guardar">
                                <input type="button" value="Comprar ahora">
                            </div>
                            
                        </div>
                        <div class="precio">
                            <p>14000</p>
                            <p>14000</p>
                        </div>
                    </div>
                    <div class="envio">
                        <h3>Envio</h3>
                        <p>Gratis</p>
                    </div>
                </div>
            </section>
        </article>
    </main>
    <article class="total">
            <section class="total-container">
                <div>
                    <h3>Resumen de compra</h3>
                    <ul>
                        <li><p>Productos()</p><p><span>$14.000</span></p></li>
                        <li><p>Envios()</p><p>Gratis</p></li>
                        <li><p>Total</p><p><span>$14.000</span></p></li>
                    </ul>
                    <input type="button" value="Continuar compra">
                </div>
            </section>
        </article>
    <script src="/proyecto-sigto/assets/js/index.js"></script>
    <script src="/proyecto-sigto/assets/js/carrito.js"></script>
</body>

</html>
