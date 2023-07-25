<?php

include_once('../../conexion.php');
include_once('../modelos/estudiante.php');

// Crear el objeto de la clase estudiante
$estud = new  Estudiante();

// Definir los argumentos que se van a enviar por medio de la función
// Insertar estudiante

$Nombre_est = $_POST['nom_est'];
$Apellido_est = $_POST['ape_est'];
$Documento_est = $_POST['doc_est'];
$Correo_est = $_POST('email_est');
$Materia = $_POST('mat_est');
$Docente = $_POST('nombre_doc');
$Promedio = $_POST('prom');
$Fecha = $_POST('fecha');

$estud->addest($Nombre_est, $Apellido_est, $Documento_est, $Correo_est, $Materia, $Docente, $Promedio, $Fecha);

?>