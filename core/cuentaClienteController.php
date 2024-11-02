<?php
// Incluimos el modelo Usuario.
if (file_exists('C:/xampp/htdocs/sigto/proyecto-sigto/modelo/cuentaCliente.php')) {
    require_once 'C:/xampp/htdocs/sigto/proyecto-sigto/modelo/cuentaCliente.php';
} else {
    die('El archivo cuentaCliente.php no se encontró en la ruta especificada.');
}

class CuentaClienteController {
    // Método para crear una nueva cuenta de cliente
    public function create($data) {
        $cuentaCliente = new cuentaCliente(); // Creamos una nueva instancia del modelo cuentaCliente.
    
        // Validamos y asignamos los valores de cada atributo utilizando los datos proporcionados
        $cuentaCliente->setIdUsuario(!empty($data) ? $data: null);
        
        // Intentamos crear la cuenta en la base de datos
        if ($cuentaCliente->create()) {
            return "Cuenta de cliente creada exitosamente."; // Si la creación fue exitosa, devolvemos un mensaje de éxito.
        } else {
            return "Error al crear cuenta de cliente."; // Si hubo un error, devolvemos un mensaje de error.
        }
    }
    
}
?>
    