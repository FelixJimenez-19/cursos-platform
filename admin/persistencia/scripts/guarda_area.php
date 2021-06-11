<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/AreaDAO.php';
  $_area = new AreaDAO();
  $id = $_POST['id'];
  $codigo = $_POST['codigo'];
  $descripcion = $_POST['descripcion'];
  if($id == 0){
    //GUARDAR / INICIO
    $_area -> guardar($codigo, $descripcion);
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_area -> editar($codigo, $descripcion, $id);
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=3.1');
?>