<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/AdministradorDAO.php';
  $_administrador = new AdministradorDAO();
  $id = $_GET['id'];
  $_administrador -> eliminar($id);
  if(file_exists('../../presentacion/fotos/administrador/'.$id.'.png')){
    unlink('../../presentacion/fotos/administrador/'.$id.'.png');
  }
}
header('location: ../../presentacion/admin.php?pagina=1');
?>