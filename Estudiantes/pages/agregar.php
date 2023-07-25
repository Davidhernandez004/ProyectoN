<!DOCTYPE html>
<html>
<head>
  <script src="javascript/js.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/styles.css">
  <link rel="stylesheet" href="/boos/css/bootstrap.css">
  <title>Registro de Estudiantes</title>
</head>
<body>
 <main class="x col-12">
  <h1>Registrar Estudiante</h1>

  <?php
  require_once('../../conexion.php');
  require_once('../../metodos.php');

  $me= new Consultas();

  ?>

  <form class="col-12" action="../controladores/agregar_est.php" method="POST">
    
    <label for="nombre" col="">Nombre:</label>
    <input type="text" id="nombre" name="nom_est" required><br>

    <label for="nombre" col="">Apellido:</label>
    <input type="text" id="nombre" name="ape_est" required><br>

    <label for="documento">Documento:</label>
    <input type="number" id="documento" name="doc_est" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email_est" required><br>

    <label for="documento">Seleccionar materia:</label>
    <select name="perfil" id="materia" name="mat_est" required><br>>
        <option>Seleccionar:</option>
          <?php
            $mate = $me->getmaterias();
            if($mate != null)
            {
              foreach($mate as $ma)
              {
                ?>
                <option value="<?php echo $ma['nom_mat'];?>"><?php echo $ma['nom_mat'];?>></option>
          <?php
              }
            }
          ?>
      </select>
    
    <label for="nombre" col="">Docente:</label>
    <select name="perfil" id="docente" name="nombre_doc" required><br>>
        <option>Seleccionar:</option>
        
        <?php
            $mate = $me->getdocentes();
            if($mate != null)
            {
              foreach($mate as $ma)
              {
                ?>
                <option value="<?php echo $ma['nombre_doc'];?>"><?php echo $ma['nombre_doc'];?>></option>
          <?php
              }
            }
          ?>
      </select>

    <label for="nombre" col="">Promedio:</label>
    <input type="number" id="nombre" name="prom" required><br>

    <label for="nombre" col="">Fecha de registro:</label>
    <input type="date" id="nombre" name="fecha" required>

    <input class="col-5 mx-auto btn-primary " type="submit" value="Registrar">
  </form>
 
 </main>
</body>
</html>
