<?php
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/UsuarioController.php";
require_once "C:/xampp/htdocs/sigto/proyecto-sigto/core/UsuarioEmpresaController.php";

$controladorCliente = new UsuarioController();
$controladorEmpresa = new UsuarioEmpresaController();

// Obtén las listas de usuarios clientes y empresas
$usuariosCliente = $controladorCliente->readAll();
$usuariosEmpresa = $controladorEmpresa->readAll();

session_start(); // Iniciar sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $clave = $_POST["clave"];
    $usuarioValido = false;  // Variable para determinar si la autenticación es exitosa
    $usuarioDatos = null; // Variable para almacenar datos del usuario
    $cuentaCliente = false;
    $cuentaEmpresa = false;
    // Verifica en la lista de usuarios clientes
    while ($usuario = $usuariosCliente->fetch_assoc()) {
        if ($email == $usuario["email"] && password_verify($clave, $usuario["clave"])) {
            $usuarioDatos = $usuario; // Almacena los datos del usuario
            $usuarioValido = true;
            $cuentaCliente = true;
            break; // Sale del ciclo si encuentra un usuario válido
        }
    }

    // Si no es cliente, verifica en la lista de usuarios empresas
    if (!$usuarioValido) {
        while ($usuario = $usuariosEmpresa->fetch_assoc()) {
            if ($email == $usuario["email"] && password_verify($clave, $usuario["clave"])) {
                $usuarioDatos = $usuario; // Almacena los datos del usuario
                $usuarioValido = true;
                $cuentaEmpresa = true;
                break; // Sale del ciclo si encuentra un usuario válido
            }
        }
    }

    // Si las credenciales son correctas
    if ($usuarioValido && $cuentaCliente) {
        $_SESSION['usuario'] = $usuarioDatos; // Almacena los datos del usuario en la sesión

        // Redirigir a la página de la cuenta del cliente
        header("Location: /proyecto-sigto/assets/pages/perfilPersonal.php");
        exit(); // Termina el script después de la redirección
    } else if($usuarioValido && $cuentaEmpresa){
        $_SESSION["usuario"] = $usuarioDatos;
        // Redirigir a la página de la cuenta de la empresa
        header("Location: /proyecto-sigto/assets/pages/perfilEmpresa.php");
        exit(); // Termina el script después de la redirección
    }else{
        echo "Credenciales incorrectas.";
    }
}
?>
