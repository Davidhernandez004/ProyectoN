<?php

include_once('../../conexion.php');

class Estudiante extends Conexion
{
  public function __construct()
  {
    $this->db = parent::__construct();
  }

  // Función para registrar los estudiantes
  public function addest($Nombre_est, $Apellido_est, $Documento_est, $Correo_est, $Materia, $Docente, $Promedio, $Fecha)
  {
      // Crear la sentencia SQL
      $statement = $this->db->prepare("INSERT INTO estudiantes (nombre_est, apellido_est, documento_est, correo_est, materia, docente, promedio, fecha_registro) VALUES (:Nombre_est, :Apellido_est, :Documento_est, :Correo_est, :Materia, :Docente, :Promedio, :Fecha)");

      $statement->bindParam(':Nombre_est',$Nombre_est);
      $statement->bindParam(':Apellido_est',$Apellido_est);
      $statement->bindParam(':Documento_est',$Documento_est);
      $statement->bindParam(':Correo_est',$Correo_est);
      $statement->bindParam(':Materia',$Materia);
      $statement->bindParam(':Docente',$Docente);
      $statement->bindParam(':Promedio',$Promedio);
      $statement->bindParam(':Fecha',$Fecha);

      if($statement->execute())
      {
        echo "¡Registro exitoso!";
        header('Location: ../pages/index.php');
      }else{
        echo "Ocurrio un error.";
        header('Location: ../pages/agregar.php');
      }
  }

  // Función para consultar todos los estudiantes administradores

  public function getest()
  {
    $row=null;
    $statement=$this->db->prepare("SELECT * FROM estudinates");
    $statement->execute();
    while($result=$statement->fetch()){
      $row[]=$result;
    }
    return $row;
  }

  // Función para consultar el estudiantes de acuerda a si ID
  public function getidest($Id)
  {
   
   $statement = $this->db->prepare("SELECT * FROM estudiantes WHERE id_estudiante = :Id");
            $statement->bindParam(':Id', $Id);
            $statement->execute();
            
            // Obtener los resultados utilizando fetch()
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            
            // Devolver los resultados
            return $resultado;
  }

}
?>