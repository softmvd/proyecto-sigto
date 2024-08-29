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
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/productos.css">
</head>
<body>
    <header>
        <div class="menu-primero">
            <div>
                <a href="/proyecto-sigto/assets/pages/index.php">
                    <img id="logo" src="/proyecto-sigto/assets/img/logo-sigto.png" alt="logo">
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
        <article class="administrar-opciones">
            <section class="buscador-productos">
                <h1>Productos</h1>
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
                    <input type="button" value="Agregar">
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
                                <div>Estado: Activo</div>
                                <div>
                                    <p>El producto se encuentra visible</p>
                                    <p>Apple MacBook Air 13.3" Core i7 / 8GB /... </p>
                                    <p>Unidades disponibles: 13 | Color: varios</p>
                                </div>
                                <div>
                                    <p>Empresa: TodoTecno.uy</p>
                                </div>
                                <div>
                                    <input type="button" value="Editar">
                                    <input type="button" value="Eliminar">
                                </div>
                            </div>
                        </div>                   
                    </div>
            </section>
        </article>
    </main>
</body>
</html>
