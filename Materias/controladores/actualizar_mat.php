<?php
require_once('../../conexion.php');
require_once('../modelos/materia.php');

if($_POST){

  $mate = new Materia();
  {

    $Id = $_POST['Id'];
    $Materia = $_POST['nom_mat'];


    $mate->updatemat($Id, $Materia);
    if($mate)
    {
        print "<script>alert(\"Materia actualizada\");
        window.location=('../pages/index.php');</script>";

        print "<script>alert(\"Materia no actualizada\");
        window.location=('../pages/editar.php');</script>";
    }
  }
}

?>