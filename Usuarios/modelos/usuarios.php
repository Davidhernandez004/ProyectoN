<?php
require_once('../../conexion.php');
session_start();

class Usuario extends Conexion
{
  private $isLoggedIn = false; // Estado de inicio de sesión
  private $isAdmin = false; // Estado de administrador
  private $isDoc = false; // Estado de docente

  // Definir el constructor para llamar a la BD
  public function __construct()
  {
    $this->db=parent:: __construct();
  }

  public function login($Usuario, $Password)
  {
    $statement = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $statement->execute([$Usuario]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // Verificar la contraseña
    if($user && password_verify($Password, $user['contrasena']))
    {
      //Iniciar sesión
      $_SESSION['id_usuario'] = $user['id_usuario'];
      $_SESSION['usuario'] = $user['usuario'];
      $_SESSION['role'] = $user['perfil'];
      $_SESSION['validar'] = true;
      $_SESSION['Nombre'] = $user['nombre_usu']." ".$user['apellido_usu'];
    }
  }

  public function validarSesion()
  {
    if($_SESSION['id_usuario'])
    {
      if(!isset($_SESSION['start']))
      {
        $_SESSION['start'] = time();
      }else if(time() - $_SESSION['start'] > 30){
        session_destroy();
        echo "<script>alert('Cierre de sesión por inactividad');window.location='../../index.php';</script>";
        $_SESSION['validar'] == false;
      }
      $_SESSION['start'] = time();
    }

    $now = time();
    if($now > $_SESSION['expire'])
    {
      session_destroy();
      echo "<script>alert('Debe ingresar nuevamente');window.location='../../index.php';</script>";
    }
  }

  public function cerrarSesion()
  {
    session_unset();
    session_destroy();
    echo "<script>alert('Confirme el cierre de la sesión');window.location='../../index.php';</script>";
  }

  public function isLoggedIn()
  {
    return isset($_SESSION['id_usuario']);
  }

  public function isAdmin()
  {
    return $this->isLoggedIn() && $_SESSION['role'] === 'Administrador';
  }

  public function isDoc()
  {
    return $this->isLoggedIn() && $_SESSION['role'] === 'Docente';
  }
} 
?>