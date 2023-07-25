<?php

    include_once('../../conexion.php');
    include_once('../modelos/administrador.php');
    
    
    $admi = new Administrador();
    
    // Verificar de que se envio el formulario
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $Id = $_POST['id_usu'];
    
      $result = $admi->deleteadmin($Id);
    
      if($result)
      {
        print "<script>alert('\Usuario eliminado\');
        window.location=:'../pages/index.php';
        </script>";
      }else{
        print "<script>alert('\Usuario no eliminado\');
        window.location=:'../pages/eliminar.php';
        </script>";
      }
  }
    
?>