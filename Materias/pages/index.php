<!DOCTYPE html>
<html lang="es">
<head>
  <title>Bootstrap Example</title>
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
      <a class="nav-link" href="../../index.php">Cerrar Sesión</a>
    </li>
  </ul>
</nav>
<br>

  <center><h1>Lista de Materias</h1></center>
  <divs class="container">
    <div col-auto-mt-5>
      <table class= "table table-dark table-hover">
        <tr>
          <th>ID MATERIA<th>
          <th>MATERIA<th>
        </tr>
        <tbody>
            <?php
              require_once('../../conexion.php');
              require_once('../modelos/materia.php');
              
              $objmat = new Materia();
              $datos = $objmat->getmat();

              foreach ($datos as $key){
            ?>
          <tr>
            <td><?php echo $key['id_materia']?></td>
            <td><?php echo $key['materia']?></td>
            <td><a href="editar.php?Id=<?php echo $key['id_materia']?>" class="btn btn-primary">Actualizar</a></td>
            <td><a href="eliminar.php?Id=<?php echo $key['id_materia']?>" class="btn btn-danger">Eliminar</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>    
    </div>
  </div>


</body>
</html>

