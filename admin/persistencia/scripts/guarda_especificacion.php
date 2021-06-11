<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/EspecificacionDAO.php';
  $_especificacion = new EspecificacionDAO();
  $id = $_POST['id'];
  $codigo = $_POST['codigo'];
  $descripcion = $_POST['descripcion'];
  $id_area = $_POST['id_area'];
  if($id == 0){
    //GUARDAR / INICIO
    $_especificacion -> guardar($codigo, $descripcion, $id_area);
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_especificacion -> editar($codigo, $descripcion, $id_area, $id);
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=3.2');
?>