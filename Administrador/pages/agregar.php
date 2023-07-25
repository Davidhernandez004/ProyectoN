
<!DOCTYPE html>
<html>
<head>
  <script src="javascript/js.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <title>Registro de Usuario</title>
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


 <main class="x col-12">
  <h1>Registrar Usuario</h1>

  <form class="col-12" action="../controladores/agregar_usu.php" method="POST">

    <label for="nombre" col="">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label col="">Apellido:</label>
    <input type="text" id="nombre" name="apellido" required><br>

    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br>

    <label for="contrasena col-md-12">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br>

    <label for="perfil col-md-12">Perfil:</label>
      <select name="perfil">
        <option value="Administrador">Administrador</option>
        <option values="Docente">Docente</option>
      </select>
      <br>
    <label for="contrasena col-md-12">Estado:</label>
    <select name="estado">
        <option value="Activo">Activo</option>
        <option values="No activo">No activo</option>
      </select>
      <br>
    

    <input class="col-5 mx-auto btn-primary " type="submit" value="Registrarse">
    <p id="contra"><a href="../../index.php" >Iniciar Sesión</a>
  </form>
 
 </main>
</body>
</html>
