<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/ContactoDAO.php';
  $_contacto = new ContactoDAO();
  $id = $_GET['id'];
  $_contacto -> eliminar($id);
  if(file_exists('../../presentacion/fotos/contacto/'.$id.'.png')){
    unlink('../../presentacion/fotos/contacto/'.$id.'.png');
  }
}
header('location: ../../presentacion/admin.php?pagina=7.1');
?>