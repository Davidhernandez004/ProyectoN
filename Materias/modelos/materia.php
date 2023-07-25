<?php

include_once('../../conexion.php');

class Materia extends Conexion
{
  public function __construct()
  {
    $this->db = parent::__construct();
  }

  // Función para registrar las Materias
  public function addmat($Materia)
  {
    //Verificar de que no exista una materia en la base de datos
    $sql = "SELECT * FROM materias WHERE materia = '$Materia'";
    $Resultado = $this->db->query($sql);
    if($Resultado->rowCount() > 0) {
      echo "<scrip>alert('\La materia ya esta registrada\'); 
      window.location = '../pages/agregar.php'; </script>";
    }else{
      echo "<scrip>alert('\La materia no esta registrada\'); 
      window.location = '../pages/agregar.php'; </script>";
    }

      // Crear la sentencia SQL
      $statement = $this->db->prepare("INSERT INTO materias (materia) VALUES (:Materia)");

      $statement->bindParam(':Materia',$Materia);
      

      if($statement->execute())
      {
        echo "¡Registro exitoso!";
        header('Location: ../pages/index.php');
      }else{
        echo "Ocurrio un error.";
        header('Location: ../pages/agregar.php');
      }
  }


  // Función para consultar todos las materias 

  public function getmat()
  {
    $row=null;
    $statement=$this->db->prepare("SELECT * FROM materias WHERE materia='Materia'");
    $statement->execute();
    while($result=$statement->fetch()){
      $row[]=$result;
    }
    return $row;
  }

  // Función para consultar la materia de acuerda a su ID
  public function getidmat($Id)
  {
   
   $statement = $this->db->prepare("SELECT * FROM materias WHERE id_materia = :Id");
            $statement->bindParam(':Id', $Id);
            $statement->execute();
            
            // Obtener los resultados utilizando fetch()
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            
            // Devolver los resultados
            return $resultado;
  }

  // Función actualizar las materias
  public function updateidmat($Id, $Materia)
  {
    $statement = $this->db->prepare("UPDATE materias SET id_= :Id, materia= :Materia, apellido_usu= :Apellido_usu, usuario=:Usuario_usu, password_usu=:Password_usu,Perfil=:Perfil, estado=:Estado_usu WHERE id_usuario=$Id");
    $statement->bindParam(':Id',$Id);
    $statement->bindParam(':Materia',$Materia);
    
    if($statement->execute())
    {
      echo "<script>
      alert('Materia actualizada');
      window.location = '../pages/index.php';
      </script>";
    }else
    {
      echo "<script>
      alert('Materia no actualizada');
      window.location = '../pages/editar.php';
      </script>";
    }
  }

  // Función para eliminar un usuario
  public function deletemat($Id)
  {
    $statement=$this->db->prepare("DELETE FROM materias WHERE id_materia=:Id");
    $statement->bindParam(':Id',$Id);
    $resultado=$statement->execute();
    if($statement->execute())
    {
      echo "Materia eliminada";
      header('Location: ../pages/index.php');
    }else
    {
      echo "Error no se puede eliminar la materia";
      header('Location: ../pages/eliminar.php');
    }
  }
}

?>