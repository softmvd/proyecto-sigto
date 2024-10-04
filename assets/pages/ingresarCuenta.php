<?php
session_start(); // Iniciar sesión

if(isset($_SESSION["usuario"])){
    $usuario = $_SESSION["usuario"];
    if(isset($usuario["nombre"])){
        header("Location: /proyecto-sigto/assets/pages/perfilPersonal.php");
    }else if(isset($usuario["nombreEmpresa"])){
        header("Location: /proyecto-sigto/assets/pages/perfilEmpresa.php");
    }
}

?>
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
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/cuenta.css">
</head>

<body>
    <header>
        <div>
            <a href="/proyecto-sigto/assets/pages/index.php"><img id="logo" src="/proyecto-sigto/assets/img/logo-sigto.png" alt="logo-tiendaMia"></a>
        </div>
    </header>
    <main> 
        <div class="contenedor-registro">
            <div class="registro">
                <div class="registrate">
                    <h1>Ingresar en Sigto</h1>
                </div>
                <form action="/proyecto-sigto/assets/pages/cuenta.php" method="post">
                    <div class="div-form-2">
                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div>
                            <label for="contraseña">Constraseña</label>
                            <input type="password" id="contraseña" name="clave" min="8" max="12" required>
                        </div>
                    </div>
                    <div class="div-form-4">
                        <input type="checkbox"><p>Recibir Ofertas!</p>
                    </div>
                    <div class="div-form-3">
                        <input type="submit" value="Ingresar">
                        <p>Don't have an account?<a href="registrarse.php">Sign up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>