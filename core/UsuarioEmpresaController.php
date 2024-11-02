<?php
// Incluimos el modelo UsuarioEmpresa
if (file_exists('C:/xampp/htdocs/sigto/proyecto-sigto/modelo/UsuarioEmpresa.php')) {
    require_once 'C:/xampp/htdocs/sigto/proyecto-sigto/modelo/UsuarioEmpresa.php';
} else {
    die('El archivo UsuarioEmpresa.php no se encontró en la ruta especificada.');
}

class UsuarioEmpresaController {
    // Método para crear un nuevo usuario Empresa
    public function create($data) {
        // Verificamos que las claves necesarias estén en $data
        if (!isset($data['emailEmpresa'], $data['nombreEmpresa'], $data['claveEmpresa'])) {
            return "Error: Faltan datos requeridos para crear el usuario de empresa.";
        }

        $usuarioEmpresa = new UsuarioEmpresa(); // Creamos una nueva instancia del modelo UsuarioEmpresa
        $usuarioEmpresa->setEmail($data['emailEmpresa']); // Asignamos el email
        $usuarioEmpresa->setNombre($data['nombreEmpresa']); // Asignamos el nombre
        $usuarioEmpresa->setContraseña($data['claveEmpresa']); // Asignamos la contraseña

        if ($usuarioEmpresa->create()) { // Intentamos crear el usuario
            return "UsuarioEmpresa creado exitosamente."; // Mensaje de éxito
        } else {
            return "Error al crear usuarioEmpresa."; // Mensaje de error
        }
    }

    // Método para leer todos los usuarios
    public function readAll() {
        $usuarioEmpresa = new UsuarioEmpresa(); // Creamos una nueva instancia
        return $usuarioEmpresa->readAll(); // Retornamos todos los usuarios
    }

    // Método para leer un usuario Empresa específico por su ID
    public function readOne($id_usuario) {
        $usuarioEmpresa = new UsuarioEmpresa(); // Creamos una nueva instancia
        $usuarioEmpresa->setId($id_usuario); // Asignamos el ID
        return $usuarioEmpresa->readOne(); // Retornamos los datos del usuario
    }

    // Método para actualizar un usuario Empresa existente
    public function update($data) {
        // Verificamos que las claves necesarias estén en $data
        if (!isset($data['id_usuario'], $data['email'], $data['nombre'], $data['clave'])) {
            return "Error: Faltan datos requeridos para actualizar el usuario de empresa.";
        }

        $usuarioEmpresa = new UsuarioEmpresa(); // Creamos una nueva instancia
        $usuarioEmpresa->setId($data['id_usuario']); // Asignamos el ID
        $usuarioEmpresa->setEmail($data['email']); // Actualizamos el email
        $usuarioEmpresa->setNombre($data['nombre']); // Actualizamos el nombre
        $usuarioEmpresa->setContraseña($data['clave']); // Actualizamos la contraseña

        if ($usuarioEmpresa->update()) { // Intentamos actualizar el usuario
            return "UsuarioEmpresa actualizado exitosamente."; // Mensaje de éxito
        } else {
            return "Error al actualizar usuarioEmpresa."; // Mensaje de error
        }
    }

    // Método para eliminar un usuario Empresa por su ID
    public function delete($id_usuario) {
        $usuarioEmpresa = new UsuarioEmpresa(); // Creamos una nueva instancia
        $usuarioEmpresa->setId($id_usuario); // Asignamos el ID
        if ($usuarioEmpresa->delete()) { // Intentamos eliminar el usuario
            return "UsuarioEmpresa eliminado exitosamente."; // Mensaje de éxito
        } else {
            return "Error al eliminar usuarioEmpresa."; // Mensaje de error
        }
    }
}
?>
