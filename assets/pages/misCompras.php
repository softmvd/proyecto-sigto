<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Personal</title>
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
                <a href="misCompras.php">Mis Compras</a>
            </div>
            <div>
                <a href="/proyecto-sigto/assets/pages/cuenta.html">Mi Cuenta</a>
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
                <h1>Compras</h1>
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
                    <input type="button" value="Buscar">
                </div>
            </section>
                <section class="productos">
                <p>1 Producto</p>
                    <div class="producto-item">
                        <div class="fecha">14 de enero de 2021</div>
                        <div class="producto-item-1">
                            <div class="imagen-item"><img src="https://static-catalog.tiendamia.com/marketplace_manager_service/production/product_2aac9d64_mirakl_image_1_medium.jpg" alt="Notebook"></div>
                            <div class="descripcion">
                                <div>Estado: Compra cancelada</div>
                                <div>
                                    <p>Cancelaste la compra antes de que se acredite el pago</p>
                                    <p>Apple MacBook Air 13.3" Core i7 / 8GB /... </p>
                                    <p>Unidades:1 | Color:Blanco</p>
                                </div>
                                <div>
                                    <p>Empresa: TodoTecno.uy</p>
                                </div>
                                <div>
                                    <input type="button" value="Ver compra">
                                    <input type="button" value="Volver a comprar">
                                </div>
                            </div>
                        </div>                   
                    </div>
            </section>
        </article>
    </main>
    <script src="/proyecto-sigto/assets/js/index.js"></script>
</body>