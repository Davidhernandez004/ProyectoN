<!DOCTYPE html>
<html>
<head>
  <script src="javascript/js.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/styles.css">
  <link rel="stylesheet" href="/boos/css/bootstrap.css">
  <title>Registro de Materias</title>
</head>
<body>
 <main class="x col-12">
  <h1>Registrar Materia</h1>
  <?php
    include_once('../../conexion.php');
    include_once('../modelos/administrador.php');
    $Id = $_GET['Id'];

   $mate = new Materia();
   $row = $mate->getidmat($Id);
    if($row){
    ?>

   <form class="col-12" action="../controladores/actualizar_mat.php" method="post">
    <input type="hidden" name="Id" value="<?php echo $Id ?>">

    <label for="nombre" col="">Nombre materia:</label>
    <input type="text" id="nombre" name="nom_mat" required><br>


    <input class="col-5 mx-auto btn-primary " type="submit" value="Registrar">

  </form>
  <?php
  } else {
    echo "No se encontraron resultados.";
}
?>
 </main>
</body>
</html>