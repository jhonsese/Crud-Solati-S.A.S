<?php


// Incluir el modeloCrud.php el cual contiene la Clase Crud
require_once '../model/modeloCrud.php';


// Creamos la Instancia para luego llamar los metodos 
$objeto = new Crud();

$registros = $objeto->leerRegistros();



require_once '../view/viewCrud.php';

?>