<?php

    include_once('../../conexion.php');
    include_once('../modelos/materia.php');
    
    
    $mate = new Materia();
    
    // Verificar de que se envio el formulario
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $Id = $_POST['id_mat'];
    
      $result = $mate->deletemat($Id);
    
      if($result)
      {
        print "<script>alert('\Materia eliminada\');
        window.location=:'../pages/index.php';
        </script>";
      }else{
        print "<script>alert('\Materia no eliminada\');
        window.location=:'../pages/eliminar.php';
        </script>";
      }
  }
    
?>