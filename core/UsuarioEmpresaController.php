<?php
// Incluimos el modelo UsuarioEmpresa.
if (file_exists('C:/xampp/htdocs/sigto/proyecto-sigto/modelo/UsuarioEmpresa.php')) {
    require_once 'C:/xampp/htdocs/sigto/proyecto-sigto/modelo/UsuarioEmpresa.php';
} else {
    die('El archivo UsuarioEmpresa.php no se encontró en la ruta especificada.');
}




class UsuarioEmpresaController {
    // Método para crear un nuevo usuarioEmpresa.
    public function create($data) {
        $usuarioEmpresa = new UsuarioEmpresa(); // Creamos una nueva instancia del modelo UsuarioEmpresa.
        $usuarioEmpresa->setEmail($data['emailEmpresa']); // Asignamos el email del usuarioEmpresa utilizando el dato proporcionado.
        $usuarioEmpresa->setNombre($data['nombreEmpresa']); // Asignamos el nombre de usuarioEmpresa.
        $usuarioEmpresa->setContraseña($data['claveEmpresa']); // Asignamos la contraseña del usuarioEmpresa.
        if ($usuarioEmpresa->create()) { // Intentamos crear el usuarioEmpresa en la base de datos.
            return "UsuarioEmpresa creado exitosamente."; // Si la creación fue exitosa, devolvemos un mensaje de éxito.
        } else {
            return "Error al crear usuarioEmpresa."; // Si hubo un error, devolvemos un mensaje de error.
        }
    }

    // Método para leer todos los usuarios.
    public function readAll() {
        $usuarioEmpresa = new UsuarioEmpresa(); // Creamos una nueva instancia del modelo UsuarioEmpresa.
        return $usuarioEmpresa->readAll(); // Retornamos todos los usuarios utilizando el método readAll del modelo UsuarioEmpresa.
    }

    // Método para leer un usuarioEmpresa específico por su ID.
    public function readOne($id_usuario) {
        $usuarioEmpresa = new UsuarioEmpresa(); // Creamos una nueva instancia del modelo UsuarioEmpresa.
        $usuarioEmpresa->setId($id_usuario); // Asignamos el ID del usuarioEmpresa que queremos leer.
        return $usuarioEmpresa->readOne(); // Retornamos los datos del usuarioEmpresa con el ID especificado.
    }

    // Método para actualizar un usuarioEmpresa existente.
    public function update($data) {
        $usuarioEmpresa = new UsuarioEmpresa(); // Creamos una nueva instancia del modelo UsuarioEmpresa.
        $usuarioEmpresa->setId($data['$id_usuario']); // Asignamos el ID del usuarioEmpresa que se va a actualizar.
        $usuarioEmpresa->setEmail($data['email']); // Actualizamos el email del usuarioEmpresa.
        $usuarioEmpresa->setNombre($data['nombre']); // Actualizamos el nombre de usuarioEmpresa.
        
        $usuarioEmpresa->setContraseña($data['clave']); // Actualizamos la contraseña del usuarioEmpresa.
        if ($usuarioEmpresa->update()) { // Intentamos actualizar el usuarioEmpresa en la base de datos.
            return "UsuarioEmpresa actualizado exitosamente."; // Si la actualización fue exitosa, devolvemos un mensaje de éxito.
        } else {
            return "Error al actualizar usuarioEmpresa."; // Si hubo un error, devolvemos un mensaje de error.
        }
    }

    // Método para eliminar un usuarioEmpresa por su ID.
    public function delete($id_usuario) {
        $usuarioEmpresa = new UsuarioEmpresa(); // Creamos una nueva instancia del modelo UsuarioEmpresa.
        $usuarioEmpresa->setId($id_usuario); // Asignamos el ID del usuarioEmpresa que se va a eliminar.
        if ($usuarioEmpresa->delete()) { // Intentamos eliminar el usuarioEmpresa de la base de datos.
            return "UsuarioEmpresa eliminado exitosamente."; // Si la eliminación fue exitosa, devolvemos un mensaje de éxito.
        } else {
            return "Error al eliminar usuarioEmpresa."; // Si hubo un error, devolvemos un mensaje de error.
        }
    }   
}
?>
