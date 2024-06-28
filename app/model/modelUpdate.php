<?php


//Incluir la Base de datos 
require_once '../config/bd.php';
require_once 'modeloCrud.php';


//Obtener los Datos por el Método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];


//Actualizar los Datos de la BD    
    $actualizar = new Crud();
    $mensaje = $actualizar->actualizarRegistro($id, $nombre, $edad);

    echo $mensaje;
}
?>
