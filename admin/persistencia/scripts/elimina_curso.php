<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/CursoDAO.php';
  $_curso = new CursoDAO();
  $id = $_GET['id'];
  $_curso -> eliminar($id);
  if(file_exists('../../presentacion/fotos/curso/'.$id.'.png')){
    unlink('../../presentacion/fotos/curso/'.$id.'.png');
  }
}
header('location: ../../presentacion/admin.php?pagina=5.0');
?>