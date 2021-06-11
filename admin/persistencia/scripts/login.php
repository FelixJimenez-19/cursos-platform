<?php
if(isset($_POST['cuenta']) and isset($_POST['cedula']) and isset($_POST['pass'])){
  include '../Mysql.php';
  include '../clases/AdministradorDAO.php';
  include '../clases/ProfesorDAO.php';
  $administrador = new AdministradorDAO();
  $profesor = new ProfesorDAO();
  $cuenta = $_POST['cuenta'];
  $cedula = $_POST['cedula'];
  $pass = $_POST['pass'];
  if($cuenta == "administrador"){
    $rs = mysqli_fetch_assoc($administrador -> login($cedula,$pass));
    if($rs['cedula'] == $cedula and $rs['pass'] == $pass){
      session_start();
      $_SESSION['cuenta'] = $cuenta;
      $_SESSION['id'] = $rs['id_admin'];
      $_SESSION['cedula'] = $rs['cedula'];
      $_SESSION['apellido'] = $rs['apellido'];
      $_SESSION['nombre'] = $rs['nombre'];
      $_SESSION['indice_dactilar'] = "";
      $_SESSION['pass'] = $rs['pass'];
      $_SESSION['foto'] = $rs['foto'];
    }
  }else if($cuenta == "profesor"){
    $rs = mysqli_fetch_assoc($profesor -> login($cedula,$pass));
    if($rs['cedula'] == $cedula and $rs['pass'] == $pass){
      session_start();
      $_SESSION['cuenta'] = $cuenta;
      $_SESSION['id'] = $rs['id_profesor'];
      $_SESSION['cedula'] = $rs['cedula'];
      $_SESSION['apellido'] = $rs['apellido'];
      $_SESSION['nombre'] = $rs['nombre'];
      $_SESSION['indice_dactilar'] = "";
      $_SESSION['pass'] = $rs['pass'];
      $_SESSION['foto'] = $rs['foto'];
    }
  }
}
header("location:../../presentacion/admin.php");
?>