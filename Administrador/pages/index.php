<?php
require_once('../../Usuarios/modelos/validar.php');
$model = new Usuario();
$model->validarSesion();

if(!$_SESSION['validar'])
{
  print "<script>alert(\"Solo para usuarios registrados\");
  window.location='../../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Gestor de Notas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="../../Usuarios/pages/index.php">Usuarios</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../../Docentes/pages/index.php">Docentes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../../Estudiantes/pages/index.php">Estudiantes</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="../../Materias/pages/index.php">Materias</a>
    </li>

    <li class="nav-items">
      <a class="nav-link" href="../../Usuarios/modelos/salir.php">Cerrar Sesión</a>
    </li>
  </ul>
</nav>
<br>

<center><h2>Te damos la bienvenida <?php echo $_SESSION["usuario"]?>.</h2></center>
  <center><h1>Lista de Usuarios</h1></center>
  <divs class="container">
    <div col-auto-mt-5>
      <table class= "table table-dark table-hover">
        <tr>
          <th>ID USUARIO<th>
          <th>NOMBRE<th>
          <th>APELLIDO<th>
          <th>USUARIO<th>
          <th>PERFIL<th>
          <th>ESTADO<th>
          <th>ACTUALIZAR<th>
          <th>ELIMINAR<th>
        </tr>
        <tbody>
            <?php
              require_once('../../conexion.php');
              require_once('../modelos/administrador.php');
              
              $obj = new Administrador();
              $datos = $obj->getadmin();

              foreach($datos as $key){
            ?>
          <tr>
            <td><?php echo $key['id_usuario']?></td>
            <td><?php echo $key['nombre_usu']?></td>
            <td><?php echo $key['apellido_usu']?></td>
            <td><?php echo $key['usuario']?></td>
            <td><?php echo $key['perfil']?></td>
            <td><?php echo $key['estado']?></td>
            <td><a href="editar.php?Id=<?php echo $key['id_usuario']?>" class="btn btn-primary">Actualizar</a></td>
            <td><a href="eliminar.php?Id=<?php echo $key['id_usuario']?>" class="btn btn-danger">Eliminar</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>    
    </div>
  </div>


</body>
</html>
