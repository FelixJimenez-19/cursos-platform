<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/DuracionDAO.php';
  $_duracion = new DuracionDAO();
  $id = $_POST['id'];
  $descripcion = $_POST['descripcion'];
  if($id == 0){
    //GUARDAR / INICIO
    $_duracion -> guardar($descripcion);
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_duracion -> editar($descripcion, $id);
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=3.6');
?>