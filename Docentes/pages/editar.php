<!DOCTYPE html>
<html>
<head>
  <script src="javascript/js.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/styles.css">
  <link rel="stylesheet" href="/boos/css/bootstrap.css">
  <title>Registro de Docentes</title>
</head>
<body>
 <main class="x col-12">
  <h1>Registrar Docente</h1>

  <?php
    include_once('../../conexion.php');
    include_once('../modelos/docente.php');
    $Id = $_GET['Id'];

   $doc = new Docente();
   $row = $doc->getiddoc($Id);
    if($row){
    ?>

  <form class="col-12" action="../controladores/agregar_doc.php" method="POST">
    <input type="hidden" name="Id" value="<?php echo $Id ?>">
    
    <label for="nombre" col="">Nombre:</label>
    <input type="text" id="nombre" name="nom_doc" value="<?php echo $row['nombre_doc'] ?>"/><br>

    <label for="nombre" col="">Apellido:</label>
    <input type="text" id="nombre" name="ape_doc" value="<?php echo $row['apellido_doc'] ?>"/><br>

    <label for="documento">Documento:</label>
    <input type="number" id="documento" name="doc_doc" value="<?php echo $row['documentos_doc'] ?>"/><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="correo" value="<?php echo $row['correo_doc'] ?>"/><br>
`    
    <label for="perfil">Perfil:</label>
    <input type="text" id="perfil" name="perfil" value="<?php echo $row['perfil'] ?>"/><br>


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