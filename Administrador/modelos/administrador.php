<?php

include_once('../../conexion.php');

class Administrador extends Conexion
{
  public function __construct()
  {
    $this->db = parent::__construct();
  }

  // Función para registrar los usuarios
  public function addadmin($Nombre_usu, $Apellido_usu, $Usuario_usu, $Password_usu, $Perfil, $Estado_usu)
  {
    $hasht=password_hash($Password_usu,PASSWORD_DEFAULT);
    //Verificar de que no exista un usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE Usuario = '$Usuario_usu'";
    $Resultado = $this->db->query($sql);
    if($Resultado->rowCount() > 0) {
      echo "<scrip>alert('\El usuario ya esta registrado\'); 
      window.location = '../pages/agregar.php'; </script>";
    }else{
      echo "<scrip>alert('\El usuario no esta registrado\'); 
      window.location = '../pages/agregar.php'; </script>";
    }

      // Crear la sentencia SQL
      $statement = $this->db->prepare("INSERT INTO usuarios (nombre_usu, apellido_usu, usuario, password_usu, perfil, estado) VALUES (:Nombre_usu, :Apellido_usu, :Usuario_usu, :hasht,:Perfil, :Estado_usu)");

      $statement->bindParam(':Nombre_usu',$Nombre_usu);
      $statement->bindParam(':Apellido_usu',$Apellido_usu);
      $statement->bindParam(':Usuario_usu',$Usuario_usu);
      $statement->bindParam(':hasht',$hasht);
      $statement->bindParam(':Perfil',$Perfil);
      $statement->bindParam(':Estado_usu',$Estado_usu);

      if($statement->execute())
      {
        echo "¡Registro exitoso!";
        header('Location: ../pages/index.php');
      }else{
        echo "Ocurrio un error.";
        header('Location: ../pages/agregar.php');
      }
  }


  // Función para consultar todos los usuarios administradores

  public function getadmin()
  {
    $row=null;
    $statement=$this->db->prepare("SELECT * FROM usuarios WHERE Perfil='Administrador'");
    $statement->execute();
    while($result=$statement->fetch()){
      $row[]=$result;
    }
    return $row;
  }

  // Función para consultar el usuario de acuerda a si ID
  public function getidadmin($Id)
  {
   
   $statement = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = :Id");
            $statement->bindParam(':Id', $Id);
            $statement->execute();
            
            // Obtener los resultados utilizando fetch()
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            
            // Devolver los resultados
            return $resultado;
  }

  // Función actualizar los datos del usuario
  public function updateadmin($Id, $Nombre_usu, $Apellido_usu, $Usuario_usu, $Password_usu, $Perfil, $Estado_usu)
  {
    $statement = $this->db->prepare("UPDATE usuarios SET id_usuario= :Id, nombre_usu= :Nombre_usu, apellido_usu= :Apellido_usu, usuario=:Usuario_usu, password_usu=:Password_usu,Perfil=:Perfil, estado=:Estado_usu WHERE id_usuario=$Id");
    $statement->bindParam(':Id',$Id);
    $statement->bindParam(':Nombre_usu',$Nombre_usu);
    $statement->bindParam(':Apellido_usu',$Apellido_usu);
    $statement->bindParam(':Usuario_usu',$Usuario_usu);
    $statement->bindParam(':Password_usu',$Password_usu);
    $statement->bindParam(':Perfil',$Perfil);
    $statement->bindParam(':Estado_usu',$Estado_usu);
    if($statement->execute())
    {
      echo "<script>
      alert('Usuario actualizado');
      window.location = '../pages/index.php';
      </script>";
    }else
    {
      echo "<script>
      alert('Usuario no actualizado');
      window.location = '../pages/editar.php';
      </script>";
    }
  }

  // Función para eliminar un usuario
  public function deleteadmin($Id)
  {
    $statement=$this->db->prepare("DELETE FROM usuarios WHERE id_usuario=:Id");
    $statement->bindParam(':Id',$Id);
    $resultado=$statement->execute();
    if($statement->execute())
    {
      echo "Usuario eliminado";
      header('Location: ../pages/index.php');
    }else
    {
      echo "Error no se puede eliminar usuario";
      header('Location: ../pages/eliminar.php');
    }
  }
}

?>