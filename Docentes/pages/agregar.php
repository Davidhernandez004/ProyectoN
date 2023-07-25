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

  <form class="col-12" action="../controladores/agregar_doc.php" method="POST">
    
    <label for="nombre" col="">Nombre:</label>
    <input type="text" id="nombre" name="nom_doc" required><br>

    <label for="nombre" col="">Apellido:</label>
    <input type="text" id="nombre" name="ape_doc" required><br>

    <label for="documento">Documento:</label>
    <input type="number" id="documento" name="doc_doc" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="correo" required><br>
    
    <label for="perfil">Perfil:</label>
    <input type="text" id="perfil" name="perfil" required><br>


    <input class="col-5 mx-auto btn-primary " type="submit" value="Registrar">

  </form>
 
 </main>
</body>
</html>