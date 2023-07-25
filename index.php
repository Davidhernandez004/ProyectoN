<!DOCTYPE html>
<html>
<head>
  <script src="javascript/js.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/styles.css">

  <title>Inicio Sesión </title>
</head>
<body>
 <main class="x col-12">
  <h1>Iniciar Sesión</h1>

  <form class="col-12" action="Usuarios/controladores/usu_control.php" method="POST">
    <label for="Documento">Usuario:</label>
    <input type="text" id="Documento" name="usuario" required><br>

    <label for="contrasena col-md-12">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br>

    <input class="col-5 mx-auto btn-primary " type="submit" value="Ingresar">
    <p id="contra"><a href="#" >¿Olvido su contraseña?</a>
    <p id="contra"><a href="./Administrador/pages/agregar.php" >¿No tiene cuenta? Registrese</a>
  </form> 
  
 </main>
</body>
</html>












