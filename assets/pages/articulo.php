<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículo</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/index.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/articulo.css">
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
                <input type="text" name="buscador"> <!-- Poner img lupa dentro del input -->
            </div>
            <div id="registro">
                <a href="#">Registrarse</a>
            </div>
            <div>
                <a href="/proyecto-sigto/assets/pages/cuenta.html">Mi Cuenta</a>
            </div>
            <div>
                <a href="carrito.php"><img src="/proyecto-sigto/assets/img/shopping-cart (2).png" alt="carrito"></a>
            </div>
        </div>
        <div class="op-registro">
            <a href="registrarse.php"><input type="button" value="Cliente"></a>
            <a href=""><input type="button" value="Empresa"></a>
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
        <article>
            <section class="imagenes-articulo">
                <div>
                    <img src="https://static-catalog.tiendamia.com/marketplace_manager_service/production/product_d11d9689_mirakl_image_1_large.jpg" alt="Celular">
                </div>
            </section>
            <section class="descripcion-articulo">
                <p>Nuevo | +5 vendidos</p>
                <div>
                    <h3>Apple iPhone 12 5G 128 GB negro 4 GB RAM</h3>
                </div>
                <div>
                    <p><span class="precio">$7.862</span></p>
                    <p>en <span class="cuotas">10x $786,20 sin interés</span></p>
                    <p><span class="opciones">Ver los medios de pagos</span></p>
                </div>
                <div>
                    <p>Color: Negro</p>
                </div>
                <div class="lo-que-tienes-que-saber">
                    <p>Lo que tienes que saber de este producto:</p>
                    <ul>
                        <li>Memoria RAM: 4 GB</li>
                        <li>Compatible con redes 5G</li>
                        <li>Pantalla AMOLED de 6,28 pulgadas</li>
                        <li>Cuenta con 3 cámaras traseras de 50Mpx/13Mpx/5Mpx</li>
                        <li>Cámara frontal de 32Mpx</li>
                        <li>Procesador Qualcomm Snapdragon 4 Gen 2 Octa-Core de 2,2 GHz con 4 GB de RAM</li>
                        <li>Batería de 5000 mAh con carga inalámbrica</li>
                        <li>Memoria interna de 128 GB</li>
                        <li>Con reconocimiento facial y sensor de huellas dactilares</li>
                    </ul>
                    <p>Ver caracteristicas</p>
                </div>
            </section>
            <section class="opciones-compra">
                <div>
                    <p><span class="cuotas">Llega gratis mañana</span></p>
                    <p>Mas formas de entrega</p>
                </div>
                <div>
                    <p><span class="cuotas">Retira gratis</span> a partir del jueves en correos</p>
                    <p>Ver en el mapa</p>
                </div>
                <div>
                    <p>Stock disponible</p>
                    <select>
                        <optgroup label="Cantidad">
                            <option>1 unidades</option>
                            <option>2 unidades</option>
                            <option>3 unidades</option>
                            <option>4 unidades</option>
                            <option>5 unidades</option>
                            <option>6 unidades</option>
                            <option>+6 unidades</option>
                        </optgroup>
                    </select>
                </div>
                <div class="botones">
                    <input type="button" value="Comprar ahora">
                    <input type="button" value="Agregar al carrito">
                </div>
                <div>
                    <p>Vendido por <span class="opciones">TodoTecno.uy</span></p>
                    <p>MervcadoLider | +1000 ventas</p>
                </div>
                <div class="devolucion">
                    <div>
                        <p><span class="opciones">Devolución gratis.</span> Tienes 30 días desde que lo recibes.</p>
                    </div>
                    <div>
                        <p><span class="opciones">Compra Protegida.</span>Se abrirá en una nueva ventana, recibe el producto que esperabas o te devolvemos tu dinero.</p>
                    </div>
                </div>
            </section>
        </article>
    </main>
</body>
</html>
