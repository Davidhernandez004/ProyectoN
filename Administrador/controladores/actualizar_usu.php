<?php
require_once('../../conexion.php');
require_once('../modelos/administrador.php');

if($_POST){

  $admin = new Administrador();
  {

    $Id = $_POST['Id'];
    $Nombreusu = $_POST['nombre'];
    $Apellidousu = $_POST['apellido'];
    $Usuarioad = $_POST['usuario'];
    $Passwordusu = $_POST['contrasena'];
    $Perfil = $_POST['perfil'];
    $Estadousu = $_POST['estado'];

    $admin->updateadmin($Id, $Nombreusu, $Apellidousu, $Usuarioad, $Passwordusu, $Perfil, $Estadousu);
    if($admin)
    {
        print "<script>alert(\"Usuario actualizado\");
        window.location=('../pages/index.php');</script>";

        print "<script>alert(\"Usuario no actualizado\");
        window.location=('../pages/editar.php');</script>";
    }
  }
}

?>