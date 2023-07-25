<?php

include_once('../../conexion.php');

class Docente extends Conexion
{
  public function __construct()
  {
    $this->db = parent::__construct();
  }

  // Función para registrar los docentes
  public function adddoc($Nombre_doc, $Apellido_doc, $Documento_doc, $Correo_doc, $Perfil_doc)
  {

      // Crear la sentencia SQL
      $statement = $this->db->prepare("INSERT INTO docentes (nombre_doc, apellido_doc, documento_doc, correo_doc, perfil) VALUES (:Nombre_doc, :Apellido_doc, :Documento_doc, :Correo_doc, :Perfil_doc)");

      $statement->bindParam(':Nombre_doc',$Nombre_doc);
      $statement->bindParam(':Apellido_doc',$Apellido_doc);
      $statement->bindParam(':Documento_doc',$Documento_doc);
      $statement->bindParam(':Correo_doc',$Correo_doc);
      $statement->bindParam(':Perfil',$Perfil);

      if($statement->execute())
      {
        echo "¡Registro exitoso!";
        header('Location: ../pages/index.php');
      }else{
        echo "Ocurrio un error.";
        header('Location: ../pages/agregar.php');
      }
  }

  // Función para consultar todos los usuarios docentes

  public function getdoc()
  {
    $row=null;
    $statement=$this->db->prepare("SELECT * FROM usuarios WHERE Perfil='Docente'");
    $statement->execute();
    while($result=$statement->fetch()){
      $row[]=$result;
    }
    return $row;
  }

  // Función para consultar el docente de acuerda a su ID
  public function getiddoc($Id)
  {
   
   $statement = $this->db->prepare("SELECT * FROM docentes WHERE id_usuario = :Id");
            $statement->bindParam(':Id', $Id);
            $statement->execute();
            
            // Obtener los resultados utilizando fetch()
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            
            // Devolver los resultados
            return $resultado;
  }

  // Función actualizar los datos del docente
  public function updatedoc($Id, $Nombre_doc, $Apellido_doc, $Documento_doc, $Correo_doc, $Perfil_doc)
  {
    $statement = $this->db->prepare("UPDATE docentes SET id_docente= :Id, nombre_doc= :Nombre_doc, apellido_doc= :Apellido_doc, documento_doc= :Documento_doc, correo_doc= :Correo_doc perfil=:Perfil WHERE id_usuario=$Id");
    $statement->bindParam(':Id',$Id);
    $statement->bindParam(':Nombre_doc',$Nombre_doc);
    $statement->bindParam(':Apellido_doc',$Apellido_doc);
    $statement->bindParam(':Documento_doc',$Documento_doc);
    $statement->bindParam(':Correo_doc',$Correo_doc);
    $statement->bindParam(':Perfil',$Perfil);
    if($statement->execute())
    {
      echo "<script>
      alert('Docente actualizado');
      window.location = '../pages/index.php';
      </script>";
    }else
    {
      echo "<script>
      alert('Docente no actualizado');
      window.location = '../pages/editar.php';
      </script>";
    }
  }

  // Función para eliminar un docente
  public function deletedoc($Id)
  {
    $statement=$this->db->prepare("DELETE FROM docentes WHERE id_docente=:Id");
    $statement->bindParam(':Id',$Id);
    $resultado=$statement->execute();
    if($statement->execute())
    {
      echo "Docente eliminado";
      header('Location: ../pages/index.php');
    }else
    {
      echo "Error no se puede eliminar el docente";
      header('Location: ../pages/eliminar.php');
    }
  }
}

?>