<?php
require_once 'C:/xampp/htdocs/sigto/proyecto-sigto/core/ProductoControlador.php';
$controlador = new ProductoControlador();

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $controlador -> crear($_POST);   
}

$id_producto = isset($_GET["id"])? $_GET["id"] : null;

$resultado= $controlador ->delete($id_producto);
$producto = $controlador -> readAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Productos</title>
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
                        <option>Mes pasado</option>
                        <option>Este año</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                    </optgroup>
                </select>
                <div>
                    <a href="/proyecto-sigto/vista/crearProducto.php"><input type="button" value="Agregar"></a>
                    <input type="button" value="Buscar">
                </div>
            </section>
            <?php if($producto && $producto->num_rows > 0 ){  ?>
                <?php while($productos = $producto->fetch_assoc()){ ?>
                <section class="productos">
                <p>1 Producto</p>
                    <div class="producto-item">
                        <div class="fecha">-</div>
                        <div class="producto-item-1">
                            <div class="imagen-item"><img src="<?php  echo $productos["imagen"] ?>" alt="Notebook"></div>
                            <div class="descripcion">
                                <div>Estado: <?php echo $productos["estado"] ?></div>
                                <div>
                                    <p>Nombre: <?php  echo $productos["nombre"] ?> </p>
                                    <p>Marca: <?php  echo $productos["marca"] ?></p>
                                    <p>Descripcion: <?php  echo $productos["descripcion"] ?></p>
                                    <p>Precio: <?php  echo $productos["precio"] ?></p>
                                    <p>Unidades disponibles: <?php  echo $productos["cantidad"] ?></p>
                                </div>
                                <div>
                                    <p>Empresa: <?php  echo $productos["email_vendedor"] ?></p>
                                </div>
                                <div>
                                    <a href="/proyecto-sigto/vista/editarProducto.php?id=<?php echo $productos["id"];?>"  >
                                        <input type="button" value="Editar">
                                    </a>
                                    <a href="/proyecto-sigto/assets/pages/productos.php?id=<?php echo $productos["id"];?>"  >
                                        <input type="button" value="Eliminar">
                                    </a>
                                    
                                </div>
                            </div>
                        </div>                   
                    </div>
            </section>
            <?php }?>
            <?php }?>
        </article>
    </main>
</body>
</html>
