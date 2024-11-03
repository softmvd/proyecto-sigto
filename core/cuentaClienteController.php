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

     // Método para leer un c$cuentaCliente específico por su ID.
     public function readOne($id_usuario) {
        $cuentaCliente = new cuentaCliente(); // Creamos una nueva instancia del modelo Usuario.
        $cuentaCliente->setIdUsuario($id_usuario); // Asignamos el ID del c$cuentaCliente que queremos leer.
        return $cuentaCliente->readOne(); // Retornamos los datos del c$cuentaCliente con el ID especificado.
    }

       // Método para actualizar un cuentaCliente existente en el controlador.
        
       public function update($data) {
        $cuentaCliente = new cuentaCliente();
        $cuentaCliente->setIdCuenta($data['id_cuenta']); // Asignamos el ID de cuenta
        
        // Depuración: Verificar que id_cuenta esté configurado
        echo "ID de cuenta asignado: " . $cuentaCliente->getIdCuenta() . "\n";

        $cuentaCliente->setTelefono($data['telefono']);
        $cuentaCliente->setGenero($data['genero']);
        $cuentaCliente->setFechaNac($data['fechaNac']);

        // Obtener la imagen actual antes de verificar si hay una nueva
        $imagenActual = $cuentaCliente->getImagenActual();
        echo "Imagen actual obtenida: " . ($imagenActual ? $imagenActual : "No existe") . "\n";

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $archivoImagen = $_FILES['imagen'];
            $nombreOriginal = $archivoImagen['name'];
            $tipoArchivo = $archivoImagen['type'];
            $nombreTemporal = $archivoImagen['tmp_name'];
            $tamañoArchivo = $archivoImagen['size'];

            $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
            $extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));

            if (in_array($extension, $extensionesPermitidas)) {
                $nombreImagenUnico = uniqid('img_', true) . '.' . $extension;
                $rutaImagen = 'C:/xampp/htdocs/sigto/proyecto-sigto/assets/img/' . $nombreImagenUnico;

                $tamañoMaximo = 2 * 1024 * 1024;
                if ($tamañoArchivo > $tamañoMaximo) {
                    die("El archivo excede el tamaño máximo permitido de 2MB.");
                }

                if (move_uploaded_file($nombreTemporal, $rutaImagen)) {
                    $cuentaCliente->setImagen($nombreImagenUnico);
                } else {
                    die("Error al mover la imagen.");
                }
            } else {
                die("Formato de imagen no permitido. Solo se permiten JPG, JPEG, PNG y GIF.");
            }
        } else {
            // Si no hay nueva imagen, conservar la imagen actual
            $cuentaCliente->setImagen($imagenActual);
        }

        if ($cuentaCliente->update()) {
            return "Cuenta de cliente actualizada correctamente.";
        } else {
            return "Error al actualizar la cuenta de cliente.";
        }
    }
}

?>
    