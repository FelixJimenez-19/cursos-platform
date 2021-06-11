<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ModalidadDAO.php';
  $_modalidad = new ModalidadDAO();
  $id = $_POST['id'];
  $descripcion = $_POST['descripcion'];
  if($id == 0){
    //GUARDAR / INICIO
    $_modalidad -> guardar($descripcion);
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_modalidad -> editar($descripcion, $id);
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=3.5');
?>