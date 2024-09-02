<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="icon" type="image/x-icon" href="/proyecto-sigto/assets/img/favicon-sigto.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/registrarse.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/index.css">
</head>

<body>
    <header>
        <div>
            <a href="/proyecto-sigto/assets/pages/index.php"><img id="logo" src="/proyecto-sigto/assets/img/logo-sigto.png" alt="logo-tiendaMia"></a>
        </div>
    </header>
    <main> 
        <div class="contenedor-registro">
        <div class="registrate">
            <div>
                <h2 class="deco-btn">Resgistrarse como Cliente</h2>
                <h2>Registrarse como Empresa</h2>
            </div>
        </div>
            <div class="registro">
                <form action="usuario.php" method="post">
                    <div class="div-form-1">
                        <div>
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" required minlength="2" maxlength="25">
                        </div>
                        <div>
                            <label for="apellido">Apellido</label>
                            <input type="text" id="apellido" name="apellido"  minlength="2" maxlength="25">
                        </div>
                    </div>
                    <div class="div-form-2">
                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div>
                            <label for="clave">Constraseña</label>
                            <input type="password" id="clave" name="clave" min="8" max="12" required>
                        </div>
                    </div>
                    <div class="div-form-4">
                        <input type="checkbox"><p>Recibir Ofertas!</p>
                    </div>
                    <div class="div-form-3">
                        <input type="submit" value="Registrate">
                        <p>Already have an account? <a href="cuenta.html">Sign In</a></p>
                    </div>
                </form>
                
            </div>
            <div class="registro">
                <form action="usuario.php" method="post">
                    <div class="div-form-1">
                        <div>
                            <label for="nombre">Nombre Empresa</label>
                            <input type="text" id="nombreEmpresa" name="nombre" required minlength="2" maxlength="25">
                        </div>
                    </div>
                    <div class="div-form-2">
                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="emailEmpresa" name="email" required>
                        </div>
                        <div>
                            <label for="clave">Constraseña </label>
                            <input type="password" id="claveEmpresa" name="clave" min="8" max="12" required>
                        </div>
                    </div>
                    <div class="div-form-4">
                        <input type="checkbox"><p>Recibir Ofertas!</p>
                    </div>
                    <div class="div-form-3">
                        <input type="submit" value="Registrate">
                        <p>Already have an account? <a href="cuenta.html">Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="/proyecto-sigto/assets/js/registrarse.js"></script>
</body>

</html>