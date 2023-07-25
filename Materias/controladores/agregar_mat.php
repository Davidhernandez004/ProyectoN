<?php

include_once('../../conexion.php');
include_once('../modelos/materia.php');

// Crear el objeto de la clase administrador
$mate = new  Materia();

// Definir los argumentos que se van a enviar por medio de la función
// Insertar usuario

$Id = $_POST['Id'];
$Materia = $_POST['mat'];


$mate->addmat($Id, $Materia);

?>