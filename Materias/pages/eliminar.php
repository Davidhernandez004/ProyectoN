<!DOCTYPE html>
<html lang="es">
<head>
  <title>Eliminar Materia</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
<main class="x col-12">
  <h1>Eliminar Materia</h1>

 
  <form class="col-12" method="POST" action="../controladores/eliminar_mat.php">
    
    <label for="documento">ID Materia:</label>
    <input type="number" id="nombre" name="id_mat" required><br>

    <input class="col-5 mx-auto btn-primary " type="submit" value="Eliminar">

  </form>
  
 </main>
</body>
</html>