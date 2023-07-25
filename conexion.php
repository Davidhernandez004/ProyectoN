<?php

class Conexion
{
  protected $db;
  private $drive = "mysql";
  private $host = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname = "Notas2023";

  public function __construct()
  {
    try {
      $this->db = new PDO("{$this->drive}:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);

      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //echo "Conexión exitosa.";

      return $this->db;

    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}
?>