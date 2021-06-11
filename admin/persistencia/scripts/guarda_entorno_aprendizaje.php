<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/EntornoAprendizajeDAO.php';
  $_entorno_aprendizaje = new EntornoAprendizajeDAO();
  $id = $_POST['id'];
  $instalaciones = $_POST['instalaciones'];
  $teorica = $_POST['teorica'];
  $practica = $_POST['practica'];
  if($id == 0){
    //GUARDAR / INICIO
    $_entorno_aprendizaje -> guardar($instalaciones, $teorica, $practica);
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_entorno_aprendizaje -> editar($instalaciones, $teorica, $practica, $id);
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=3.0');
?>