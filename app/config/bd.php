
<?php

// Creamos la clase Conection para posteriormente llamarla en los modeles
// modelInsert.php , modeloCrud.php , modelUpdate.php


class Conection extends PDO {

  private $host = 'localhost';
  private $database = 'solati'; // Nombre de la base de datos
  private $username = 'postgres'; // Nombre predeterminado en PostgreSQL
  private $pass = ''; // Contraseña establecida
  private $port = '5432'; // Numero del puerto predeterminado
  private $sgbd = 'pgsql'; // Gestor de base de datos a Usar
  private $status = 'Error'; // Estado de la conexion en caso de Error

// Constructor para inicializar todos los atributos de la BD
  public function __construct() {


    // Se realiza la conexion a la BD
    try {
      parent::__construct("{$this->sgbd}:host={$this->host};dbname={$this->database};port={$this->port}", $this->username, $this->pass);
      return $this->status = 'Conectado';
    } catch (PDOException $e) {
      return 'Error en la conexion: ' . $e->getMessage(); //En caso de error mostrar un mensaje
      return $this->status; 
    }
  }

 
  public function statusConexion() {
    return $this->status; //Conocer el estado de la conexion
  }
}



?>