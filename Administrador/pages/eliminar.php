<?php
require_once('../../Usuarios/modelos/usuarios.php');
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
  <title>Eliminar Usuario</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="../../Usuario/pages/index.php">Usuarios</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../../Docentes/pages/index.php">Docentes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../../Estudiantes/pages/index.php">Estudiantes</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">Materias</a>
    </li>

    <li class="nav-items">
      <a class="nav-link" href="../../Usuarios/modelos/salir.php">Cerrar Sesión</a>
    </li>
  </ul>
</nav>
<br>

<center><h2>Te damos la bienvenida <?php echo $_SESSION["usuario"]?>.</h2></center>
  <center><h1>Lista de Usuarios</h1></center>
  
<main class="x col-12">
  <h1>Eliminar Usuario</h1>

 
  <form class="col-12" method="POST" action="../controladores/eliminar_usu.php">
    
    <label for="documento">ID Usuario:</label>
    <input type="number" id="nombre" name="id_usu" required><br>

    <input class="col-5 mx-auto btn-primary " type="submit" value="Eliminar">

  </form>
  
 </main>
</body>
</html>