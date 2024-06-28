<?php

require_once '../config/bd.php';

class Crud extends Conection {
    public $conexion;

    public function __construct() {
        $this->conexion = new Conection();
    }


    // Funcion que nos permite traer los registros de la Base de Datos
    public function leerRegistros() {
         // Verificar si la conexión es una instancia válida de PDO
        try {
            if (!$this->conexion instanceof PDO) {
                throw new Exception('Error en la Conexion');
            }

            $query = "SELECT * FROM usuarios ORDER BY id ASC";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }


    // Funcion para traer los datos al presionar el Icono de Editar y mostrarlos en el Formulario
    public function obtenerRegistro($id) {

        try {
            if (!$this->conexion instanceof PDO) {
                throw new Exception('Error en la Conexion');
            }
 // Definir la consulta SQL para obtener un registro específico por su ID
            $query = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }



    
    public function insertarRegistros($nombre, $edad) {
        try {
            if (!$this->conexion instanceof PDO) {
                throw new Exception('Error en la Conexion');
            }

            $query = "INSERT INTO usuarios (nombre, edad) VALUES (:nombre, :edad)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':edad', $edad);
            $stmt->execute();

            header("Location: ../controller/controllerCrud.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return "Error al insertar el registro";
        }
    }

    public function actualizarRegistro($id, $nombre, $edad) {
        try {
            if (!$this->conexion instanceof PDO) {
                throw new Exception('Error en la conexion');
            }
 // Definir la consulta SQL para Actualizar un registro específico por su ID
            $query = "UPDATE usuarios SET nombre = :nombre, edad = :edad WHERE id = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':edad', $edad);
            $stmt->execute();

            header("Location: ../controller/controllerCrud.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return "Error al actualizar el registro";
        }
    }

    public function eliminarRegistro($id) {
        try {
            if (!$this->conexion instanceof PDO) {
                throw new Exception('Error en la Conexion');
            }
 // Definir la consulta SQL para Eliminar un registro específico por su ID
            $query = "DELETE FROM usuarios WHERE id = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            header("Location: ../controller/controllerCrud.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return "Error al eliminar el registro";
        }
    }
}

?>
