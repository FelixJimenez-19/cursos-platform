<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/AdministradorDAO.php';
  $_administrador = new AdministradorDAO();
  $id = $_POST['id'];
  $cedula = $_POST['cedula'];
  $apellido = $_POST['apellido'];
  $nombre = $_POST['nombre'];
  $pass = $_POST['pass'];
  $foto = $_FILES['foto'];
  if($id == 0){
    //GUARDAR / INICIO
    $_administrador -> guardar($cedula,$apellido,$nombre,$pass);
    $id = mysqli_fetch_assoc($_administrador->findFoto($cedula,$apellido,$nombre,$pass))['id_admin'];
    if($foto['tmp_name'] != "" or $foto['tmp_name'] != null){
      $desde = $foto['tmp_name'];
      $hasta = '../../presentacion/fotos/administrador/'.$id.'.png';
      copy($desde,$hasta);
      $_administrador->editarFoto($id.".png",$id);
    }else{
      $_administrador->editarFoto("user.png",$id);
    }
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_administrador -> editar($cedula,$apellido,$nombre,$pass,$id);
    if($foto['tmp_name'] != "" or $foto['tmp_name'] != null){
      $desde = $foto['tmp_name'];
      $hasta = '../../presentacion/fotos/administrador/'.$id.'.png';
      copy($desde,$hasta);
      $_administrador->editarFoto($id.".png",$id);
    }
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=1');
?>