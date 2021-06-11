<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ContactoDAO.php';
  $_contacto = new ContactoDAO();
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $url = $_POST['url'];
  $logo = $_FILES['logo'];
  if($id == 0){
    //GUARDAR / INICIO
    $_contacto -> guardar($nombre, $url);
    $id = mysqli_fetch_assoc($_contacto->findLogo($nombre, $url))['id_contacto'];
    if($logo['tmp_name'] != "" or $logo['tmp_name'] != null){
      $desde = $logo['tmp_name'];
      $hasta = '../../presentacion/fotos/contacto/'.$id.'.png';
      copy($desde, $hasta);
      $_contacto -> editarLogo($id.".png", $id);
    }else{
      $_contacto -> editarLogo("user.png", $id);
    }
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_contacto -> editar($nombre,$url,$id);
    if($logo['tmp_name'] != "" or $logo['tmp_name'] != null){
      $desde = $logo['tmp_name'];
      $hasta = '../../presentacion/fotos/contacto/'.$id.'.png';
      copy($desde, $hasta);
      $_contacto -> editarLogo($id.".png",$id);
    }
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=7.1');
?>