<?php

include_once('../../conexion.php');
include_once('../modelos/administrador.php');

// Crear el objeto de la clase administrador
$admin = new  Administrador();

// Definir los argumentos que se van a enviar por medio de la función
// Insertar usuario

$Nombre_usu = $_POST['nombre'];
$Apellido_usu = $_POST['apellido'];
$Usuario_usu = $_POST['usuario'];
$Password_usu = $_POST['contrasena'];
$Perfil = $_POST['perfil'];
$Estado_usu = $_POST['estado'];

$admin->addadmin($Nombre_usu, $Apellido_usu, $Usuario_usu, $Password_usu, $Perfil, $Estado_usu);

?>