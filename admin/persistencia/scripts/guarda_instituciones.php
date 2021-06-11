<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/InstitucionesDAO.php';
  $_instituciones = new InstitucionesDAO();
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $siglas = $_POST['siglas'];
  $logo = $_FILES['logo'];
  if($id == 0){
    //GUARDAR / INICIO
    $_instituciones -> guardar($nombre, $siglas);
    $id = mysqli_fetch_assoc($_instituciones->findLogo($nombre, $siglas))['id_instituciones'];
    if($logo['tmp_name'] != "" or $logo['tmp_name'] != null){
      $desde = $logo['tmp_name'];
      $hasta = '../../presentacion/fotos/instituciones/'.$id.'.png';
      copy($desde, $hasta);
      $_instituciones -> editarLogo($id.".png", $id);
    }else{
      $_instituciones -> editarLogo("user.png", $id);
    }
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_instituciones -> editar($nombre,$siglas,$id);
    if($logo['tmp_name'] != "" or $logo['tmp_name'] != null){
      $desde = $logo['tmp_name'];
      $hasta = '../../presentacion/fotos/instituciones/'.$id.'.png';
      copy($desde, $hasta);
      $_instituciones -> editarLogo($id.".png",$id);
    }
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=7.2');
?>