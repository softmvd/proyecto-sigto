<?php
// Incluimos el modelo DireccionEnvio.
if (file_exists('C:/xampp/htdocs/sigto/proyecto-sigto/modelo/direccionesCliente.php')) {
    require_once 'C:/xampp/htdocs/sigto/proyecto-sigto/modelo/direccionesCliente.php';
} else {
    die('El archivo direccionesCliente.php no se encontró en la ruta especificada.');
}

class direccionesClienteController {
    
    // Método para crear una nueva dirección de envío
    public function create($data) {
        $direccionEnvio = new DireccionEnvio(); // Creamos una nueva instancia del modelo DireccionEnvio.
        
        // Validamos y asignamos los valores de cada atributo utilizando los datos proporcionados
        $direccionEnvio->setIdUsuario($data['id_usuario']);
        $direccionEnvio->setDireccion($data['direccion']);
        $direccionEnvio->setCiudad($data['ciudad']);
        $direccionEnvio->setProvincia($data['provincia']);
        $direccionEnvio->setCodigoPostal($data['codigoPostal']);
        $direccionEnvio->setPais($data['pais']);
        $direccionEnvio->setDireccionPrincipal($data['direccionPrincipal']);
        
        // Intentamos crear la dirección en la base de datos
        if ($direccionEnvio->create()) {
            return "Dirección de envío creada exitosamente.";
        } else {
            return "Error al crear la dirección de envío.";
        }
    }

    // Método para leer una dirección de envío específica por su ID
    public function readOne($id_direccion) {
        $direccionEnvio = new DireccionEnvio(); // Creamos una nueva instancia del modelo DireccionEnvio.
        $direccionEnvio->setIdDireccion($id_direccion); // Asignamos el ID de la dirección que queremos leer.
        return $direccionEnvio->readOne(); // Retornamos los datos de la dirección con el ID especificado.
    }

       // Método para leer todas las direcciones de envío por el ID de usuario
    public function readAll($id_usuario) {
        $direccionEnvio = new DireccionEnvio(); // Creamos una nueva instancia del modelo DireccionEnvio.
        return $direccionEnvio->readAll($id_usuario); // Retornamos las direcciones de envío del usuario especificado.
    }

    // Método para actualizar una dirección de envío existente
    public function update($data) {
        $direccionEnvio = new DireccionEnvio();
        $direccionEnvio->setIdDireccion($data['id_direccion']); // Asignamos el ID de la dirección a actualizar

        // Asignamos los nuevos valores de cada atributo
        $direccionEnvio->setDireccion($data['direccion']);
        $direccionEnvio->setCiudad($data['ciudad']);
        $direccionEnvio->setProvincia($data['provincia']);
        $direccionEnvio->setCodigoPostal($data['codigoPostal']);
        $direccionEnvio->setPais($data['pais']);
        $direccionEnvio->setDireccionPrincipal($data['direccionPrincipal']);
        
        // Intentamos actualizar la dirección en la base de datos
        if ($direccionEnvio->update()) {
            return "Dirección de envío actualizada correctamente.";
        } else {
            return "Error al actualizar la dirección de envío.";
        }
    }

    
    public function delete($id_direccion) {
        $direccionEnvio = new DireccionEnvio();
        $direccionEnvio->setIdDireccion($id_direccion);
        
        if ($direccionEnvio->delete()) { // Asumiendo que tienes un método delete() en tu modelo
            return 'success'; // Puedes cambiar el mensaje según sea necesario
        } else {
            return 'error';
        }
    }
    
}



?>
