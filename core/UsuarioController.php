<?php
// Incluimos el modelo Usuario.
if (file_exists('C:/xampp/htdocs/sigto/proyecto-sigto/modelo/Usuario.php')) {
    require_once 'C:/xampp/htdocs/sigto/proyecto-sigto/modelo/Usuario.php';
} else {
    die('El archivo Usuario.php no se encontró en la ruta especificada.');
}




class UsuarioController {
    // Método para crear un nuevo usuario.
    public function create($data) {
        $usuario = new Usuario(); // Creamos una nueva instancia del modelo Usuario.
        $usuario->setEmail($data['email']); // Asignamos el email del usuario utilizando el dato proporcionado.
        $usuario->setNombre($data['nombre']); // Asignamos el nombre de usuario.
        
        $usuario->setContraseña($data['clave']); // Asignamos la contraseña del usuario.
        if ($usuario->create()) { // Intentamos crear el usuario en la base de datos.
            return "Usuario creado exitosamente."; // Si la creación fue exitosa, devolvemos un mensaje de éxito.
        } else {
            return "Error al crear usuario."; // Si hubo un error, devolvemos un mensaje de error.
        }
    }

    // Método para leer todos los usuarios.
    public function readAll() {
        $usuario = new Usuario(); // Creamos una nueva instancia del modelo Usuario.
        return $usuario->readAll(); // Retornamos todos los usuarios utilizando el método readAll del modelo Usuario.
    }

    // Método para leer un usuario específico por su ID.
    public function readOne($id_usuario) {
        $usuario = new Usuario(); // Creamos una nueva instancia del modelo Usuario.
        $usuario->setId($id_usuario); // Asignamos el ID del usuario que queremos leer.
        return $usuario->readOne(); // Retornamos los datos del usuario con el ID especificado.
    }

    // Método para actualizar un usuario existente.
    public function update($data) {
        $usuario = new Usuario(); // Creamos una nueva instancia del modelo Usuario.
        $usuario->setId($data['id_usuario']); // Asignamos el ID del usuario que se va a actualizar.
        $usuario->setEmail($data['email']); // Actualizamos el email del usuario.
        $usuario->setNombre($data['nombre']); // Actualizamos el nombre de usuario.
        
        $usuario->setContraseña($data['clave']); // Actualizamos la contraseña del usuario.
        if ($usuario->update()) { // Intentamos actualizar el usuario en la base de datos.
            return "Usuario actualizado exitosamente."; // Si la actualización fue exitosa, devolvemos un mensaje de éxito.
        } else {
            return "Error al actualizar usuario."; // Si hubo un error, devolvemos un mensaje de error.
        }
    }

    // Método para eliminar un usuario por su ID.
    public function delete($id_usuario) {
        $usuario = new Usuario(); // Creamos una nueva instancia del modelo Usuario.
        $usuario->setId($id_usuario); // Asignamos el ID del usuario que se va a eliminar.
        if ($usuario->delete()) { // Intentamos eliminar el usuario de la base de datos.
            return "Usuario eliminado exitosamente."; // Si la eliminación fue exitosa, devolvemos un mensaje de éxito.
        } else {
            return "Error al eliminar usuario."; // Si hubo un error, devolvemos un mensaje de error.
        }
    }
}
?>
