<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/InstitucionesDAO.php';
  $_instituciones = new InstitucionesDAO();
  $id = $_GET['id'];
  $_instituciones -> eliminar($id);
  if(file_exists('../../presentacion/fotos/instituciones/'.$id.'.png')){
    unlink('../../presentacion/fotos/instituciones/'.$id.'.png');
  }
}
header('location: ../../presentacion/admin.php?pagina=7.2');
?>