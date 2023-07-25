<?php

include_once('../../conexion.php');
include_once('../modelos/docente.php');

// Crear el objeto de la clase docente
$doc = new  Docente();

// Definir los argumentos que se van a enviar por medio de la función
// Insertar usuario

$Nombre_doc = $_POST['nom_doc'];
$Apellido_doc = $_POST['ape_doc'];
$Documento_doc = $_POST['doc_doc'];
$Correo_doc = $_POST['correo'];
$Perfil_doc = $_POST['perfil'];

$doc->adddoc($Nombre_doc, $Apellido_doc, $Documento_doc, $Correo_doc, $Perfil_doc);

?>