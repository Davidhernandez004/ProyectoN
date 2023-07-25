<?php
session_start();

if(!$_SESSION['validacion'])
{
  print "<script>
  alert(\"Solo para usuarios registrados\");
  window.location='../../index.php';</script>";
}

$now = time();
if($now > $_SESSION['expire'])
{
  session_destroy();
  print "<script>
  alert(\"Debe ingresar nuevamente\");
  window.location='../../index.php';</script>";
}

?>