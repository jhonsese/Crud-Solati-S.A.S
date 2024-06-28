<?php


//Incluir la Base de datos 
require_once '../config/bd.php';

require_once 'modeloCrud.php';


//Obtener los Datos por el Método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
//Insertar los Datos a la BD
    $insertar = new Crud();
    $mensaje = $insertar->insertarRegistros($nombre, $edad);

    echo $mensaje;
}


?>
