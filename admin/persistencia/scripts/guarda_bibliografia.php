<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/BibliografiaDAO.php';
  $_bibliografia = new BibliografiaDAO();
  $id = $_POST['id'];
  $descripcion = $_POST['descripcion'];
  if($id == 0){
    //GUARDAR / INICIO
    $_bibliografia -> guardar($descripcion);
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_bibliografia -> editar($descripcion, $id);
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=3.8');
?>