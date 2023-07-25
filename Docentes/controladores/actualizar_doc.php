<?php
require_once('../../conexion.php');
require_once('../modelos/docente.php');

if($_POST){

  $doc = new Docente();
  {
    $Id = $_POST['Id'];
    $Nombre_doc = $_POST['nom_doc'];
    $Apellido_doc = $_POST['ape_doc'];
    $Documento_doc = $_POST['doc_doc'];
    $Correo_doc = $_POST['correo'];
    $Perfil_doc = $_POST['perfil'];

    $doc->updatedoc($Id, $Nombre_doc, $Apellido_doc, $Documento_doc, $Correo_doc, $Perfil_doc);

    if($doc)
    {
        print "<script>alert(\"Docente actualizado\");
        window.location=('../pages/index.php');</script>";

        print "<script>alert(\"Docente no actualizado\");
        window.location=('../pages/editar.php');</script>";
    }
  }
}

?>