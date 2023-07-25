<?php
require_once('../../conexion.php');
require_once('../modelos/usuarios.php');

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $Usuario_usu = $_POST['usuario'];
  $Password_usu = $_POST['contrasena'];

  $modelo = new Usuario();

  $modelo->login($Usuario_usu, $Password_usu);

  // Redirigir al controlador de acuerdo al rol
  if($modelo->isLoggedIn()){
    if($modelo->isAdmin()){
      header('Location: ../../Administrador/pages/index.php');
    }else if($modelo->isDoc()){
      header('Location: ../../Materias/pages/index.php');
    }
    exit();
  }else{
    print "<script>alert(\"Alguno de los campos es incorrecto.\");
    window.location='../../index.php';</script>";
  }
}
?>