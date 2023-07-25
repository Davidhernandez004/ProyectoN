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
  <link rel= "stylesheet" type="text/css" href="../../css/styles.css">
  <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Actualizar Usuario</title>
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
      <a class="nav-link" href="#">Materias</a>
    </li>

    <li class="nav-items">
      <a class="nav-link" href="../../Usuarios/modelos/salir.php">Cerrar Sesión</a>
    </li>
  </ul>
</nav>
<br>

<center><h2>Te damos la bienvenida <?php echo $_SESSION["usuario"]?>.</h2></center>

  <main class="x col-12">
    <h1> Actualizar Usuario </h1>
    <?php
    include_once('../../conexion.php');
    include_once('../modelos/administrador.php');
    $Id = $_GET['Id'];

   $admin = new Administrador();
   $row = $admin->getidadmin($Id);
    if($row){
    ?>

   <form action="../controladores/actualizar_usu.php" method="post">
    <input type="hidden" name="Id" value="<?php echo $Id ?>">
    <div class="form-group">
      <label >Nombre:</label>
      <input type="text" class="form-control" placeholder="Ingresar su nombre" name="nombre" value="<?php echo $row['nombre_usu'] ?>"/>
    </div>
    <div class="form-group">
      <label >Apellido:</label>
      <input type="text" class="form-control" placeholder="Ingresar su apellido" name="apellido" value="<?php echo $row['apellido_usu']?>"/>
    </div>
    <div class="form-group">
      <label >Usuario:</label>
      <input type="text" class="form-control" placeholder="Ingresar su usuario" name="usuario" value="<?php echo $row['usuario']?>"/>
    </div>
    <div class="form-group">
      <label >CONTRASEÑA:</label>
      <input type="password" class="form-control"  placeholder="Ingresar contraseña" name="contrasena" value="<?php echo $row['password_usu']?>"/>
    </div>
    <div class="form-group">
      <p>Perfil: 
              <label for="perfil"></label>
              <select name="perfil">
                <option value="Administrador">Administrador</option>
                <option value="Docentes">Docentes</option>
              </select>
            </p>
    </div>
    <div class="form-group">
      <p>Estado: 
              <label for="perfil"></label>
              <select name="estado">
                  <option value="estado"></option>
                <option value="Activo">Activo</option>
                <option value="No activo">No activo</option>
              </select>
            </p>
    </div>

 
    <button type="submit" class="btn btn-success">ACTUALIZAR</button>
  </form>
  <?php
  } else {
    echo "No se encontraron resultados.";
}
?>
  </main>
</body>
</html>