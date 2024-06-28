<?php


//Incluir la Base de datos 
require_once '../config/bd.php';
require_once 'modeloCrud.php';


//Obtener la ID por el Método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];


    //Eliminar  registros de la BD
    $eliminar = new Crud();
    $mensaje = $eliminar->eliminarRegistro($id);

    echo $mensaje;
}
?>
