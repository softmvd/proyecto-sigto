<?php
require_once 'C:/xampp/htdocs/sigto/proyecto-sigto/core/ProductoController.php';
$controlador = new ProductoController();

$producto = $controlador -> readAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.I.G.T.O | PROYECTO</title>
    
    <link rel="icon" type="image/x-icon" href="/proyecto-sigto/assets/img/favicon-sigto.png">
    
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/index.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/ofertasSemanales.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                <form action="busquedaDeProductos.php">
                    <input type="text" name="buscador"> <!-- Poner img lupa dentro del input -->
                </form>
            </div>
            <div id="registro">
                <a href="registrarse.php">Registrarse</a>
            </div>
            <div>
                <a href="ingresarCuenta.php">Mi Cuenta</a>
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
       <article class="contenedor-carrusel">
        <section class="principal-carrusel">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="/proyecto-sigto/assets/img/bienvenidos-sigto.png" alt="Bienvendios-sigto">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="/proyecto-sigto/assets/img/no-sabes-que-comprar.jpeg" alt="no-sabes-que-comprar">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>    
            <!--Carrusel con img e info-->
        </section>
       </article>
        <article class="info-art">
            <section class="info-ventas">
                <div>
                    <div>
                        <img src="/proyecto-sigto/assets/img/caja.png" alt="caja">
                        <p>Qué es Sigto. Fácil, rápido y seguro. <a href="#">Como comprar</a></p> 
                    </div>
                    <div>
                        <img src="/proyecto-sigto/assets/img/airplane_282292.png" alt="avion">
                        <p>Información de Aduanas. Hacemos todo por ti. <a href="#">Saber mas</a></p>
                    </div>
                </div>
                <div>
                    <div>
                        <img src="/proyecto-sigto/assets/img/tarjetas.png" alt="tarjetas">
                        <p>
                            Paga con crédito o débito. <a href="#">Ver promociones</a>
                            </p>
                    </div>
                    <div>
                        <img src="/proyecto-sigto/assets/img/audifonos.png" alt="atencion-personalizada">
                        <p>Ayuda y seguimiento en tu idioma. <a href="#">Centro de ayuda en linea</a></p>
                    </div>
                </div>
                <div>
                </div>
            </section>
        </article>
            <article class="ofertasSemanales">
                <div class="oferta">
                    
                <?php while($productos = $producto->fetch_assoc()){  ?>
                    <div class="articulo">
                        <a href="articulo.php?id=<?php echo $productos["id"] ?>">
                            <div>
                                <img src="/proyecto-sigto/assets/img/<?php echo $productos["imagen"] ?>  " alt="Articulo-venta">
                            </div>
                            <div class="descripcion-oferta">
                                <p>
                                    <?php echo $productos["nombre"] ?>
                                </p>
                                <p><span>Desde U$S <?php echo $productos["precio"] ?></span></p>
                                <p>U$S <?php echo $productos["precio"] ?> <span class="descuentoOff">25% OFF</span></p>
                            </div>
                        </a>    
                    </div>
                    <?php }?>

                </div>
                
            </article>
        <footer>
            <div class="contenedor-footer">
                <div class="elementos-footer">
                    <h3>Redes Sociales</h3>
                    <ul>
                        <li>Instagram</li>
                        <li>Facebook</li>
                        <li>WhatsApp</li>
                    </ul>
                </div>
                <div class="elementos-footer">
                    <h3>Marcas destacadas</h3>
                    <ul>
                        <li>Apple</li>
                        <li>Nike</li>
                        <li>Panavox</li>
                    </ul>
                </div>
                <div class="elementos-footer">
                    <h3>Contacto</h3>
                    <ul>
                        <li>Trabaja con nosotros</li>
                        <li>Opiniones</li>
                        <li></li>
                    </ul>
                </div>
            </div>
            <div class="pie">Sistema de gestion de tiendas online. Derechos reservados ®MVD Software Solution</div>
        </footer>
        <script src="/proyecto-sigto/assets/js/index.js"></script>
    </body> 