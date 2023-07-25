<?php

    include_once('../../conexion.php');
    include_once('../modelos/docente.php');
    
    
    $doc = new Docente();
    
    // Verificar de que se envio el formulario
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $Id = $_POST['id_doc'];
    
      $result = $doc->deletedoc($Id);
    
      if($result)
      {
        print "<script>alert('\Docente eliminado\');
        window.location=:'../pages/index.php';
        </script>";
      }else{
        print "<script>alert('\Docente no eliminado\');
        window.location=:'../pages/eliminar.php';
        </script>";
      }
  }
    
?>