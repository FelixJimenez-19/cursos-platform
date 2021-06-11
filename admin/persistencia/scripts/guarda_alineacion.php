<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/AlineacionDAO.php';
  $_alineacion = new AlineacionDAO();
  $id = $_POST['id'];
  $descripcion = $_POST['descripcion'];
  if($id == 0){
    //GUARDAR / INICIO
    $_alineacion -> guardar($descripcion);
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_alineacion -> editar($descripcion, $id);
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=3.3');
?>