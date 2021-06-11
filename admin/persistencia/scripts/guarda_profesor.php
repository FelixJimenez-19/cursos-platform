<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ProfesorDAO.php';
  $_profesor = new ProfesorDAO();
  $id = $_POST['id'];
  $cedula = $_POST['cedula'];
  $apellido = $_POST['apellido'];
  $nombre = $_POST['nombre'];
  $indice_dactilar = $_POST['indice_dactilar'];
  $pass = $_POST['pass'];
  $foto = $_FILES['foto'];
  $firma = $_FILES['firma'];
  if($id == 0){
    //GUARDAR / INICIO
    $_profesor -> guardar($cedula,$apellido,$nombre,$indice_dactilar,$pass);
    $id = mysqli_fetch_assoc($_profesor->findFoto($cedula,$apellido,$nombre,$indice_dactilar,$pass))['id_profesor'];
    if($foto['tmp_name'] != "" or $foto['tmp_name'] != null){
      $desde = $foto['tmp_name'];
      $hasta = '../../presentacion/fotos/profesor/'.$id.'.png';
      copy($desde,$hasta);
      $_profesor->editarFoto($id.".png",$id);
    }else{
      $_profesor->editarFoto("user.png",$id);
    }
    if($firma['tmp_name'] != "" or $firma['tmp_name'] != null){
      $desde = $firma['tmp_name'];
      $hasta = '../../presentacion/fotos/profesor/firma/'.$id.'.png';
      copy($desde,$hasta);
      $_profesor->editarFirma($id.".png",$id);
    }else{
      $_profesor->editarFirma("user.png",$id);
    }
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_profesor -> editar($cedula,$apellido,$nombre,$indice_dactilar,$pass,$id);
    if($foto['tmp_name'] != "" or $foto['tmp_name'] != null){
      $desde = $foto['tmp_name'];
      $hasta = '../../presentacion/fotos/profesor/'.$id.'.png';
      copy($desde,$hasta);
      $_profesor->editarFoto($id.".png",$id);
    }
    if($firma['tmp_name'] != "" or $firma['tmp_name'] != null){
      $desde = $firma['tmp_name'];
      $hasta = '../../presentacion/fotos/profesor/firma/'.$id.'.png';
      copy($desde,$hasta);
      $_profesor->editarFirma($id.".png",$id);
    }
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=3.7');
?>