<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/ProfesorDAO.php';
  $_profesor = new ProfesorDAO();
  $id = $_GET['id'];
  $_profesor -> eliminar($id);
  if(file_exists('../../presentacion/fotos/profesor/'.$id.'.png')){
    unlink('../../presentacion/fotos/profesor/'.$id.'.png');
  }
  if(file_exists('../../presentacion/fotos/profesor/firma/'.$id.'.png')){
    unlink('../../presentacion/fotos/profesor/firma/'.$id.'.png');
  }
}
header('location: ../../presentacion/admin.php?pagina=3.7');
?>