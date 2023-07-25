<?php
require_once('../../conexion.php');
require_once('../modelos/administrador.php');

if($_POST){

  $estud = new Estudiante();
  {

    $Nombre_est = $_POST['nom_est'];
    $Apellido_est = $_POST['ape_est'];
    $Documento_est = $_POST['doc_est'];
    $Correo_est = $_POST('email_est');
    $Materia = $_POST('mat_est');
    $Docente = $_POST('nombre_doc');
    $Promedio = $_POST('prom');
    $Fecha = $_POST('fecha');
    
    $estud->updateest($Nombre_est, $Apellido_est, $Documento_est, $Correo_est, $Materia, $Docente, $Promedio, $Fecha);
    if($estud)
    {
        print "<script>alert(\"Estudiante actualizado\");
        window.location=('../pages/index.php');</script>";

        print "<script>alert(\"Estudiante no actualizado\");
        window.location=('../pages/editar.php');</script>";
    }
  }
}

?>