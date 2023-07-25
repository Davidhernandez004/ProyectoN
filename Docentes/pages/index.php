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
      <a class="nav-link" href="#">Registrar materias</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Registrar notas</a>
    </li>
    <li class="nav-items">
      <a class="nav-link" href="../../index.php">Cerrar Sesión</a>
    </li>
  </ul>
</nav>
<br>

<center><h1>Lista de Usuarios</h1></center>
  <divs class="container">
    <div col-auto-mt-5>
      <table class= "table table-dark table-hover">
        <tr>
          <th>ID DOCENTE<th>
          <th>NOMBRE<th>
          <th>APELLIDO<th>
          <th>DOCUMENTO<th>
          <th>PERFIL<th>
        </tr>
        <tbody>
          <?php
                require_once('../../conexion.php');
                require_once('../modelos/docente.php');
                
                $obj = new Docente();
                $datos = $obj->getdoc();

                foreach ($datos as $key){
              ?>
            <tr>
              <td><?php echo $key['id_docente']?></td>
              <td><?php echo $key['nombre_doc']?></td>
              <td><?php echo $key['apellido_doc']?></td>
              <td><?php echo $key['documento_doc']?></td>
              <td><?php echo $key['correo_doc']?></td>
              <td><?php echo $key['perfil']?></td>
              <td><a href="editar.php?Id=<?php echo $key['id_docente']?>" class="btn btn-primary">Actualizar</a></td>
              <td><a href="eliminar.php?Id=<?php echo $key['id_docente']?>" class="btn btn-danger">Eliminar</a></td>
            </tr>
            <?php } ?>
        </tbody>
      </table>    
    </div>
  </div>

</body>
</html>
